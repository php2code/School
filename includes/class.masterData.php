	<?php
class masterData {
	function getAllCountries() {
		global $objDb;
		$countries = $objDb->getAll("SELECT * FROM country ORDER BY countryName"); 
		return $countries;
	}

	function getStatesOfCountry($id) {
		global $objDb;
		$states = $objDb->getAll("SELECT * FROM states WHERE countryId = $id ORDER BY stateName"); 
		return $states;
	}
	
	
	function getStateById($state_id)
	{
		global $objDb;
		$states = $objDb->getAll("SELECT * FROM states WHERE stateId = '$state_id'"); 
		return $states;
	}

	function getCitiesOfState($id) {
		global $objDb;
		$cities = $objDb->getAll("SELECT * FROM cities WHERE stateId = $id ORDER BY cityName"); 
		return $cities;
	}

	function getSchoolsOfCity($id) {
		global $objDb;
		$schools = $objDb->getAll("SELECT schoolId, schoolName FROM schools WHERE cityId = $id ORDER BY schoolName"); 
		return $schools;
	}

	function getStudentsOfClass($id) {
		global $objDb;
		$schools = $objDb->getAll("SELECT studentId, CONCAT_WS(' ',firstName, lastName) AS name FROM student WHERE classId = $id ORDER BY name"); 
		return $schools;
	}

	function checkUser($username, $password, $schoolId="", $cityId="", $stateId="", $countryId="") {
		global $objDb;
		$sql = "SELECT * FROM users WHERE username = '".$username."'AND password = '".$password."'";
		if($schoolId != "") {
			$sql .= " AND schoolId = '".$schoolId."'";
		}

		if($cityId != "") {
			$sql .= " AND cityId = '".$cityId."'";
		}

		if($stateId != "") {
			$sql .= " AND stateId = '".$stateId."'";
		}

		if($countryId != "") {
			$sql .= " AND countryId = '".$countryId."'";
		}

		$user = $objDb->getRow($sql);

		if($user) {
			$countryName = $objDb->getOne("SELECT countryName FROM country WHERE countryId = '".$user['countryId']."'");
			$user['countryName'] = $countryName;

			$stateName = $objDb->getOne("SELECT stateName FROM states WHERE stateId = '".$user['stateId']."'");
			$user['stateName'] = $stateName;

			$cityName = $objDb->getOne("SELECT cityName FROM cities WHERE cityId = '".$user['cityId']."'");
			$user['cityName'] = $cityName;

			$schoolName = $objDb->getOne("SELECT schoolName FROM schools WHERE schoolId = '".$user['schoolId']."'");
			$user['schoolName'] = $schoolName;
			
			$schoolLogo = $objDb->getOne("SELECT schoolLogo FROM schools WHERE schoolId = '".$user['schoolId']."'");
			$user['schoolLogo'] = $schoolLogo;
		}

		return $user;
	}

	function getAllTeachersOfSchool($schoolId) {
		global $objDb;
		$teachers = $objDb->getAll("
			SELECT 
				teacher.teacherId, CONCAT_WS(' ',teacher.firstName,teacher.lastName) AS name 
			FROM 
				teacher
				INNER JOIN users ON users.userId = teacher.teacherId
			WHERE 
				users.schoolId = $schoolId ORDER BY name"); 
		return $teachers;
	}

	function getAllclassOfSchool($schoolId) {
		global $objDb;
		$classes = $objDb->getAll("
			SELECT 
				id, className 
			FROM 
				class
			WHERE 
				class.schoolId = $schoolId
				AND class.status = 1
		"); 
		return $classes;
	}

	function getClass($studentId) {
		global $objDb;
		$classId = $objDb->getOne("
			SELECT 
				classId 
			FROM 
				student
			WHERE 
				studentId = $studentId
		"); 
		return $classId;
	}
	
	
}
?>