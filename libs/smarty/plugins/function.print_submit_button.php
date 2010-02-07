<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {print_submit_button} function plugin
 *
 * File:       function.print_submit_button.php<br>
 * Type:       function<br>
 * Name:       print_submit_button<br>
 * Date:       05.Jan.2009<br>
 * Purpose:    Prints out a submit_button input type<br>
 * Input:<br>
 *           - name         (optional) - string
 *           - value        (required) - string
 *           - alt          (optional) - alt text.
 *           - confirm_text (optional) - Confirm box text.
 *           - sBtnUpClass  (optional) - css class that will aplly on mouseover. Default is fbuttonup1.
 *           - sBtnDownClass(optional) - css class that will aplly on mousedown. Default is fbuttondown1.
 *           - tabindex     (optional) - tabindex fo button.
 *           - assign       (optional) - assign the output as an array to this variable
 * Examples:
 * <pre>
 * {print_submit_button value='Login' alt=$name}
 * {print_submit_button value=$id name='box' confirm_text='Are you sure?' alt=$name}
 * </pre>
 * @author     Ajay Singh <ajaysingh369@gmail.com>
 * @version    1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_print_submit_button($params, &$smarty)
{
  require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');
  $value = "";
  $alt = "";
  $type = "submit";
  $name = "";
  $confirm_text = "";
  $sBtnUpClass = "fbuttonup1";
  $sBtnDownClass = "fbuttondown1";
  $tabindex = "";
  
  foreach($params as $_key => $_val) 
  {
    switch($_key) 
	{
      case 'value':
      case 'alt':
      case 'type':
      case 'name':
      case 'confirm_text':
      case 'sBtnUpClass':
      case 'sBtnDownClass':
      case 'tabindex':
        $$_key = $_val;
        break;
      
      case 'assign':
        break;
    }
  }

  $_html_result = smarty_function_print_submit_button_output($value, $alt, $type, $name, $confirm_text, $sBtnUpClass, $sBtnDownClass, $tabindex);

  if(!empty($params['assign'])) 
  {
    $smarty->assign($params['assign'], $_html_result);
  }
  else
  {
    return $_html_result;
  }
}  

function smarty_function_print_submit_button_output($value, $alt, $type, $name, $confirm_text, $sBtnUpClass, $sBtnDownClass, $tabindex) 
{
  $_output = "<input $tabindex class=\"$sBtnUpClass\" ";
  if(!empty($name))
  {
    $_output .= "name=\"$name\" ";
  }
  $_output .= "type=\"$type\" value=\"$value\" alt=\"$alt\" title=\"$alt\" onmouseover=\"highlightButton('$sBtnDownClass', this)\" onmouseout=\"highlightButton('$sBtnUpClass', this)\"";

  if(!empty($confirm_text))
  { 
    $_output .= " onclick=\"return confirm('$confirm_text');\"";
  }

  $_output .= "></input>";

  return $_output;
}

?>
