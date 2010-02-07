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

	function readMessage(id) {
		$('#messageId').val(id);
		$('#act').val('read');
		$('#messageForm').submit();
	}

	function replyMail() {
		$('#act').val('reply');
		$('#messageForm').submit();
	}

	function SendMail() {
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
				<table width="100%" border="1" cellspacing="0" cellpadding="0">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId" value="{$message.id}">
					
					<tr style="height:20px;">
						<td class="td_text1" colspan="4">
						<input type="buttun" value="Reply" onclick="replyMail();">
						</td>
					</tr>
					<tr style="height:10px;">
						<td class="td_text1" colspan="4"><b>&nbsp;</b></td>
					</tr>
					<tr>
						<td class="td_text1" valign="top">From: {$message.fromName}</td>
					</tr>
					<tr>
						<td class="td_text1" valign="top">Date: {$message.created}</td>
					</tr>
					<tr>
						<td class="td_text1" valign="top">Subject: {$message.title}</td>
					</tr>
					<tr>
						<td class="td_text1" valign="top">Message: {$message.message}</td>
					</tr>
					<tr style="height:30px;">
						<td class="td_text1" colspan="4">
						<input type="buttun" value="Reply" onclick="replyMail();">
						</td>
					</tr>
					
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
{ include file = footer.tpl }