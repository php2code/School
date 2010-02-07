<?
ob_start();
error_reporting(0);

require_once('../config/config.php');

$xlsfile="attendance.csv";
$handle = fopen($xlsfile, "r"); //test.xls excel file name
if ($handle)
{
$array = explode("\n", fread($handle, filesize($xlsfile)));
}

$total_array = count($array);
$i = 0;

while($i < $total_array)
{
$data = explode(",", $array[$i]);
$sql = "insert into attendance_xls values ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
$result = mysql_query($sql);

$i++;
}
if($result==true)
{
echo "completed";
}
else
{
echo "failed";
}
?>