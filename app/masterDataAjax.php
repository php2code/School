<?php
ob_start();
require_once('../config/config.php');
require_once(INCLUDE_DIR.'class.masterData.php');
$out = ob_get_clean();
$objMaster = new MasterData();

$id = $_POST['id'];
$table = $_POST['tableName'];

$option="var optData = new Object();";

if($table == 'states') {
	$dataArr = $objMaster->getStatesOfCountry($id);
	$option.="optData['']='--Select--';";
	foreach($dataArr as $data) {
		$option.="optData[".$data['stateId']."]='".$data['stateName']."';";
	}
}

if($table == 'cities') {
	$dataArr = $objMaster->getCitiesOfState($id);
	$option.="optData['']='--Select--';";
	foreach($dataArr as $data) {
		$option.="optData[".$data['cityId']."]='".$data['cityName']."';";
	}
}

if($table == 'schools') {
	$dataArr = $objMaster->getSchoolsOfCity($id);
	$option.="optData['']='--Select--';";
	foreach($dataArr as $data) {
		$option.="optData[".$data['schoolId']."]='".$data['schoolName']."';";
	}
}

if($table == 'student') {
	$dataArr = $objMaster->getStudentsOfClass($id);
	$option.="optData['']='--Select--';";
	foreach($dataArr as $data) {
		$option.="optData[".$data['studentId']."]='".$data['name']."';";
	}
}

echo  $option.="";
exit;
?>