<?php
ob_start();
require_once('../../config/config.php');
require_once(INCLUDE_DIR.'messages.php');
$out = ob_get_clean();
if(!isset($_SESSION['userId'])) {
	header("location:".SITEURL."app/index.php");
	exit;
}

$user = $_SESSION['userId'];
$objMsg = new Messages();
$login_error = "";

if($_POST['act'] == "delete") {
	$msgId = $_POST['messageId'];
	$rs = $objMsg->setMessagesAsDeleted($msgId);
	if($rs) {
		$login_error = "Message deleted successfully.";
	} else {
		$login_error = "Some problem occured.Message not deleted.";
	}

}

if($_POST['act'] == "read") {
	$msgId = $_POST['messageId'];
	$message = $objMsg->messagesDetail($msgId);
	$objMsg->setMessagesAsRead($msgId);
	
	$objTpl->assign('login_error', $login_error);
	$objTpl->assign('message', $message);
	$objTpl->display('messages_read.tpl');
	exit;
}

if($_POST['act'] == "compose" || $_POST['act'] == "reply") {
	require_once(INCLUDE_DIR.'class.masterData.php');
	$objMaster = new MasterData();
	$schoolId = $_SESSION['schoolId'];
	$teachers = $objMaster->getAllTeachersOfSchool($schoolId);
	
	if($_POST['act'] == "reply") {
		$messageId = $_POST['messageId'];
		$message = $objMsg->messagesDetail($messageId);
		$message['message']=strip_tags($message['message']);
	}
	$objTpl->assign('login_error', $login_error);
	$objTpl->assign('message', $message);
	$objTpl->assign('teachers', $teachers);
	$objTpl->display('messages_compose.tpl');
	exit;
}

if($_POST['act'] == "send") {
	$toId = $_POST['toId'];
	$fromId = $_SESSION['userId'];
	$title = $_POST['title'];
	$message = $_POST['message'];

	$rs = $objMsg->sendMessage($toId, $fromId, $title, $message);
	if($rs) {
		$login_error = "Message send successfully.";
	}
}

$messages = $objMsg->getUserMessages($user);
//$unread = $objUser->getUnreadMsgs();
$objTpl->assign('login_error', $login_error);
$objTpl->assign('unread', $unread);
$objTpl->assign('messages', $messages);
$objTpl->display('messages.tpl');
?>