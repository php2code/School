<?
function smarty_function_currency_symbol($params, &$smarty)
{
  if($params['code']=='')
    {
      $smarty->trigger_error("currency_symbol: missing 'code' parameter");
      return;
    }

  switch($params['code'])
    {
      case 'EUR':
        return '&euro;';
        
      case 'USD':
        return '$';

      case 'GBP':
        return '&pound;';

	  case 'KES':
        return 'KSH ';
        
      default:
        if(isset($params['default']))
          return $params['default'];
        else
          return $params['code'];
    }
}
?>