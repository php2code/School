<?php
ob_start();
require_once('../../config/config.php');
if(!isset($_SESSION['userId'])) {
	header("location:".SITEURL."app/index.php");
	exit;
}
$objTpl->assign('module_heading', "Search Student");
require_once(INCLUDE_DIR.'teacher.php');
$out = ob_get_clean();
$user = $_SESSION['userId'];
$objUser = new Teacher($user);

if($_POST) {
	$sql = "
		SELECT 
			student.*, class.className,class.standard 
		FROM 
			student INNER JOIN class ON student.classId = class.id  
		WHERE 
			1=1";
	$subsql='';
	if($_POST['firstName'] != "" && $_POST['firstName'] != "*") {
		$subsql .= " AND student.firstName LIKE '%".$_POST['firstName']."%'";
	}
	if($_POST['lastName'] != "" && $_POST['lastName'] != "*") {
		$subsql .= " AND student.lastName LIKE '%".$_POST['lastName']."%'";
	}
	if($_POST['classId'] != "" ) {
		$subsql .= " AND student.classId = '".$_POST['classId']."'";
	}
 	if($_POST['roll_no'] != "") {
		$subsql .= " AND student.studentId = '".$_POST['roll_no']."'";
	}
	
	if($_POST['classId']=="")
	{
		$msg="Please Select Class!";
	}
	else
	{
		$sql=$sql.$subsql;
	//echo $sql;
		$searchResult = $objDb->getAll($sql);
		$objTpl->assign('searchResult', $searchResult);
	}
}

$classes = $objDb->getAll("
			SELECT 
				id, className 
			FROM 
				class
			WHERE 
				class.schoolId = ".$_SESSION['schoolId']."
				AND class.status = 1
		"); 






function getAttendance($params)
{
	global $objDb;
	
	if($params['att_type']=='flat')
	{
		if($params['attendance_check']=='absent')
		{
			$ATTENDANCE="SELECT *FROM student_attendance 
			where attendance_student_id='".$params['student_id']."' and attendance_check='A'";
			$ATTENDANCE_RES = $objDb->getAll($ATTENDANCE);
			
		}
		else if($params['attendance_check']=='present')
		{
			$ATTENDANCE="SELECT *FROM student_attendance 
			where attendance_student_id='".$params['student_id']."' and attendance_check='P'";
			$ATTENDANCE_RES = $objDb->getAll($ATTENDANCE);
			
		}
		else if($params['attendance_check']=='total')
		{
			$ATTENDANCE="SELECT *FROM student_attendance 
			where attendance_student_id='".$params['student_id']."'";
			$ATTENDANCE_RES = $objDb->getAll($ATTENDANCE);
			
		}
		return  count($ATTENDANCE_RES);
	}
	else if($params['att_type']=='percent')
	{
		$total_attendance=getAttendance(Array('attendance_check'=>'total', 'att_type'=>'flat', 'student_id'=>$params['student_id']));
		if($params['attendance_check']=='absent')
		{
			$ATTENDANCE="SELECT *FROM student_attendance 
			where attendance_student_id='".$params['student_id']."' and attendance_check='A'";
			$ATTENDANCE_RES = $objDb->getAll($ATTENDANCE);
			
		}
		else if($params['attendance_check']=='present')
		{
			$ATTENDANCE="SELECT *FROM student_attendance 
			where attendance_student_id='".$params['student_id']."' and attendance_check='P'";
			$ATTENDANCE_RES = $objDb->getAll($ATTENDANCE);
			
		}
		if($total_attendance==0)
		{
			return $total_attendance . " %" ;
		}
		else
		{
			return ((count($ATTENDANCE_RES)/$total_attendance)*100)." %";
		}
	}
}

$objTpl->register_function('getAttendance', 'getAttendance');


$objTpl->assign('login_error', $login_error);
$objTpl->assign('unread', $unread);
$objTpl->assign('student', $student);
$objTpl->assign('classes', $classes);
$objTpl->assign('msg', $msg);

$objTpl->display('teacher/search.tpl');
?>