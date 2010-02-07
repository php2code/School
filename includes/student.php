<?php
class Student {
	public $userId;
	
	function student($userId) {
		global $objDb;
		$this->userId = $userId;
	}

	function getUserDetails() {
		global $objDb;
		$userDetails = $objDb->getRow("SELECT * FROM student WHERE studentId = '".$this->userId."'");
		$user = $objDb->getRow("SELECT * FROM user WHERE userId = '".$this->userId."'");

		$countryName = $objDb->getOne("SELECT countryName FROM country WHERE countryId = '".$user['countryId']."'");
		$userDetails['countryName'] = $countryName;

		$stateName = $objDb->getOne("SELECT stateName FROM states WHERE stateId = '".$user['stateId']."'");
		$userDetails['stateName'] = $stateName;

		$cityName = $objDb->getOne("SELECT cityName FROM cities WHERE cityId = '".$user['cityId']."'");
		$userDetails['cityName'] = $cityName;

		$schoolName = $objDb->getOne("SELECT schoolName FROM schools WHERE schoolId = '".$user['schoolId']."'");
		$userDetails['schoolName'] = $schoolName;

		$teacherName = $objDb->getOne("SELECT CONCAT_WS(' ',teacher.firstName,teacher.lastName) AS teacherName FROM teacher WHERE teacherId = '".$userDetails['classTeacherId']."'");
		$userDetails['teacherName'] = $teacherName;

		$className = $objDb->getOne("SELECT className FROM class WHERE id = '".$userDetails['classId']."'");
		$userDetails['className'] = $className;
		
		return $userDetails;
	}

	function getUnreadMsgs() {
		global $objDb;
		$unread = $objDb->getOne("SELECT count(*) FROM messages WHERE toId = '".$this->userId."' AND viewed=0");
		
		return $unread;
	}
}
?>