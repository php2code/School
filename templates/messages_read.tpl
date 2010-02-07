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
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td width="200" valign="top">
		{if $smarty.session.userType == 2}
		{ include file = teacher/left_menu.tpl }
		{else}
			{ include file = student/left_menu.tpl }
		{/if}
		</td>
			<td  bgcolor="#ffe503" valign="top" style="padding-left:10px;">
				<table width="90%" cellpadding="5" cellspacing="5" border="0" >
				<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId" value="{$message.id}">
				<tr>
					<td> </td>
					<td> </td>
					<td> </td>
				</tr>
				<tr>
				 
				 <td colspan="3"><a href="#"><img border="0" src="{$SITEURL}images/reply.gif" style="cursor: pointer; cursor: hand;" onclick="replyMail();"></a></td>
				</tr>
				
			<tr>
			<td colspan="3">
			
			<table width="100%" cellpadding="5" cellspacing="5" border="0" bgcolor="#ffffff" style="border: 1px solid rgb(0, 153, 204); ">
			  <tr>
				<td height="25" width="1%"> Subject:</td>
				<td width="98%" style="font-size: 14px;">{$message.title}</td>
				<td width="1%"> </td>
			  </tr>
			  <tr>
				<td height="19"> From:</td>
				<td style="color: rgb(0, 102, 153); font-size: 18px;">{$message.fromName} [{$message.email}] </td>
				<td> </td>
			  </tr>
			  
			 
			  <tr>
				<td> </td>
				<td><hr/></td>
				<td> </td>
			  </tr>
			  <tr valign='top'>
				<td > Message:</td>
				<td class="2">{$message.message}</td>                          
			  </tr>
			  <tr>
				<td> </td>
				<td class="2"> </td>                          
			  </tr>
			  </table>
			  
			  </td>
			  </tr>
			  <tr>
				 
				 <td colspan="3"><a href="#"><img border="0" src="{$SITEURL}images/reply.gif" style="cursor: pointer; cursor: hand;" onclick="replyMail();"></a></td>
				</tr>
			  <tr>
					<td> </td>
					<td> </td>
					<td> </td>
				</tr>
			
			</table>
		
	</td>
  </tr>
</table>
{ include file = footer.tpl }