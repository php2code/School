<?php
class Teacher {
	public $userId;
	
	function teacher($userId) {
		global $objDb;
		$this->userId = $userId;
	}

	function getUserDetails() {
		global $objDb; 
	
		$userDetails = $objDb->getRow("SELECT * FROM teacher WHERE teacherId = '".$this->userId."'");
		
		$user = $objDb->getRow("SELECT * FROM users WHERE userId = '".$this->userId."'");
		
		$countryName = $objDb->getOne("SELECT countryName FROM country WHERE countryId = '".$user['countryId']."'");
		$userDetails['countryName'] = $countryName;

		$stateName = $objDb->getOne("SELECT stateName FROM states WHERE stateId = '".$user['stateId']."'");
		$userDetails['stateName'] = $stateName;
//echo "SELECT cityName FROM cities WHERE cityId = '".$userDetails['cityId']."'";
		$cityName = $objDb->getOne("SELECT cityName FROM cities WHERE cityId = '".$user['cityId']."'");
		$userDetails['cityName'] = $cityName;

		$schoolName = $objDb->getOne("SELECT schoolName FROM schools WHERE schoolId = '".$user['schoolId']."'");
		$userDetails['schoolName'] = $schoolName;

		return $userDetails;
	}

	function getUnreadMsgs() {
		global $objDb;
		$unread = $objDb->getOne("SELECT count(*) FROM messages WHERE toId = '".$this->userId."' AND viewed=0");
		
		return $unread;
	}
}