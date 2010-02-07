<?php
function strarg_($str)
{
	$tr = array();
	$p = 0;

	for ($i=1; $i < func_num_args(); $i++) {
		$arg = func_get_arg($i);
		
		if (is_array($arg)) {
			foreach ($arg as $aarg) {
				$tr['%'.++$p] = $aarg;
			}
		} else {
			$tr['%'.++$p] = $arg;
		}
	}
	
	return strtr($str, $tr);
}

function smarty_modifier_t($text)
{
	$text = stripslashes($text);
	
	$params=func_get_args();
	unset($params[0]);
	
	// set escape mode
	if (isset($params['escape'])) {
		$escape = $params['escape'];
		unset($params['escape']);
	}
	
	// set plural version
	if (isset($params['plural'])) {
		$plural = $params['plural'];
		unset($params['plural']);
		
		// set count
		if (isset($params['count'])) {
			$count = $params['count'];
			unset($params['count']);
		}
	}
	
	// use plural if required parameters are set
	if (isset($count) && isset($plural)) {
		$text = ngettext($text, $plural, $count);
	} else { // use normal
		$text = gettext($text);
	}

	// run strarg if there are parameters
	if (count($params)) {
		$text = strarg_($text, $params);
	}

	if ($escape == 'html') { // html escape, default
	   $text = nl2br(htmlspecialchars($text));
   } elseif (isset($escape) && ($escape == 'javascript' || $escape == 'js')) { // javascript escape
	   $text = str_replace('\'','\\\'',stripslashes($text));
   }

	return $text;
}

?>