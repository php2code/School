<?
$dir="temp/";
if (isset($_REQUEST["file"])) 
{
    $file=$dir."sample_template.".$_REQUEST["file"];
	
    header("Content-type: application/force-download");
    header("Content-Transfer-Encoding: Binary");
    header("Content-length: ".filesize($file));
    header("Content-disposition: attachment; filename=".basename($file)."");
    readfile("$file");
} 
else 
{
    echo "No file selected";
}
 ?>