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
			
			
			
				<table width="99%" cellspacing="0" border="0"  style="margin-top: 10px;">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="schoolId" id="schoolId">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId">
					<tr style="height:10px;">
						<td class="td_text1" colspan="5" align="center" style="color:#B55304;" ><b>{$login_error}</b></td>
					</tr>
					<tr style="height:20px;">
						<td class="td_text1" colspan="5" valign="middle">
						<img src="{$SITEURL}images/compose.gif" style="cursor: pointer; cursor: hand;" onclick="composeMail();">
						</td>
					</tr>
					<tr style="height:15px;">
						<td class="td_text1" colspan="5"><b>&nbsp;</b></td>
					</tr>
					<tr >
						<td class="td_text1" colspan="5">
							<table width="99%" cellspacing="0" border="0" class="GridStructure BorderTop" style="margin-top: 10px;">
								<tr>
									<th></th>
									<th class="redtext" valign="top" width="15%" align="left">From</th>
									<th class="redtext" valign="top" width="30%" align="left">Subject</th>
									<th class="redtext" valign="top" width="35%" align="left">Message</th>
									<th class="redtext" valign="top" width="20%" align="left">Date</th>
								</tr>
								
								{assign var='cssclass' value='GridAlter'}
								{foreach from=$messages item=message name=cnt}
								{if $cssclass=='GridAlter'}
									{assign var='cssclass' value='GridDefault'}
								{else}
									{assign var='cssclass' value='GridAlter'}
								{/if}
								
								<tr class="{$cssclass}" style='cursor:pointer' onclick="readMessage('{$message.id}');">
									<td width="26"><img border="0" src="{$SITEURL}images/{if $message.viewed==0}UnreadMail.gif{else}CheckedMail.gif{/if}"/></td>
									<!--td class="{if $message.viewed==0}msg{else}td_text1{/if}" valign="top">{$message.fromName}</td-->
									<td class="BorderLeft" valign="top" >{$message.fromName}</td>
									<td class="BorderLeft" valign="top">{$message.title|truncate:30}</td>
									<td class="BorderLeft" valign="top" style="overflow:hidden;whit-space:nowrap;">{$message.message|truncate:35}</td>
									<td class="BorderLeft" valign="top">{$message.msg_date}</td>
								</tr>
								{foreachelse}
								<tr>
									<td class="td_text1" colspan="5"><b>No messages</b></td>
								</tr>
								{/foreach}
							</table>	
						</td>
					</tr>
					
					
					<tr style="height:20px;">
						<td class="td_text1" colspan="5" valign="middle">
						<img src="{$SITEURL}images/compose.gif" style="cursor: pointer; cursor: hand;" onclick="composeMail();">
						</td>
					</tr>
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
{ include file = footer.tpl }