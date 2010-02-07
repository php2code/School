<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {print_textbox} function plugin
 *
 * File:       function.print_textbox.php<br>
 * Type:       function<br>
 * Name:       print_textbox<br>
 * Date:       05.Jan.2009<br>
 * Purpose:    Prints out a textbox input type<br>
 * Input:<br>
 *           - name       (optional) - string default "textbox"
 *           - value      (required) - string
 *           - size       (optional) - Size of textbox. Default is 24.
 *           - readonly   (optional) - boolean default not set. Use to set checkbox disabled.
 *           - output     (optional) - the output next to checkbox
 *           - assign     (optional) - assign the output as an array to this variable
 * Examples:
 * <pre>
 * {print_textbox value=$id output=$name}
 * {print_textbox value=$id name='box' size=20 readonly=true output=$name}
 * </pre>
 * @author     Ajay Singh <ajaysingh369@gmail.com>
 * @version    1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_print_textbox($params, &$smarty)
{
  require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');
  
  $name = 'textbox';
  $values = '';
  $output = '';
  $bytes = '';
  $type = 'text';
  $size = 24;
  $readonly = false;
      
  foreach($params as $_key => $_val) 
  {
    switch($_key) 
	{
      case 'name':
      case 'value':
      case 'output':
      case 'size':
      case 'bytes':
      case 'type':
        $$_key = $_val;
        break;

      case 'readonly':
        $$_key = (bool)$_val;
        break;

      case 'assign':
        break;
    }
  }

  $_html_result = smarty_function_print_textbox_output($output, $name, $size, $value, $bytes, $readonly, $type);

  if(!empty($params['assign'])) 
  {
    $smarty->assign($params['assign'], $_html_result);
  }
  else
  {
    return $_html_result;
  }
}  

function smarty_function_print_textbox_output($rowtitle, $name, $size, $value, $bytes, $readonly, $type) 
{
  $_output = '<tr>
					<td class="form1">';
  if(!empty($name) and $type == "text")
   {
      $_output .="<label for=\"$name\">";
   }
   $_output .= $rowtitle;
   if(!empty($name) and $type == "text")
   {
      $_output .="</label>";
   }
   
   $_output .="</td>";

   $sExtendedHelpVar = "owl_" . $name . "_extended";   
  /* if (!empty($owl_lang->{$sExtendedHelpVar}))
   {
       $extended_help=" onmouseover=\"return makeTrue(domTT_activate(this,event,'caption','" . addslashes($rowtitle) . "','content','". $owl_lang->{$sExtendedHelpVar} . "','lifetime', 3000, 'fade', 'both', 'delay', 10, 'statusText', ' ', 'trail', true))\";";
   }
   else
   {
       $extended_help="";
   }*/


if ($readonly)
   {
      $_output .="<td class=\"form1\" width=\"100%\"" . $extended_help . ">$value";    

      if(!empty($bytes))
      {
         $_output .=" ($bytes)";
      } 
      $_output .="</td>\n";
   }
   else
   {
      $_output .="<td class=\"form1\" width=\"100%\"><input class=\"finput1\" id=\"$name\" type=\"$type\" name=\"$name\" size=\"$size\" value=\"$value\"></input>";
      if(!empty($bytes))
      {
         $_output .="($bytes)";
      } 
      $_output .="</td>";

   }
   $_output .="</tr>\n";
					
  return $_output;
}

?>
