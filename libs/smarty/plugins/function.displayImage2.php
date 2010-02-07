<?php 
/* 
* Smarty plugin 
* ------------------------------------------------------------- 
* File:     function.displayImage2.php 
* Author:   Praveen
* Type:     function 
* Name:     displayImage2 
* Purpose:  Display the images as per condition.
* ------------------------------------------------------------- 
*/ 
function smarty_function_displayImage2($params) 
{ 
	$showImage = $params['imagepath'].$params['imageFolder']."/".$params['imageName'];
	 
	$attributeStr='';
	$overrideAtt=array('imagepath','imageFolder','imageName');

	if(is_array($params))
		foreach($params as $pname=>$pval)
		{
		  if(!in_array($pname,$overrideAtt))
		     $attributeStr.=" $pname=\"$pval\" ";
		}

    if(file_exists('../../'.$showImage))
	{
		    $displayImage = "<img src=\"$showImage\"  $attributeStr  />";
	}
	else
		 $displayImage = "<img src=\"/images/portal/no-image.gif\"  $attributeStr  />";
		

    return $displayImage; 
} 
?> 