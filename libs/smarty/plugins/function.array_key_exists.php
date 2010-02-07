<?php
/**

 Created by praveen kumar gupta


 */


function smarty_function_array_key_exists($params, &$smarty)
{
    if (!isset($params['key'])) {
        $smarty->trigger_error("array_key_exists: missing 'key' parameter");
        return;
    }

    if (!isset($params['array'])) {
        $smarty->trigger_error("array_key_exists: missing 'array' parameter");
        return;
    }

    if (!isset($params['assign'])) {
        $smarty->trigger_error("array_key_exists: missing 'assign' parameter");
        return;
    }

	if(!is_array($params['array']))
	{
	    $smarty->trigger_error("array_key_exists: Invalid 'array' parameter irt must be an array");
        return;
	}

   if(array_key_exists($params['key'],$params['array']))
	{
       $smarty->assign($params['assign'],1);
	   return;
	}else{
	   $smarty->assign($params['assign'],0);
	   return;
	}

}

/* vim: set expandtab: */

?> 