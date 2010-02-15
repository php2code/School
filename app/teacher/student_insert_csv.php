<?php
ob_start();
require_once('../../config/config.php');
$out = ob_get_clean();
if(!isset($_SESSION['userId'])) {
	header("location:".SITEURL."app/index.php");
	exit;
}
$objTpl->assign('module_heading', "Attendance");
function valid_input_date($date)
{
	$array_date	=	explode("/",$date);
	$v_date	=	$array_date[2]."-".$array_date[0]."-".$array_date[1];
	return $v_date;
}
// checking admin session is set or not OR expired-->
//check_admin_session();
//include SITE_FUNCTION_PATH.'categoryoutput.php';
// for exporting the records to CSV format
 $seperator = "\t";

#######################################
#	// if uploading attempt is done	###
#######################################

if($_POST['buttoninsert'] || $_POST['buttoninsert_x']) {
	$invalid_id = array();
	$invalid_student =	0;
	$valid_student =	0;
	$updated_student	=	0;
	if($_POST['upfiletype']=='tab') {
		$seperator="\t"; 
	} else { 
		$seperator="\t";
	}
	//elseif($_POST['upfiletype']=='pipe') $seperator='|';
	
	if(is_uploaded_file($_FILES['usrfl']['tmp_name'])) 
	{
		$filename = $_FILES['usrfl']['name'];
		$ext = strstr($path,'.');
		$dest = "temp/".$filename.$ext;
		$ff1 = $Id."_".$filename.$ext;
		if(copy($_FILES['usrfl']['tmp_name'],$dest)) {
			$str = "Success"; 
		} else { 
			$str="failed";
		}
		@unlink($_FILES['usrfl']['tmp_name']); 
		
		$fp = fopen($dest,"r") or die("file not found!"); 
		$filedata = fread($fp,filesize($dest));
		$filedata = explode("EOL",$filedata);
		
		// Start reding the line from CSv file -- for Starts
		$new_att_row = 0;
		$updated_att_row = 0;
		$invalid_row = 0;
					
		for($i=1;$i<count($filedata);$i++) {
			$total_row_found++;
			$perfield=explode($seperator,$filedata[$i]);
				
			if($perfield[0]!='' && $perfield[1]!='' && $perfield[2]!='' && $perfield[3]!='') {
				$rs_student		=	$objDb->GetRow("
					SELECT 
						studentId 
					FROM 
						student 
					WHERE 
						firstName 		= '".trim($perfield[0])."' 
						AND lastName	= '".trim($perfield[1])."' 
						AND dateOfBirth	= '".valid_input_date(trim($perfield[3]))."' 
						AND guardian_name= '".trim($perfield[2])."'
				");
																			
				$student_id	=	$rs_student['studentId'];
				
				if(count($rs_student)>0) {
					$att_date	=	explode("/",$perfield[4]);
					// fetching data from Attendance Date Table -->
					$rs_att_date = $objDb->GetRow("
						SELECT 
							date_id 
						FROM 
							attendance_date 
						WHERE 
							date_day   ='".trim($att_date[1])."' 
							AND date_month ='".trim($att_date[0])."' 
							AND date_year  ='".trim($att_date[2])."'
					");
					
					$date_id	=	$rs_att_date['date_id'];
					
					// if date is not found then inserting date in DB -->
					if(count($rs_att_date)>0) {
						// checking attendance is already made or not -->
						$sel_att = "
							SELECT 
								attendance_id 
							FROM 
								student_attendance 
							WHERE 
								attendance_student_id	='".$student_id."' 
								AND attendance_student_course_id='".trim($perfield[6])."' 
								AND attendance_date_id	='".trim($date_id)."'
						";
						
						$rs_att	= $objDb->GetRow($sel_att);
						if(count($rs_att)>0) {
							$objDb->Execute("
								UPDATE 
									student_attendance 
								SET 
									attendance_check ='".trim($perfield[5])."' 
								WHERE 
									attendance_id='".$rs_att['attendance_id']."'
							");
							$updated_att_row++;

						} else {
							$objDb->Execute("
								INSERT INTO 
									student_attendance 
								SET 
									attendance_student_id		='".$student_id."',
									attendance_student_course_id='".trim($perfield[6])."',
									attendance_date_id			='".trim($date_id)."',
									attendance_check	='".trim($perfield[5])."'
							");
							$new_att_row++;
						}
					} else {
						// inserting student attendance date
						$objDb->Execute("
							INSERT INTO 
								attendance_date	
							SET
								date_day ='".trim($att_date[1])."',
								date_month ='".trim($att_date[0])."', 
								date_year  ='".trim($att_date[2])."'
						");
						
						$date_id	=	$objDb->Insert_Id();
						// inserting student attendance
						$objDb->Execute("
							INSERT INTO 
								student_attendance 
							SET
								attendance_student_id = '".$student_id."',
								attendance_student_course_id='".trim($perfield[6])."',
								attendance_date_id			='".trim($date_id)."',
								attendance_check	='".trim($perfield[5])."'
						");
						
						$new_att_row++;
					}
					 
				} else {
						$invalid_row++;
				}
				
		  	}
		}
	} else {
		echo "File not added";
	}
		    // file reading ENDS here  ---  for ends here
}// End if for file uploading condition

if($new_category_added!=0 && $new_product_added==0) {
	$new_product_added=$new_category_added;
} else {
	$new_product_added=$new_product_added+$new_category_added;
}
 if($_POST['buttoninsert'] || $_POST['buttoninsert_x']) {
	 $msg = '<div class="messageStackSuccess" style="padding:10px 10px 10px 10px;">
	 <strong>'.($total_row_found-1).'</strong> - Total Inventory(Rows) in the file !!<br>
	  <strong>'.$new_att_row.'</strong> - New Attendance Records created !!<br><strong> 
	  '.$updated_att_row.'</strong> - Attendance Row Updated !!<br><strong>
	  '.$invalid_row.'</strong> - Invalid Row Found !!<br></div><hr>';
 }

$objTpl->assign('login_error', $msg);
$objTpl->assign('unread', $unread);
$objTpl->assign('student', $student);
$objTpl->assign('countries', $countries);
$objTpl->display('teacher/student_attendance_bulk.tpl');
?>

