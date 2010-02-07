<?php
ob_start();
require_once('../../config/config.php');
if(!isset($_SESSION['userId'])) {
	header("location:".SITEURL."app/index.php");
	exit;
}
require_once(INCLUDE_DIR.'teacher.php');
$out = ob_get_clean();
$user = $_SESSION['userId'];
$objUser = new Teacher($user);
$student = $objUser->getUserDetails();

$unread = $objUser->getUnreadMsgs();

$objTpl->assign('login_error', $login_error);
$objTpl->assign('unread', $unread);
$objTpl->assign('student', $student);
$objTpl->assign('countries', $countries);
$objTpl->display('teacher/home.tpl');
?>