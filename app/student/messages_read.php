<?php
ob_start();
require_once('../../config/config.php');
require_once(INCLUDE_DIR.'messages.php');
$out = ob_get_clean();
$user = $_SESSION['userId'];
$msgId = $_GET['id'];
$objMsg = new Messages();
$message = $objMsg->messagesDetail($msgId);
//$unread = $objUser->getUnreadMsgs();
$objTpl->assign('login_error', $login_error);
$objTpl->assign('unread', $unread);
$objTpl->assign('message', $message);
$objTpl->display('student/messages_read.tpl');
?>