<?php /* Smarty version 2.6.22, created on 2010-01-31 19:40:04
         compiled from messages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'messages.tpl', 102, false),)), $this); ?>
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

	function composeMail() {
		$(\'#act\').val(\'compose\');
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
			<td  bgcolor="#ffe503" valign="top">
			
			
			
				<table width="99%" cellspacing="0" border="0"  style="margin-top: 10px;">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="schoolId" id="schoolId">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="messageId" id="messageId">
					<tr style="height:10px;">
						<td class="td_text1" colspan="5" align="center" style="color:#B55304;" ><b><?php echo $this->_tpl_vars['login_error']; ?>
</b></td>
					</tr>
					<tr style="height:20px;">
						<td class="td_text1" colspan="5" valign="middle">
						<img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/compose.gif" style="cursor: pointer; cursor: hand;" onclick="composeMail();">
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
								
								<?php $this->assign('cssclass', 'GridAlter'); ?>
								<?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cnt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cnt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['message']):
        $this->_foreach['cnt']['iteration']++;
?>
								<?php if ($this->_tpl_vars['cssclass'] == 'GridAlter'): ?>
									<?php $this->assign('cssclass', 'GridDefault'); ?>
								<?php else: ?>
									<?php $this->assign('cssclass', 'GridAlter'); ?>
								<?php endif; ?>
								
								<tr class="<?php echo $this->_tpl_vars['cssclass']; ?>
" style='cursor:pointer' onclick="readMessage('<?php echo $this->_tpl_vars['message']['id']; ?>
');">
									<td width="26"><img border="0" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/<?php if ($this->_tpl_vars['message']['viewed'] == 0): ?>UnreadMail.gif<?php else: ?>CheckedMail.gif<?php endif; ?>"/></td>
									<!--td class="<?php if ($this->_tpl_vars['message']['viewed'] == 0): ?>msg<?php else: ?>td_text1<?php endif; ?>" valign="top"><?php echo $this->_tpl_vars['message']['fromName']; ?>
</td-->
									<td class="BorderLeft" valign="top" ><?php echo $this->_tpl_vars['message']['fromName']; ?>
</td>
									<td class="BorderLeft" valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</td>
									<td class="BorderLeft" valign="top" style="overflow:hidden;whit-space:nowrap;"><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['message'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 35) : smarty_modifier_truncate($_tmp, 35)); ?>
</td>
									<td class="BorderLeft" valign="top"><?php echo $this->_tpl_vars['message']['msg_date']; ?>
</td>
								</tr>
								<?php endforeach; else: ?>
								<tr>
									<td class="td_text1" colspan="5"><b>No messages</b></td>
								</tr>
								<?php endif; unset($_from); ?>
							</table>	
						</td>
					</tr>
					
					
					<tr style="height:20px;">
						<td class="td_text1" colspan="5" valign="middle">
						<img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/compose.gif" style="cursor: pointer; cursor: hand;" onclick="composeMail();">
						</td>
					</tr>
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>