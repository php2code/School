<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {print_selectbox} function plugin
 *
 * File:       function.print_selectbox.php<br>
 * Type:       function<br>
 * Name:       print_selectbox<br>
 * Date:       05.Jan.2009<br>
 * Purpose:    Prints out a selectbox input type<br>
 * Input:<br>
 *           - name       (optional) - string default "selectbox"
 *           - value      (required) - string
 *           - size       (optional) - Size of selectbox. Default is 24.
 *           - readonly   (optional) - boolean default not set. Use to set checkbox disabled.
 *           - output     (optional) - the output next to checkbox
 *           - assign     (optional) - assign the output as an array to this variable
 * Examples:
 * <pre>
 * {print_selectbox value=$id output=$name}
 * {print_selectbox value=$id name='box' size=20 readonly=true output=$name}
 * </pre>
 * @author     Ajay Singh <ajaysingh369@gmail.com>
 * @version    1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_print_selectbox($params, &$smarty)
{
  require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');
  
  $name = "selectbox";
  $output = "";
  $values = "";
  $currentvalue = "No value";
  $size = 1;
  $multiple = false;
  $standalone = false;

  foreach($params as $_key => $_val) 
  {
    switch($_key) 
	{
      case 'name':
      case 'output':
      case 'size':
      case 'bytes':
      case 'type':
      case 'currentvalue':
        $$_key = $_val;
        break;

      case 'values':
        $$_key = (array)$_val;
        break;

      case 'multiple':
      case 'standalone':
        $$_key = (bool)$_val;
        break;

      case 'assign':
        break;
    }
  }

  $_html_result = smarty_function_print_selectbox_output($output, $name, $values, $currentvalue, $size, $multiple, $standalone);

  if(!empty($params['assign'])) 
  {
    $smarty->assign($params['assign'], $_html_result);
  }
  else
  {
    return $_html_result;
  }
}  

function smarty_function_print_selectbox_output($rowtitle, $name, $values, $currentvalue, $size, $multiple, $standalone) 
{
   $found = false;
  $_output = '';
  if ($standalone === false)
   {
      $_output .= "<tr>\n";
      $_output .= "<td class=\"form1\">$rowtitle</td>\n";

   $sExtendedHelpVar = "owl_" . $name . "_extended";   
   /*if (!empty($owl_lang->{$sExtendedHelpVar}))
   {
       $extended_help=" onmouseover=\"return makeTrue(domTT_activate(this,event,'caption','" . addslashes($rowtitle) . "','content','". $owl_lang->{$sExtendedHelpVar} . "','lifetime', 3000, 'fade', 'both', 'delay', 10, 'statusText', ' ', 'trail', true))\";";
   }
   else
   {
       $extended_help="";
   }*/
      $_output .= "<td class=\"form1\" width=\"100%\"" . $extended_help . ">";
      
   }
   $_output .= "<select class=\"fpull1\" name=\"$name\" size=\"$size\"";
   if ($multiple)
   {
      $_output .= " multiple=\"multiple\" ";
      $currentvalue = preg_split("/\s+/", strtolower($currentvalue));
   }
   $_output .= ">\n";
   if (is_array($values))
   {
      foreach($values as $g)
      {
         $val = addcslashes($g[0], '()&');
         $_output .= "<option value=\"$g[0]\" ";
         if ($multiple)
         {
            if(preg_grep("/$val/", $currentvalue))
            {
               $_output .= "selected=\"selected\"";
               $found = true;
            }
         }
         else
         {
            if ($g[0] == $currentvalue)
            {   
               $_output .= "selected=\"selected\"";
               $found = true;
            }   
         }
         $_output .= ">$g[1]</option>\n";
      }      
   }
   if (!$found and $currentvalue <> "No value")
   {
      if($multiple)
      {
         $_output .= "<option value=\"\" selected=\"selected\">$owl_lang->none_selected</option>";
      }
      else
      {
         $_output .= "<option value=\"$currentvalue\" selected=\"selected\">$owl_lang->none_selected</option>";
      }
   }
   $_output .= "</select>";
   if ($standalone === false)
   {
      $_output .= "</td></tr>";
   }
					
  return $_output;
}

?>
