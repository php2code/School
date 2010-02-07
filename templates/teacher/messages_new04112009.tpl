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
				
		
		<!--Start new design -->
		<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="schoolId" id="schoolId">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId">
		<table width="100%" border="0"  cellpadding="0" cellspacing="0">
		
				<tr>
					<td bgcolor="#ffe503"  align="center">
                    	<table style="margin-top:10px" width="90%" border="0" cellspacing="0" class="GridStructure BorderTop">
                          
						  
						  <tr class="GridDefault">
                            <td width="26"><img src="images/UnreadMail.gif" border="0" /></td>
                            <td width="129" class="BorderLeft">From</td>
                            <td width="639" class="BorderLeft">Subject &quot;Default Raw&quot;</td>
                          </tr>
						  	{foreach from=$messages item=message name=cnt}
						  <tr class="GridDefault">
                            <td width="26"><img src="images/UnreadMail.gif" border="0" /></td>
                            <td width="129" class="BorderLeft">{$message.fromName}</td>
                            <td width="639" class="BorderLeft">{$message.title}</td>
                          </tr>
                         {foreachelse}
						 <tr>
							<td class="td_text1" colspan="4"><b>No messages</b></td>
						</tr>
					{/foreach}
					<tr style="height:20px;">dsdsdsdsdszdszd
						<td class="td_text1" colspan="3">
						<input type="buttun" value="Compose" onclick="composeMail();">
						</td>
					</tr>
                        </table
>
                    </td>                       
				</tr>
				
			</table>
			</form>
		<!--End new design -->
		
		
		
		
		
		
	</td>
  </tr>
</table>
{ include file = footer.tpl }