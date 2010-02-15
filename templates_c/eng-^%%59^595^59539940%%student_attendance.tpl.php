<?php /* Smarty version 2.6.22, created on 2010-02-15 10:29:38
         compiled from student/student_attendance.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr  valign='top'>
	<td width="200"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "student/left_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
    <td  bgcolor="#ffe503" valign="top">
	<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center">
		  <tr>
			<td colspan="2">
			<form action="" method="get">
			<table width="100%" border="0" cellpadding="1" cellspacing="0">
              <tr><td colspan="3"><h2>View Attendance</h2></td></tr>
			  <tr>
                <td width="38%">Select Month:&nbsp;&nbsp;
                <select name="month">
					<option value="">Select Month</option>
					<option value="1" <?php if ($this->_tpl_vars['month'] == 1): ?> selected="selected" <?php endif; ?>>January</option>
					<option value="2" <?php if ($this->_tpl_vars['month'] == 2): ?> selected="selected" <?php endif; ?>>February</option>
					<option value="3" <?php if ($this->_tpl_vars['month'] == 3): ?> selected="selected" <?php endif; ?>>March</option>
					<option value="4" <?php if ($this->_tpl_vars['month'] == 4): ?> selected="selected" <?php endif; ?>>April</option>
					<option value="5" <?php if ($this->_tpl_vars['month'] == 5): ?> selected="selected" <?php endif; ?>>May</option>
					<option value="6" <?php if ($this->_tpl_vars['month'] == 6): ?> selected="selected" <?php endif; ?>>June</option>
					<option value="7" <?php if ($this->_tpl_vars['month'] == 7): ?> selected="selected" <?php endif; ?>>July</option>
					<option value="8" <?php if ($this->_tpl_vars['month'] == 8): ?> selected="selected" <?php endif; ?>>August</option>
					<option value="9" <?php if ($this->_tpl_vars['month'] == 9): ?> selected="selected" <?php endif; ?>>September</option>
					<option value="10" <?php if ($this->_tpl_vars['month'] == 10): ?> selected="selected" <?php endif; ?>>October</option>
					<option value="11" <?php if ($this->_tpl_vars['month'] == 11): ?> selected="selected" <?php endif; ?>>November</option>
					<option value="12" <?php if ($this->_tpl_vars['month'] == 12): ?> selected="selected" <?php endif; ?>>December</option>
				</select></td>
                <td width="33%">Select Year:&nbsp;&nbsp;<select name="year">
				<option value="">Select Year</option>
				<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['cyear']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['max'] = (int)30;
$this->_sections['foo']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['foo']['show'] = true;
if ($this->_sections['foo']['max'] < 0)
    $this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
						<option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_tpl_vars['year'] == $this->_sections['foo']['index']): ?> selected="selected" <?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option>
					<?php endfor; endif; ?>
				</select></td>
                <td width="27%">
				<input type="image" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/sort.gif" style="cursor: pointer; cursor: hand;" name="sort">
				</td>
              </tr>
            </table>
			</form>			</td>
		  </tr>
		
		</table>
<br>
<br>
		<?php echo $this->_tpl_vars['attendance_calander']; ?>

	</td>
  </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>