<?php
ob_start();
require_once('../config/config.php');
require_once(INCLUDE_DIR.'class.masterData.php');
$out = ob_get_clean();
$objMaster = new MasterData();

$id = $_POST['id'];
$table = $_POST['tableName'];

$option="var optData = new Object();";

$countryId = $_POST['countryId'];
$stateId = $_POST['stateId'];
$cityId = $_POST['cityId'];
$schoolId = $_POST['schoolId'];

$username = $_POST['username'];
$password = $_POST['password'];

$user = $objMaster->checkUser($username, $password, $schoolId, $cityId, $stateId, $countryId);
if(!$user) 
{
	$login_error = "Username or password not matched. Please try again !!!.";
	$option.="optData['msg']='fail';";
} else 
{
	$_SESSION['userId']		= $user['userId'];
	$_SESSION['countryId']	= $user['countryId'];
	$_SESSION['stateId']	= $user['stateId'];
	$_SESSION['cityId']		= $user['cityId'];
	$_SESSION['schoolId']	= $user['schoolId'];
	$_SESSION['countryName']= $user['countryName'];
	$_SESSION['stateName']	= $user['stateName'];
	$_SESSION['cityName']	= $user['cityName'];
	$_SESSION['schoolName']	= $user['schoolName'];
	$_SESSION['userType'] = $user['userType'];
	$_SESSION['schoolLogo'] = $user['schoolLogo'];
	if($user['userType'] == 1) {
		require_once(INCLUDE_DIR.'student.php');
		$objUser = new Student($user['userId']);
		$_SESSION['objUser'] = serialize($objUser);
		$option.="optData['userType']='1';";					
		//header("Location:student/home.php");
	} else if($user['userType'] == 2) {
		require_once(INCLUDE_DIR.'teacher.php');
		$objUser = new Teacher($user['userId']);
		$option.="optData['userType']='2';";					
		$_SESSION['objUser'] = serialize($objUser);
		//header("Location:teacher/home.php");

	}
	$option.="optData['msg']='success';";
}
echo  $option;
exit;
?>