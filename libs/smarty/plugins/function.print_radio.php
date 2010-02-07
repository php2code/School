<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {print_radio} function plugin
 *
 * File:       function.print_radio.php<br>
 * Type:       function<br>
 * Name:       print_radio<br>
 * Date:       05.Jan.2009<br>
 * Purpose:    Prints out a radio input type<br>
 * Input:<br>
 *           - name       (optional) - string default "radio"
 *           - value      (required) - string
 *           - checked    (optional) - boolean default not set. Use to default checked the radio
 *           - readonly   (optional) - boolean default not set. Use to set radio disabled.
 *           - submit     (optional) - boolean default not set. Use to submit form on check.
 *           - output     (optional) - the output next to radio
 *           - assign     (optional) - assign the output as an array to this variable
 * Examples:
 * <pre>
 * {print_radio value=$id output=$name}
 * {print_radio value=$id name='box' readonly =true output=$names}
 * </pre>
 * @author     Ajay Singh <ajaysingh369@gmail.com>
 * @version    1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_print_radio($params, &$smarty)
{
  require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');
  $name = "";
  $iFileId = "";
  $readonly = false;
  $checked = false;
  $submit = false;
    
  foreach($params as $_key => $_val) 
  {
    switch($_key) 
	{
      case 'name':
      case 'value':
      case 'output':
      case 'fileId':
        $$_key = $_val;
        break;
      case 'option_text':
        $$_key = (array)$_val;
        break;

      case 'readonly':
      case 'checked':
        $$_key = (bool)$_val;
        break;

      case 'assign':
        break;
    }
  }

  $_html_result = smarty_function_print_radio_output($name, $value, $output, $option_text, $checked, $readonly, $fileId);

  if(!empty($params['assign'])) 
  {
    $smarty->assign($params['assign'], $_html_result);
  }
  else
  {
    return $_html_result;
  }
}  

function smarty_function_print_radio_output($name, $value, $output, $option_text, $checked, $readonly, $fileId) 
{
   $_output = "<tr>";
   $_output .= "<td class=\"form1\">$output</td>";
   $iValue = 0;
   $checked = "";

   $sExtendedHelpVar = "owl_" . $fieldname . "_extended";   
   /*if (!empty($owl_lang->{$sExtendedHelpVar}))
   {
       $extended_help=" onmouseover=\"return makeTrue(domTT_activate(this,event,'caption','" . addslashes($rowtitle) . "','content','". $owl_lang->{$sExtendedHelpVar} . "','lifetime', 3000, 'fade', 'both', 'delay', 10, 'statusText', ' ', 'trail', true))\";";
   }
   else
   {
		$extended_help="";
   }
   */
   $_output .= "<td class=\"form1\" width=\"100%\"" . $extended_help . ">";   

   foreach ($option_text as $caption)
   {
      if ($iValue == $value) 
      {
         $checked = "checked=\"checked\"";
      }
      $sReadonly = "";
      if($reaonly) {
        $sReadonly = "readonly";
      }
      $_output .= "<input $sReadonly type=\"radio\" value=\"$iValue\" name=\"$name" . $fileId ."\" $checked></input>$caption\n";
      $checked = "";
      $iValue++;
   }

   $_output .= "</td>\n</tr>";
  
  return $_output;
}

?>
