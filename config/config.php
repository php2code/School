<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1") {
    define('LOCAL_MODE', true);
} else {
 	define('LOCAL_MODE', false);
}
//**********************************************
// Database info BEGIN
//**********************************************

// First Database Information

if(LOCAL_MODE) {
	$db_driver[0]		= "mysql";
	$db_user[0]			= "root";
	$db_pass[0]			= "";
	$db_host[0]			= "localhost";
	$db_name[0]			= "school";
	define('SITEURL'	, 'http://localhost/school/');
 } else {
 
 /*
	$db_driver[0]		= "mysql";
	$db_user[0]			= "infoinno_school";
	$db_pass[0]			= "nHbYJEaMc2Vg";
	$db_host[0]			= "localhost";
	$db_name[0]			= "infoinno_school";
	define('SITEURL'	,   'http://infoinnovative.net/school/');
	*/
	$db_driver[0]		= "mysql";
	$db_user[0]			= "appuinfo_school";
	$db_pass[0]			= "school123";
	$db_host[0]			= "localhost";
	$db_name[0]			= "appuinfo_school";
	define('SITEURL'	,   'http://app4u.info/school/');
	
}	

// File System Path
$temp=dirname(__FILE__);
$temp=str_replace('\\' ,'/',$temp);
$temp = substr($temp, 0, strrpos($temp, '/'));

// definging site paths-->
define('SITE_FS_PATH',$temp);

//Common vars
define('APP_RECORD_PER_PAGE', 10);

define('ROOT_DIR'		,   $temp);
define('INCLUDE_DIR'	,   ROOT_DIR."/includes/");
define('LIBS_DIR'		,   ROOT_DIR."/libs/");      
define('SMARTY_DIR'		,   LIBS_DIR."smarty/");
define('TEMPLATES_DIR'	,   ROOT_DIR."/templates/");
define('TEMPLATES_C_DIR',   ROOT_DIR."/templates_c/");

//smarty files
require_once(SMARTY_DIR."SmartyML.php");

//database files
require_once(LIBS_DIR.'adodb/adodb.inc.php');
//include_once(INCLUDE_DIR.'class.dbConnect.php');
//include_once(LIBS_DIR.'adodb/adodb-pager.inc.php'); 
$db_id	= 0;
$objDb	= NewADOConnection("$db_driver[$db_id]"); // A new connection
$db		= $objDb->Connect("$db_host[$db_id]", "$db_user[$db_id]", "$db_pass[$db_id]", "$db_name[$db_id]");


//smarty object
$objTpl		=   new smartyML();
$objTpl->assign('ROOT_DIR', ROOT_DIR);
$objTpl->assign('SITEURL', SITEURL);

require_once(INCLUDE_DIR.'class.masterData.php');
$objMaster = new MasterData();
$countries = $objMaster->getAllCountries();
$objTpl->assign('countries', $countries);
?>
