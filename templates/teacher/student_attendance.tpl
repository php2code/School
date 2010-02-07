{ include file = header.tpl }
{literal}
<script language="javascript">
	function getData(colId, tblName, ddName) {
		var dd = '#'+ddName+' option';
		jQuery.post('masterDataAjax.php', {id:colId, tableName:tblName}, function(data){jQuery(dd).remove(); //Remove current options
		eval(data);
		for(i in optData) { 
			jQuery('#'+ddName).append('<option value="'+i+'">'+optData[i]+'</option>');
		}}, 'html');
	}

</script>
{/literal}
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
		<td width="200" valign="top">
		{if $smarty.session.userType == 2}
		{ include file = teacher/left_menu.tpl }
		{else}
			{ include file = student/left_menu.tpl }
		{/if}</td>
	  <td  bgcolor="#ffe503" valign="top">
	  <table width="100%" border="0" cellspacing="1" cellpadding="1">
		  <tr>
			<td colspan="2">
			<form action="" method="get">
			<table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="11%">Sort</td>
                <td width="41%">
				<select name="month">
				<option value="">Select Month</option>
					{section name=foo start=1 loop=13 step=1}
						<option value="{$smarty.section.foo.index}" {if $month==$smarty.section.foo.index} selected="selected" {/if}>{$smarty.section.foo.index}</option>
					{/section}
				</select>				</td>
                <td width="33%"><select name="year">
				<option value="">Select Year</option>
				{section name=foo loop=$cyear+1 max=30 step=-1}
						<option value="{$smarty.section.foo.index}" {if $year==$smarty.section.foo.index} selected="selected" {/if}>{$smarty.section.foo.index}</option>
					{/section}
				</select></td>
                <td width="15%"><input name="sort" type="submit" value="Sort" /></td>
              </tr>
            </table>
			</form>			</td>
		  </tr>
		  <tr>
		    <td>Date</td>
		    <td>Attendance</td>
	     </tr>
		  {foreach from = $attd_records item=attd name=att}
		  
		  <tr>
			<td>{$attd.date_day}</td>
			<td>{$attd.attendance_check}</td>
		  </tr>
		  {/foreach}
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
</td>
  </tr>
</table>
{ include file = footer.tpl }