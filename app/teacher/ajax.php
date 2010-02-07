<?
ob_start();
require_once('../../config/config.php');
//$_GET['letters']='A';
//$_GET['getByFirstName']='test';
if(isset($_GET['getByFirstName']) && isset($_GET['letters']))
{
	$letters = $_GET['letters'];
	$classId=$_GET['classId'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	//$sql="select studentId, firstName from student where firstName like '".$letters."%'";
	
		$sql = "
		SELECT 
			student.*, class.className,class.standard 
		FROM 
			student INNER JOIN class ON student.classId = class.id  
		WHERE 
			1=1";
			
	if($letters != "") {
		$subsql .= " AND student.firstName LIKE '".$letters."%'";
	}
	if($classId != "" ) {
		$subsql .= " AND student.classId = '".$classId."'";
	}
	
	$sql=$sql.$subsql;
	$searchResult = $objDb->getAll($sql);
	if(count($searchResult)>0)
	{
		foreach($searchResult as $k=>$v)
			echo $v['studentId']."###".$v['firstName']."|";
	}
	
}
if(isset($_GET['getByLastName']) && isset($_GET['letters']))
{
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	$classId=$_GET['classId'];
	//$sql="select studentId, lastName from student where lastName like '".$letters."%'";
	$sql = "
		SELECT 
			student.*, class.className,class.standard 
		FROM 
			student INNER JOIN class ON student.classId = class.id  
		WHERE 
			1=1";
			
	if($letters != "") {
		$subsql .= " AND student.lastName LIKE '".$letters."%'";
	}
	if($classId != "" ) {
		$subsql .= " AND student.classId = '".$classId."'";
	}
	
	$sql=$sql.$subsql;
	
	
	$searchResult = $objDb->getAll($sql);
	if(count($searchResult)>0)
	{
		foreach($searchResult as $k=>$v)
			echo $v['studentId']."###".$v['lastName']."|";
	}
}
?>