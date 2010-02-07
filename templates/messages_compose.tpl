{ include file = header.tpl }
{literal}
<script language="javascript">
	function sendMail() {
		$('#act').val('send');
		$('#messageForm').submit();
	}

	function getData(colId, tblName, ddName, selected) {
		var dd = '#'+ddName+' option';
		jQuery.post('../masterDataAjax.php', {id:colId, tableName:tblName}, function(data){jQuery(dd).remove(); //Remove current options
		eval(data);
		for(i in optData) {
			var sel = "";
			if(i == selected) {
				var sel = " selected ";
			}
			jQuery('#'+ddName).append('<option value="'+i+'"'+sel+'>'+optData[i]+'</option>');
		}}, 'html');
	}

</script>
{/literal}

<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td width="200" valign="top">
		{if $smarty.session.userType == 2}
		{ include file = teacher/left_menu.tpl }
		{else}
			{ include file = student/left_menu.tpl }
		{/if}
		</td>
			<td  bgcolor="#ffe503" valign="top">
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="fromId" id="fromId" value="{$smarty.session.userId}">
					
					<tr style="height:10px;">
						<td class="td_text1" colspan="2"><b>&nbsp;</b></td>
					</tr>
					{if $teacherYn == 1}
					<tr style="height:30px;">
						<td class="td_text1" valign="top">Select class:</td>
						<td><select name="classId" id="classId" style="width:400px" onchange="getData(this.value, 'student', 'toId', '')">
						<option value="">--Select--</option>
						{foreach from=$classes item=class name=cnt}
						<option value="{$class.id}" {if $classId == $class.id}selected{/if}>{$class.className}</option>
						{/foreach}
						</select>
						</td>
					</tr>
					<tr style="height:30px;">
						<td class="td_text1" valign="top">Select Student:</td>
						<td><select name="toId" id="toId" style="width:400px">
						<option value="">--Select--</option>
						</select>
						</td>
					</tr>
					{else}
					<tr style="height:30px;">
						<td class="td_text1" valign="top">To:</td>
						<td><select name="toId" id="toId" style="width:400px">
						<option value="">--Select--</option>
						{foreach from=$teachers item=teacher name=cnt}
						<option value="{$teacher.teacherId}" {if $message.fromId == $teacher.teacherId} selected {/if}>{$teacher.name}</option>
						{/foreach}
						</select>
						</td>
					</tr>
					{/if}
					<tr style="height:30px;">
						<td class="td_text1" valign="top">Subject: </td>
						<td><input type="text" id="title" name="title" {if $message.title != ''}value="Re:{$message.title}"{/if} style="width:400px">
						</td>
					</tr>
					
					<tr>
						<td class="td_text1" valign="top">Message:</td> 
						<td><textarea name="message" id="message" rows="10" cols="48">{if $message.message != ""}{$message.message}{/if}</textarea>
						</td>
					</tr>
					<tr style="height:10px;">
						<td class="td_text1" colspan="2"><b>&nbsp;</b></td>
					</tr>
					<tr style="height:20px;">
						<td class="td_text1" valign="top"></td> 
						<td class="td_text1" align="center">
						<img src="{$SITEURL}images/send.gif" style="cursor: pointer; cursor: hand;" onclick="sendMail();">
						</td>
					</tr>
					
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
{literal}
<script>
{/literal}
{if $fromId != ""}
getData('{$classId}', 'student', 'toId', '{$fromId}');
{/if}
{literal}
</script>
{/literal}
{ include file = footer.tpl }