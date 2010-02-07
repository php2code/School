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

	function setSchool(id) {
		$('#schoolId').val(id);
		$('#schoolDiv').css({ display:"none"});
		$('#loginDiv').css({ display:"block"});

	}

	function sendMail() {
		$('#act').val('send');
		$('#messageForm').submit();
	}

	function getSchoolList(colId, tblName) {
		jQuery.post('masterDataAjax.php', {id:colId, tableName:tblName}, function(data){ 
		eval(data);
		var tblhtml = "<table>";
		for(i in optData) { 
			tblhtml += "<tr><td><a href='javascript:void(0);' onclick='setSchool("+i+")'>"+optData[i]+"</td></tr>";
			//jQuery('#'+ddName).append('<option value="'+i+'">'+optData[i]+'</option>');
		}
		tblhtml += "</table>";
		$('#schoolDiv').html(tblhtml);
		}, 'html');
	}

</script>
{/literal}
<table border="0" cellspacing="0" width="100%" cellpadding="5"  align="center">
	<tr>
		<td width="200" valign="top">{ include file = student/left_menu.tpl }</td>
			<td valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="fromId" id="fromId" value="{$smarty.session.userId}">
					
					<tr style="height:10px;">
						<td class="td_text1" colspan="2"><b>&nbsp;</b></td>
					</tr>
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
					<tr style="height:30px;">
						<td class="td_text1" valign="top">Subject: </td>
						<td><input type="text" id="title" name="title" {if $message.title != ''}value="Re:{$message.title}"{/if} style="width:400px">
						</td>
					</tr>
					
					<tr>
						<td class="td_text1" valign="top">Message:</td> 
						<td><textarea name="message" id="message" rows="10" cols="48">{if $message.message != ""}<br><br>----Original message---<br>{$message.message}{/if}</textarea>
						</td>
					</tr>
					<tr style="height:10px;">
						<td class="td_text1" colspan="2"><b>&nbsp;</b></td>
					</tr>
					<tr style="height:20px;">
						<td class="td_text1" valign="top"></td> 
						<td class="td_text1" align="center"><input type="buttun" value="         Send" onclick="sendMail();" style="curser:hand;"></td>
					</tr>
					
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
{ include file = footer.tpl }