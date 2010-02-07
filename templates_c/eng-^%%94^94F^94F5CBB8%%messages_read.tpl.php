<?php /* Smarty version 2.6.22, created on 2010-01-30 06:09:59
         compiled from messages_read.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script language="javascript">
	function getData(colId, tblName, ddName) {
		var dd = \'#\'+ddName+\' option\';
		jQuery.post(\'masterDataAjax.php\', {id:colId, tableName:tblName}, function(data){jQuery(dd).remove(); //Remove current options
		eval(data);
		for(i in optData) { 
			jQuery(\'#\'+ddName).append(\'<option value="\'+i+\'">\'+optData[i]+\'</option>\');
		}}, \'html\');
	}

	function readMessage(id) {
		$(\'#messageId\').val(id);
		$(\'#act\').val(\'read\');
		$(\'#messageForm\').submit();
	}

	function replyMail() {
		$(\'#act\').val(\'reply\');
		$(\'#messageForm\').submit();
	}

	function SendMail() {
		$(\'#act\').val(\'send\');
		$(\'#messageForm\').submit();
	}

	function getSchoolList(colId, tblName) {
		jQuery.post(\'masterDataAjax.php\', {id:colId, tableName:tblName}, function(data){ 
		eval(data);
		var tblhtml = "<table>";
		for(i in optData) { 
			tblhtml += "<tr><td><a href=\'javascript:void(0);\' onclick=\'setSchool("+i+")\'>"+optData[i]+"</td></tr>";
			//jQuery(\'#\'+ddName).append(\'<option value="\'+i+\'">\'+optData[i]+\'</option>\');
		}
		tblhtml += "</table>";
		$(\'#schoolDiv\').html(tblhtml);
		}, \'html\');
	}

</script>

'; ?>

<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td width="200" valign="top">
		<?php if ($_SESSION['userType'] == 2): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "teacher/left_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "student/left_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		</td>
			<td  bgcolor="#ffe503" valign="top" style="padding-left:10px;">
				<table width="90%" cellpadding="5" cellspacing="5" border="0" >
				<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId" value="<?php echo $this->_tpl_vars['message']['id']; ?>
">
				<tr>
					<td> </td>
					<td> </td>
					<td> </td>
				</tr>
				<tr>
				 
				 <td colspan="3"><a href="#"><img border="0" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/reply.gif" style="cursor: pointer; cursor: hand;" onclick="replyMail();"></a></td>
				</tr>
				
			<tr>
			<td colspan="3">
			
			<table width="100%" cellpadding="5" cellspacing="5" border="0" bgcolor="#ffffff" style="border: 1px solid rgb(0, 153, 204); ">
			  <tr>
				<td height="25" width="1%"> Subject:</td>
				<td width="98%" style="font-size: 14px;"><?php echo $this->_tpl_vars['message']['title']; ?>
</td>
				<td width="1%"> </td>
			  </tr>
			  <tr>
				<td height="19"> From:</td>
				<td style="color: rgb(0, 102, 153); font-size: 18px;"><?php echo $this->_tpl_vars['message']['fromName']; ?>
 [<?php echo $this->_tpl_vars['message']['email']; ?>
] </td>
				<td> </td>
			  </tr>
			  
			 
			  <tr>
				<td> </td>
				<td><hr/></td>
				<td> </td>
			  </tr>
			  <tr valign='top'>
				<td > Message:</td>
				<td class="2"><?php echo $this->_tpl_vars['message']['message']; ?>
</td>                          
			  </tr>
			  <tr>
				<td> </td>
				<td class="2"> </td>                          
			  </tr>
			  </table>
			  
			  </td>
			  </tr>
			  <tr>
				 
				 <td colspan="3"><a href="#"><img border="0" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/reply.gif" style="cursor: pointer; cursor: hand;" onclick="replyMail();"></a></td>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>