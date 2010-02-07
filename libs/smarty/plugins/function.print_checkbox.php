<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {print_checkbox} function plugin
 *
 * File:       function.print_checkbox.php<br>
 * Type:       function<br>
 * Name:       print_checkbox<br>
 * Date:       05.Jan.2009<br>
 * Purpose:    Prints out a checkbox input type<br>
 * Input:<br>
 *           - name       (optional) - string default "checkbox"
 *           - value      (required) - string
 *           - checked    (optional) - boolean default not set. Use to default checked the checkbox
 *           - readonly   (optional) - boolean default not set. Use to set checkbox disabled.
 *           - submit     (optional) - boolean default not set. Use to submit form on check.
 *           - output     (optional) - the output next to checkbox
 *           - assign     (optional) - assign the output as an array to this variable
 * Examples:
 * <pre>
 * {print_checkbox value=$id output=$name}
 * {print_checkbox value=$id name='box' readonly =true output=$names}
 * </pre>
 * @author     Ajay Singh <ajaysingh369@gmail.com>
 * @version    1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_print_checkbox($params, &$smarty)
{
  require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');
  
  $name = 'checkbox';
  $values = '';
  $output = '';
  $readonly = false;
  $checked = '';
  $submit = false;
    
  foreach($params as $_key => $_val) 
  {
    switch($_key) 
    {
      case 'name':
      case 'values':
      case 'output':
      case 'checked':
        $$_key = $_val;
        break;

      case 'readonly':
      case 'submit':
        $$_key = (bool)$_val;
        break;

      case 'assign':
        break;
    }
  }

  $_html_result = smarty_function_print_checkbox_output($name, $values, $output, $checked, $readonly, $submit);
//echo $_html_result; exit;
  if(!empty($params['assign'])) 
  {
    $smarty->assign($params['assign'], $_html_result);
  }
  else
  {
    return $_html_result;
  }
}  

function smarty_function_print_checkbox_output($name, $value, $output, $checked, $readonly, $submit) 
{
  if ($checked)
	{
		$checked = "checked='checked'";
	}
	if (!empty($readonly))
	{
		$readonly = "disabled='disabled'";
	}
	if (!empty($submit))
	{
		$submit = "onclick='javascript:this.form.submit()'";
	}
	$_output = '<tr>
					<td class="form1">'.$output.'</td>
						<td class="form1" width="100%">
						<input class="fcheckbox1" type="checkbox" name="'. smarty_function_escape_special_chars($name). '" value="'.smarty_function_escape_special_chars($value).'"'; 
   
  $_output .=$checked. $readonly. $submit. ' /></td></tr>';
   
  return $_output;
}

?>
