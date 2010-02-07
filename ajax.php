<?
ob_start();
require_once('config/config.php');
//$_GET['letters']='A';
//$_GET['getByFirstName']='test';
if(isset($_GET['getByFirstName']) && isset($_GET['letters']))
{
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	$sql="select studentId, firstName from student where firstName like '".$letters."%'";
	$searchResult = $objDb->getAll($sql);
	if(count($searchResult)>0)
	{
		foreach($searchResult as $k=>$v)
			echo $v['studentId']."###".$v['firstName']."|";
	}
	
}
?>