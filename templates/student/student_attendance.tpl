{ include file = header.tpl }
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr  valign='top'>
	<td width="200">{ include file = student/left_menu.tpl }</td>
    <td  bgcolor="#ffe503" valign="top">
	<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center">
		  <tr>
			<td colspan="2">
			<form action="" method="get">
			<table width="100%" border="0" cellpadding="1" cellspacing="0">
              <tr><td colspan="3"><h2>View Attendance</h2></td></tr>
			  <tr>
                <td width="38%">Select Month:&nbsp;&nbsp;
                <select name="month">
					<option value="">Select Month</option>
					<option value="1" {if $month==1} selected="selected" {/if}>January</option>
					<option value="2" {if $month==2} selected="selected" {/if}>February</option>
					<option value="3" {if $month==3} selected="selected" {/if}>March</option>
					<option value="4" {if $month==4} selected="selected" {/if}>April</option>
					<option value="5" {if $month==5} selected="selected" {/if}>May</option>
					<option value="6" {if $month==6} selected="selected" {/if}>June</option>
					<option value="7" {if $month==7} selected="selected" {/if}>July</option>
					<option value="8" {if $month==8} selected="selected" {/if}>August</option>
					<option value="9" {if $month==9} selected="selected" {/if}>September</option>
					<option value="10" {if $month==10} selected="selected" {/if}>October</option>
					<option value="11" {if $month==11} selected="selected" {/if}>November</option>
					<option value="12" {if $month==12} selected="selected" {/if}>December</option>
				</select></td>
                <td width="33%">Select Year:&nbsp;&nbsp;<select name="year">
				<option value="">Select Year</option>
				{section name=foo loop=$cyear+1 max=30 step=-1}
						<option value="{$smarty.section.foo.index}" {if $year==$smarty.section.foo.index} selected="selected" {/if}>{$smarty.section.foo.index}</option>
					{/section}
				</select></td>
                <td width="27%">
				<input type="image" src="{$SITEURL}images/sort.gif" style="cursor: pointer; cursor: hand;" name="sort">
				</td>
              </tr>
            </table>
			</form>			</td>
		  </tr>
		
		</table>
<br>
<br>
		{$attendance_calander}
	</td>
  </tr>
</table>

{ include file = footer.tpl }