<?php

/*

Cretated by praveen
To compare  two date String
@param  date1
@param  date2
@param  assign
@parm   operation

date1 must be in a data string 	  that is valid in for strtotime function in php  
date2 must be in a data string 	  that is valid in for strtotime function in php  
assign	  is  the name of variable  result will be assigned
operation is  one of gt,gte ,lt ,lte ,eq , neq 

*/


function smarty_function_date_compare($params, &$smarty)
{
    if (!isset($params['date1'])) {
        $smarty->trigger_error("date_compare: missing 'date1' parameter");
        return;
    }

    if (!isset($params['date2'])) {
        $smarty->trigger_error("date_compare: missing 'date2' parameter");
        return;
    }

    if (!isset($params['assign'])) {
        $smarty->trigger_error("date_compare: missing 'assign' parameter");
        return;
    }
	  if (!isset($params['operation'])) {
        $smarty->trigger_error("date_compare: missing 'operation' parameter");
        return;
    }

	$date1time=strtotime($params['date1']);
	$date1=new Date($date1time);

	$date2time=strtotime($params['date2']);
	$date2=new Date($date2time);

	switch($params['operation'])
	{
	  case 'eq':
				if($date1->timestamp==$date2->timestamp)
				{
				       $smarty->assign($params['assign'],1);
				       return;
				}else{
				      $smarty->assign($params['assign'],0);
				     return;
				}
				break;
	  case 'neq':
				if($date1->timestamp!=$date2->timestamp)
				{
				       $smarty->assign($params['assign'],1);
				       return;
				}else{
				      $smarty->assign($params['assign'],0);
				     return;
				}
				break;
	   case 'lt':
				if($date1->timestamp<$date2->timestamp)
				{
				       $smarty->assign($params['assign'],1);
				       return;
				}else{
				      $smarty->assign($params['assign'],0);
				     return;
				}
				break;
	   case 'lte':
			if($date1->timestamp<=$date2->timestamp)
			{
				   $smarty->assign($params['assign'],1);
				   return;
			}else{
				  $smarty->assign($params['assign'],0);
				 return;
			}
			break;

	  case 'gt':
				if($date1->timestamp>$date2->timestamp)
				{
				       $smarty->assign($params['assign'],1);
				       return;
				}else{
				      $smarty->assign($params['assign'],0);
				     return;
				}
				break;

	   case 'gte':

			if($date1->timestamp>=$date2->timestamp)
			{
				   $smarty->assign($params['assign'],1);
				   return;
			}else{
				  $smarty->assign($params['assign'],0);
				 return;
			}
			break;
	}
	$smarty->trigger_error("date_compare: Invalid 'operation' parameter must be  one of eq,neq,lt.lte,gt  or  gte");
	return;
}

/* vim: set expandtab: */

?> 