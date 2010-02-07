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

	function composeMail() {
		$('#act').val('compose');
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
					<input type="hidden" name="schoolId" id="schoolId">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId">
					<tr style="height:20px;">
						<td class="td_text1" colspan="4">
						<input type="buttun" value="Compose" onclick="composeMail();">
						</td>
					</tr>
					<tr style="height:10px;">
						<td class="td_text1" colspan="4"><b>&nbsp;</b></td>
					</tr>
					<tr>
						<th class="td_text1" valign="top" width="15%">From</th>
						<th class="td_text1" valign="top" width="30%">Subject</th>
						<th class="td_text1" valign="top" width="40%">Message</th>
						<th class="td_text1" valign="top" width="15%">Date</th>
					</tr>
					{foreach from=$messages item=message name=cnt}
					<tr>
						<td class="{if $message.viewed==0}msg{else}td_text1{/if}" valign="top">{$message.fromName}</td>
						<td class="{if $message.viewed==0}msg{else}td_text1{/if}" valign="top"><a href="javascript:void(0);" onclick="readMessage('{$message.id}');">{$message.title}</a></td>
						<td class="{if $message.viewed==0}msg{else}td_text1{/if}" valign="top"><a href="javascript:void(0);" onclick="readMessage('{$message.id}');">{$message.message}</a></td>
						<td class="{if $message.viewed==0}msg{else}td_text1{/if}" valign="top">{$message.created}</td>
					</tr>
					{foreachelse}
					<tr>
						<td class="td_text1" colspan="4"><b>No messages</b></td>
					</tr>
					{/foreach}
					<tr style="height:20px;">
						<td class="td_text1" colspan="4">
						<input type="buttun" value="Compose" onclick="composeMail();">
						</td>
					</tr>
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
{ include file = footer.tpl }