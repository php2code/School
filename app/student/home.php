<?php
ob_start();
require_once('../../config/config.php');
if(!isset($_SESSION['userId'])) {
	header("location:".SITEURL."app/index.php");
	exit;
}
require_once(INCLUDE_DIR.'student.php');
$out = ob_get_clean();

if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
	$user = $_REQUEST['id'];
}
else
{
	$user = $_SESSION['userId'];
}
$objUser = new Student($user);
$student = $objUser->getUserDetails();
$unread = $objUser->getUnreadMsgs();

$objTpl->assign('login_error', $login_error);
$objTpl->assign('unread', $unread);
$objTpl->assign('student', $student);
$objTpl->display('student/home.tpl');
?>