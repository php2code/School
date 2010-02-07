<?php
class Messages {
	public $userId;
	
	/*function student($userId) {
		global $objDb;
		$this->userId = $userId;
	}*/

	function getUserMessages($user, $teacherYn=0) {
		global $objDb;
		$tbl = "teacher";
		if($teacherYn == 1) {
			$tbl = "student";
		}
		$msgs = $objDb->getAll("
			SELECT 
				messages.*, Date_format(messages.created,'%d-%b-%Y %T') as msg_date  ,CONCAT_WS(' ',".$tbl.".firstName, ".$tbl.".lastName) AS fromName
			FROM 
				messages
				INNER JOIN ".$tbl." ON ".$tbl.".".$tbl."Id = messages.fromId
			WHERE 
				messages.toId = '".$user."' AND messages.deleted = 0");
				
		return $msgs;
	}

	function getUnreadMsgs() {
		global $objDb;
		$unread = $objDb->getOne("SELECT count(*) FROM messages WHERE toId = '".$this->userId."' AND viewed=0");
		
		return $unread;
	}

	function messagesDetail($id, $teacherYn=0) {
		global $objDb;
		$tbl = "teacher";
		if($teacherYn == 1) {
			$tbl = "student";
		}
		$message = $objDb->getRow("
			SELECT 
				messages.*, CONCAT_WS(' ',".$tbl.".firstName, ".$tbl.".lastName) AS fromName, ".$tbl.".email
			FROM 
				messages
				INNER JOIN ".$tbl." ON ".$tbl.".".$tbl."Id = messages.fromId
			WHERE 
				messages.id = '".$id."'");
		
		return $message;
	}

	function setMessagesAsRead($id) {
		global $objDb;
		$rs = $objDb->Execute("UPDATE messages SET viewed = 1 WHERE id = $id");
		if($rs) {
			return true;
		} else {
			return false;
		}
	}

	function setMessagesAsDelete($id) {
		global $objDb;
		$rs = $objDb->Execute("UPDATE messages SET deleted = 1 WHERE id = $id");
		if($rs) {
			return true;
		} else {
			return false;
		}
	}

	function sendMessage($toId, $fromId, $title, $message) {
		global $objDb;
		$rs = $objDb->Execute("
			INSERT INTO 
				messages 
			SET 
				title	= '$title',
				message = '$message',
				fromId	= '$fromId',
				toId	= '$toId',
				created =  now()
		");
		if($rs) {
			return true;
		} else {
			return false;
		}
	}
}
?>