<?
function smarty_modifier_change($value, $from, $to, $rates)
{
   if($from==$to)
    return $value;
    
   $rateToBeMultiplied = $rates[$from]['USD'];

   if($rateToBeMultiplied<=0)
    $rateToBeMultiplied=1;

   $rateToBeDivided = $rates[$to]['USD'];
  
   if($rateToBeDivided<=0)
    $rateToBeDivided=1;

   
   $rate = $rateToBeMultiplied / $rateToBeDivided ;

   $rate = number_format($rate,4,".","");

   return $rate*$value;
}
?>