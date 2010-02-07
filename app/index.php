<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
require_once('../config/config.php');
require_once(INCLUDE_DIR.'class.masterData.php');


$out = ob_get_clean();

$objMaster = new MasterData();
if(isset($_SESSION['userType']))
{
	if($_SESSION['userType']=="1")
		header("location: student/home.php");
	else
		header("location: teacher/home.php");
}
/*

test comment by ritesh
sfdsdf
if($_POST) {
	$countryId = $_POST['countryId'];
	$stateId = $_POST['stateId'];
	$cityId = $_POST['cityId'];
	$schoolId = $_POST['schoolId'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$user = $objMaster->checkUser($username, $password, $schoolId, $cityId, $stateId, $countryId);
	if(!$user) {
		$login_error = "Username or password not matched. Please try again !!!.";
	} else {
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
						
			header("Location:student/home.php");
		} else if($user['userType'] == 2) {
			require_once(INCLUDE_DIR.'teacher.php');
			$objUser = new Teacher($user['userId']);
			
			$_SESSION['objUser'] = serialize($objUser);
			header("Location:teacher/home.php");

		}
	}
}
*/



if($_GET['act']=="logout") {
	unset($_SESSION['userId']);
	session_destroy();
	header("location:index.php");
}
$tpl_display='index.tpl';
if($_REQUEST['action']=="submit")
{
	$states=$objMaster->getStatesOfCountry($_REQUEST['countryId']);
	$cities=$objMaster->getCitiesOfState($_REQUEST['stateId']);
	$schools=$objMaster->getSchoolsOfCity($_REQUEST['cityId']);
	$objTpl->assign('states', $states);
	$objTpl->assign('cities', $cities);
	$objTpl->assign('schools', $schools);
	$tpl_display='login.tpl';
}
//$countries = $objMaster->getAllCountries();

$objTpl->assign('login_error', $login_error);
$objTpl->assign('sess', $sess);

//$objTpl->assign('countries', $countries);

$objTpl->display($tpl_display);
?>