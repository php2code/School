<?php /* Smarty version 2.6.22, created on 2010-01-30 06:12:46
         compiled from messages_compose.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script language="javascript">
	function sendMail() {
		$(\'#act\').val(\'send\');
		$(\'#messageForm\').submit();
	}

	function getData(colId, tblName, ddName, selected) {
		var dd = \'#\'+ddName+\' option\';
		jQuery.post(\'../masterDataAjax.php\', {id:colId, tableName:tblName}, function(data){jQuery(dd).remove(); //Remove current options
		eval(data);
		for(i in optData) {
			var sel = "";
			if(i == selected) {
				var sel = " selected ";
			}
			jQuery(\'#\'+ddName).append(\'<option value="\'+i+\'"\'+sel+\'>\'+optData[i]+\'</option>\');
		}}, \'html\');
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
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="fromId" id="fromId" value="<?php echo $_SESSION['userId']; ?>
">
					
					<tr style="height:10px;">
						<td class="td_text1" colspan="2"><b>&nbsp;</b></td>
					</tr>
					<?php if ($this->_tpl_vars['teacherYn'] == 1): ?>
					<tr style="height:30px;">
						<td class="td_text1" valign="top">Select class:</td>
						<td><select name="classId" id="classId" style="width:400px" onchange="getData(this.value, 'student', 'toId', '')">
						<option value="">--Select--</option>
						<?php $_from = $this->_tpl_vars['classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cnt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cnt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['class']):
        $this->_foreach['cnt']['iteration']++;
?>
						<option value="<?php echo $this->_tpl_vars['class']['id']; ?>
" <?php if ($this->_tpl_vars['classId'] == $this->_tpl_vars['class']['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['class']['className']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
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
					<?php else: ?>
					<tr style="height:30px;">
						<td class="td_text1" valign="top">To:</td>
						<td><select name="toId" id="toId" style="width:400px">
						<option value="">--Select--</option>
						<?php $_from = $this->_tpl_vars['teachers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cnt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cnt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['teacher']):
        $this->_foreach['cnt']['iteration']++;
?>
						<option value="<?php echo $this->_tpl_vars['teacher']['teacherId']; ?>
" <?php if ($this->_tpl_vars['message']['fromId'] == $this->_tpl_vars['teacher']['teacherId']): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['teacher']['name']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>
						</td>
					</tr>
					<?php endif; ?>
					<tr style="height:30px;">
						<td class="td_text1" valign="top">Subject: </td>
						<td><input type="text" id="title" name="title" <?php if ($this->_tpl_vars['message']['title'] != ''): ?>value="Re:<?php echo $this->_tpl_vars['message']['title']; ?>
"<?php endif; ?> style="width:400px">
						</td>
					</tr>
					
					<tr>
						<td class="td_text1" valign="top">Message:</td> 
						<td><textarea name="message" id="message" rows="10" cols="48"><?php if ($this->_tpl_vars['message']['message'] != ""): ?><?php echo $this->_tpl_vars['message']['message']; ?>
<?php endif; ?></textarea>
						</td>
					</tr>
					<tr style="height:10px;">
						<td class="td_text1" colspan="2"><b>&nbsp;</b></td>
					</tr>
					<tr style="height:20px;">
						<td class="td_text1" valign="top"></td> 
						<td class="td_text1" align="center">
						<img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/send.gif" style="cursor: pointer; cursor: hand;" onclick="sendMail();">
						</td>
					</tr>
					
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>
<?php echo '
<script>
'; ?>

<?php if ($this->_tpl_vars['fromId'] != ""): ?>
getData('<?php echo $this->_tpl_vars['classId']; ?>
', 'student', 'toId', '<?php echo $this->_tpl_vars['fromId']; ?>
');
<?php endif; ?>
<?php echo '
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>