<?php
// TEST SESSIONS
session_start();

$sessionTest = $_SESSION['sessionTest'];
//$sessionTest = "x"; ////////////////////////////////////////////////////////////////////////////////////
if ($sessionTest!="1234567890") {

  if ($_REQUEST[st]=="x") {
    $sesTest = "Fail";
	$sessionsColor = "red";
	}
  else {
    $_SESSION['sessionTest'] = "1234567890";
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">";
    echo "<html><head>";
    echo "<title>Easy PHP Calendar - Compatability Tester</title>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
    echo "<META HTTP-EQUIV=\"refresh\" content=\"2;URL=".$PHP_SELF."?st=x\">";
    echo "</head><body>";
    echo "<script type=\"text/javascript\">function reload(){window.location.href = \"".$PHP_SELF."?st=x\";}setTimeout(\"reload();\", 3000);</script>";
    echo "<center>Easy PHP Calendar Test Script<br /><br />Testing sessions...</center><br />";
	echo "<center><a href=".$PHP_SELF."?st=x>Click here to continue...</a></center>";
    echo "</body></html>";
    exit;
    }
  }

else {
  $sesTest = "Pass";
  $sessionsColor = "green";
  }

// FAILURE MESSAGES
$ionFail = "<p>* It seems this server is configured in such a way that it would not be possible to run the scripts using the ionCube Loader. The Testing Results above may provide additional information. If the Zend Optimizer test was successful, you can still run the EasyPHPCalendar.</p>";
$zendFail = "<p>* We were unable to determine if a compatible version of Zend Optimizer could be found on this server. In order to run the Easy PHP Calendar, your web host provider should install the latest version of Zend Optimizer on the server (or the server must have passed the ionCube Loader test). Zend Optimizer is free and more information can be found at <a href=\"http://www.zend.com/store/products/zend-optimizer.php\" target=\"_blank\">www.zend.com.</a></p>";
$phpFail = "<p>* The version of PHP on this server is not compatible with the calendar script. Your web host provider would need to upgrade PHP to Version 4.1.0 or greater.</p>";
$sessionsFail = "<p>* The sessions test failed. This means that the parts of the calendar script that require you to log in would not be functional (the Setup Manager and the Event Manager). However, this can be easily fixed by most web host providers. Some hosts may require you to add your own tmp directory in the root directory of your web site (Yahoo for example). Please contact your provider for assistance.</p>";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Easy PHP Calendar - Compatibility Test Script</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style1 {font-size: 9px}
.style2 {color: #FFFFCC}
.style7 {
	font-size: 18px;
	font-weight: bold;
}
.style8 {font-size: 12px; }
.style11 {color: #003399}
.style12 {
	color: #FFFF00;
	font-weight: bold;
}
body {
	background-color: #00497B;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style13 {
	color: #990000;
	font-weight: bold;
}
.style14 {font-size: 16px}
.style15 {
	color: #006699;
	font-weight: bold;
}
.style16 {color: #FFFF00}
.style17 {color: #990000}
.style18 {font-size: 11px}
.style19 {color: #FFFFFF}
.style21 {color: #FFFFFF; font-weight: bold; }
-->
</style>
</head>
<body>
 <div align="center"><img src="pageHeader.jpg" alt="Easy PHP Calendar" width="740" height="80"> </div>
 <table width="740" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF">
   <tr>
     <td><p align="center" class="style7">Compatibility Test Script</p>
       <div align="center" class="style14"></div>
       <table width="100%" border="0" align="center" cellpadding="3" cellspacing="2">
         <tr>
           <td width="150" align="left" valign="top" bgcolor="#006699" class="style2">
             <?php
// CHECK PHP VERSION
$phpVerCk = explode(".",phpversion());
$phpVerCk = $phpVerCk[0].".".$phpVerCk[1];

if ((float)$phpVerCk < "4.1") {
  $phpver = "Fail";
  $phpColor = "red";
  }
else {
  $phpver = "Pass";
  $phpColor = "green";
  $phpVersion = explode(".",phpversion());
  $phpVersion = $phpVersion[0];
  }
?>
             <strong>PHP Version</strong></td>
           <td bgcolor="#F3F3F3"><font color=<?php echo $phpColor ?>><strong><?php echo $phpver ?></strong><?php echo " [Version ".phpversion()."]" ?></font></td>
         </tr>
         <tr>
           <td align="left" valign="top" bgcolor="#006699" class="style2"><strong>Sessions Support</strong></td>
           <td bgcolor="#E6E6E6"><strong><font color=<?php echo $sessionsColor ?>><? echo $sesTest ?></font></strong></td>
         </tr>
         <tr>
           <td align="left" valign="top" bgcolor="#274A72"><span class="style2">
             <?php
// TEST ZEND OPTIMIZER
ob_start();
phpinfo(INFO_GENERAL);
$output = ob_get_contents();
ob_end_clean();
$output = str_replace(array("&gt;", "&lt;", "&quot;", "&amp;", "&#039;", "&nbsp;"), array(">", "<", "\"", "&", "'", " "), $output);

if (strstr($output, "Zend Optimizer")) {

  // GET ZEND VERSION NUMBER
  $version = split("Zend Optimizer",$output);
  $version = split(",",$version[1]);
  $version = trim($version[0]);
  //$version = "v2.5.4";

  if (!strstr($version,"v")) {
    $zend = "Zend Optimizer Detected - Unknown Version";
    $zendColor = "Blue";
    $version = "0";
	}
  else {
    $version = str_replace("v","",$version);
	
	$version = explode(".",$version);
	$subVersion = $version[2];
	$dummy = array_pop($version);
	$version = implode(".",$version);
	
	if (($version > "2.5") || ($version=="2.5" && $subVersion>5)) {
      $zend = "Pass";
      $zendColor = "green";
	  }
	else {
      $zend = "Fail - Installed Version: ".$version.".".$subVersion;
      $zendColor = "red";
      }	  
	}
  } 
else {
  $zend = "Fail - Zend Optimizer Not Detected";
  $zendColor = "red";
  }

// IS PHPINFO DISABLED?
if (strstr($output, "has been disabled")) {
  $zend = "Unable to determine - phpinfo() is disabled";
  $zendColor = "blue";
  }
?>
             <strong>Zend Optimizer</strong></span>
           </td>
           <td bgcolor="#F3F3F3"><strong><font color=<?php echo $zendColor ?>><?php echo $zend ?></font></strong>
               <?php
if ($zend!="Pass") {?>
               <p><em>Zend Optimizer must be Version 2.5.5 or greater! Ask your web host provider if you are unsure. The latest version of Zend Optimizer can be downloaded from <a href="http://www.zend.com/store/products/zend-optimizer.php" target="_blank">www.zend.com</a>. </em></p>
               <?php } ?></td>
         </tr>
         <tr>
           <td align="left" valign="top" bgcolor="#274A72"><?php
// TEST IONCUBE
ob_start();
require("ioncube.php");
$output = ob_get_contents();
ob_end_clean();

if (strstr($output, "Successful")) {
  $ion = "Pass";
  $ionColor = "green";
  }
else {
  $ion = "Fail";
  $ionColor = "red";
  }
?>
               <span class="style2"><strong>ionCube Loader</strong></span></td>
           <td bgcolor="#E6E6E6"><strong><font color=<?php echo $ionColor ?>><?php echo $ion ?></font></strong>
               <p><font color=gray> <strong>Testing Results:</strong> <?php echo $output; ?> </font></p>
               <p><em>Even if the ionCube results are successful, there may be additional steps required for this success which would be outlined in the Testing Results above. The most common requirement would be the use of a run-time loader. </em></p>
               <p><strong><em><span class="style17">Several common loaders are already included in the trial download. <br>
               Other loaders are available directly from</span> <a href="http://www.ioncube.com/loaders.php" target="_blank">www.ioncube.com</a>.</em></strong> (<a href="https://www.easyphpcalendar.com/support/index.php?_m=knowledgebase&_a=viewarticle&kbarticleid=30&nav=0" target="_blank">Knowledgebase</a>)</p></td>
         </tr>
       </table>
              <br>
       <?php
if ($ion=="Pass" || $zend=="Pass" || $zendColor=="blue") {
?>
       <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" bgcolor="#FFFFFF">
         <tr>
           <td align="center" valign="middle" bgcolor="#006600"><span class="style11 style8 style12">This server appears compatible with the Easy PHP Calendar! <br>
<?php if ($zendColor=="blue") echo "<br /><font color=orange>However, we were unable to determine if Zend Optimizer was installed.</font><br /><br />"; ?>
           </span><span class="style8 style16">Download and install the trial version to confirm compatibility.</span> </td>
         </tr>
         <tr>
           <td align="center" valign="middle" bgcolor="#FFFF66"><span class="style11 style8 style12"><p><span class="style15">Download the Trial Version:</span></p>
               </span>
<?php
if ($phpVersion!=5) { ?>
             <table width="325" border="0" cellspacing="1" cellpadding="4">
               <tr align="center" bgcolor="#993300">
                 <td width="33%" align="left" bgcolor="#662100"><span class="style12">PHP 4.x</span></td>
                 <td width="34%"><span class="style19"><strong>Zend</strong> <span class="style1">[Preferred]</span></span></td>
                 <td width="33%" bgcolor="#D24400"><span class="style21">ionCube</span></td>
               </tr>
               <tr align="center">
                 <td align="left" bgcolor="#006633"><span class="style21">Zip File </span></td>
                 <td bgcolor="#E6E6E6"><?php if ($zend=="Pass" || $zendColor=="blue") {?><a href="http://www.easyphpcalendar.com/getFile/?file=zc">Download</a><?php } else {echo "NA";} ?></td>
                 <td bgcolor="#E6E6E6"><?php if ($ion=="Pass") {?><a href="http://www.easyphpcalendar.com/getFile/?file=ic">Download</a><?php } else {echo "NA";} ?></td>
               </tr>
               <tr align="center">
                 <td align="left" bgcolor="#005128"><span class="style21">Auto-Installer</span></td>
                 <td bgcolor="#E6E6E6"><?php if ($zend=="Pass" || $zendColor=="blue") {?><a href="http://www.easyphpcalendar.com/getFile/?file=za">Download</a><?php } else {echo "NA";} ?></td>
                 <td bgcolor="#E6E6E6"><?php if ($ion=="Pass") {?><a href="http://www.easyphpcalendar.com/getFile/?file=ia">Download</a><?php } else {echo "NA";} ?></td>
               </tr>
             </table>
             <br>
<?php } else { ?>
            <table width="325" border="0" cellspacing="1" cellpadding="4">
               <tr align="center" bgcolor="#993300">
                 <td width="33%" align="left" bgcolor="#662100"><span class="style12">PHP 5.x</span></td>
                 <td width="34%"><span class="style19"><strong>Zend</strong> <span class="style1">[Preferred]</span></span></td>
                 <td width="33%" bgcolor="#D24400"><span class="style21">ionCube</span></td>
               </tr>
               <tr align="center">
                 <td align="left" bgcolor="#006633"><span class="style21">Zip File </span></td>
                 <td bgcolor="#E6E6E6"><?php if ($zend=="Pass" || $zendColor=="blue") {?><a href="http://www.easyphpcalendar.com/getFile/?file=zc5">Download</a><?php } else {echo "NA";} ?></td>
                 <td bgcolor="#E6E6E6"><?php if ($ion=="Pass") {?><a href="http://www.easyphpcalendar.com/getFile/?file=ic5">Download</a><?php } else {echo "NA";} ?></td>
               </tr>
               <tr align="center">
                 <td align="left" bgcolor="#005128"><span class="style21">Auto-Installer</span></td>
                 <td bgcolor="#E6E6E6"><?php if ($zend=="Pass" || $zendColor=="blue") {?><a href="http://www.easyphpcalendar.com/getFile/?file=za5">Download</a><?php } else {echo "NA";} ?></td>
                 <td bgcolor="#E6E6E6"><?php if ($ion=="Pass") {?><a href="http://www.easyphpcalendar.com/getFile/?file=ia5">Download</a><?php } else {echo "NA";} ?></td>
               </tr>
             </table><br>
<?php } ?>
             <span class="style17 style18">The auto-installer works just like most installers for programs downloaded from the internet. <br>
             Simply run the installer then enter the FTP login and server path information (usually www or public_html).<br>
The installer will then upload all of the files in the correct format and set permissions where needed.<br>
No more worrying about binary or ASCII modes or file permissions. The installer does all of the work for you!<br>
*The auto-installer can be run on Microsoft Windows and uploaded to any type of web server. <br>
<br>
</span></td>
         </tr>
       </table>       
       <br>
       <?php } ?>
       <?php
if (($ion!="Pass" && $zend!="Pass") && ($phpver=="Pass" && $sesTest=="Pass")) {
?>
       <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" bgcolor="#FFDC4F">
         <tr>
           <td align="center" valign="middle"><span class="style13">Sorry! This server is NOT compatible with the Easy PHP Calendar!</span></td>
         </tr>
       </table>
       
       <br>
       <?php 
	   } 
if ($ion!="Pass" || $zend!="Pass" || $phpver!="Pass" || $sesTest!="Pass") {
?>
       <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2">
         <tr>
           <td bgcolor="#EAB8B5"><strong>Failure Messages and Suggestions:</strong></td>
         </tr>
         <tr>
           <td bgcolor="#FCEBDC"><p>
               <?php
if ($phpver!="Pass") echo $phpFail;
if ($sesTest!="Pass") echo $sessionsFail;
if ($zend!="Pass") echo $zendFail;
if ($ion!="Pass") echo $ionFail;
?>
           </p></td>
         </tr>
       </table>
              <br>
       <?php } ?>
       <table width="100%" border="0" align="center" cellpadding="8" cellspacing="2">
         <tr>
           <td bgcolor="#E6E6DF"><strong>Frequently Asked Questions:</strong></td>
         </tr>
         <tr>
           <td bgcolor="#F9F9F7"><p><strong>Q:</strong> Why do I need Zend Optimizer or ionCube Encoder?<br>
                   <br>
                   <strong>A:</strong> The Easy PHP Calendar is encoded which makes the actual code unreadable  to all but servers that support the proper 'decoders'. This is done to  protect our intellectual property and to allow us to offer a free trial  version. However, the calendar is designed in such a way as to give a  great level of control over the look and actions of the script without  the need to view or  modify the source code.</p></td>
         </tr>
         <tr>
           <td bgcolor="#F1F1ED"><strong>Q:</strong> What if both decoder tests fail and I want to run the Easy PHP Calendar?<br>
               <br>
               <strong>A: </strong>You should check with your web host provider to see if they will install the necessary components and/or configure the server for these two common encoders. Most servers should easily support both options and they are free for web hosts to install/configure on their server(s). </td>
         </tr>
         <tr>
           <td bgcolor="#F9F9F7"><strong>Q: </strong>Is there a recommended web host provider that fully supports the Easy PHP Calendar?<br>
             <strong><br>
      A: </strong>If your current host is unable to accommodate your needs or if you're just looking for a better hosting solution, we can recommend an excellent web host provider that supports all of the features required to run the Easy PHP Calendar. You can find out more at <a href="http://www.iHostParadise.com/" target="_blank">www.iHostParadise.com</a>.</td>
         </tr>
       </table>
     <p align="center" class="style1">:: Tester Version 1.9.7 | <a href="http://www.EasyPHPCalendar.com">Easy PHP Calendar</a> | Copyright 2006 <a href="http://www.nashtech.net/">NashTech, Inc.</a> ::</p></td>
   </tr>
 </table>
 <p align="center" class="style7">&nbsp;</p>
</body>
</html>
