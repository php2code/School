<?php 
/* 
* Smarty plugin 
* ------------------------------------------------------------- 
* File:     function.displayImage.php 
* Author:   Dheeraj
* Type:     function 
* Name:     displayImage 
* Purpose:  Display the images as per condition.
* ------------------------------------------------------------- 
*/ 
function smarty_function_displayImage($params) 
{ 
	$showImage = $params['imagepath'].$params['imageFolder']."/".$params['imageName'];

	if(!empty($params['imageName']))
	{
		if(file_exists('../../'.$showImage))
			$displayImage = '<img src="'.$showImage.'" alt ="'.$params['alttag'].'" style="'.$params['styleTag'].'" width="101" height="68">';
		else
			$displayImage = '<img src="/images/portal/no-image.gif" style="float: left;">';
	}
	else
		$displayImage = '<img src="/images/portal/no-image.gif" style="float: left;">';

    return $displayImage; 
} 
?> 