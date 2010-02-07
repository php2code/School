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