<?php /* Smarty version 2.6.22, created on 2010-02-07 08:05:07
         compiled from teacher/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getAttendance', 'teacher/search.tpl', 161, false),)), $this); ?>
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

	function openDiv(sid) {
		var divId = "div"+sid;
		document.getElementById(divId).style.display = "block";
	}

	function closeDiv(sid) {
		var divId = "div"+sid;
		document.getElementById(divId).style.display = "none";
	}
hs.showCredits =false;
function autosuggest(obj,codeblock,e)
{
	var classId=document.getElementById(\'classId\').value;
	if(classId==\'\')
	{
		alert("Please Select Class!");
		obj.value=\'\';
		document.getElementById(\'classId\').focus();
		return false;
	}
	var params="classId="+classId+"&"+codeblock;
	
	
	ajax_showOptions(obj,params,e);
}
function validate()
{
	var classId=document.getElementById(\'classId\').value;
	if(classId==\'\')
	{
		alert("Please Select Class!");
		document.getElementById(\'classId\').focus();
		return false;
	}
	
	return true;
}
</script>


	
'; ?>

<!-- the tooltip --> 

<div class="tooltip">&nbsp;</div> 
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
				<table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="fromId" id="fromId" value="<?php echo $_SESSION['userId']; ?>
">
					
					<tr style="height:10px;">
						<td class="td_text1" colspan="4"><b>&nbsp;</b>
						</td>
					</tr>
					<tr class='GridDefault' style="height:40px;">
						<td class="td_text1" valign="top">Class:</td>
						<td  valign="top">
						<select name="classId" id="classId" style="width:200px">
							<option value="">--Select Classes--</option>
							<?php $_from = $this->_tpl_vars['classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cnt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cnt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['class']):
        $this->_foreach['cnt']['iteration']++;
?>
							<option value="<?php echo $this->_tpl_vars['class']['id']; ?>
" <?php if ($_POST['classId'] == $this->_tpl_vars['class']['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['class']['className']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
						</td>
						
						<td>Roll No.</td>
						<td><input type="text" name="roll_no" id="roll_no"  style="width:200px" value="<?php echo $_POST['roll_no']; ?>
" /></td>
					</tr>
					<tr class='GridDefault' style="height:30px;">
						
						<td>First name</td>
						<td><input type="text" id="firstName" name="firstName"  style="width:200px" value="<?php echo $_POST['firstName']; ?>
" autocomplete="off" onkeyup="autosuggest(this,'getByFirstName',event)"/>
						<input type="hidden" id="firstName_hidden" name="firstName_ID">
						</td>
						<td>Last name</td>
						<td><input type="text" name="lastName"  style="width:200px" value="<?php echo $_POST['lastName']; ?>
" autocomplete="off" onkeyup="autosuggest(this,'getByLastName',event)" /></td>
					</tr>
					
					
					<tr class="GridSelect" style="height: 10px;">
						<td style="padding-left: 80px;" colspan="2" class="td_text1"><input type="submit" style="" onclick='return validate()' value="Search"/></td>
						<td colspan='2' style="color:red;"><?php if ($this->_tpl_vars['msg'] != ''): ?><?php echo $this->_tpl_vars['msg']; ?>
<?php endif; ?></td>
					</tr>
					<tr style="height:30px;">
						<td class="td_text1" colspan="4"><b>&nbsp;</b></td>
					</tr>
					<?php if ($this->_tpl_vars['msg'] == ''): ?>
					
					<?php if ($_POST): ?>
						<tr>
							<td colspan="4">
								<table width="98%" class='GridStructure1' border="0" align="center" cellpadding="4" cellspacing="0">
									<tr class='GridSelect'>
										<th align="left" width="">Roll No.</th>
										<th align="left" width="">First Name</th>
										
										<th align="left" width="">Class</th>
										<th align="left" width="">Standard</th>
										
									</tr>
									<?php $_from = $this->_tpl_vars['searchResult']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cnt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cnt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['student']):
        $this->_foreach['cnt']['iteration']++;
?>
										<tr>
										
										<td  class='GridDefault' align='center'><?php echo $this->_tpl_vars['student']['studentId']; ?>
</td>
										<td class='GridAlter' align="left" ><a href="#" style='text-decoration:underline;' onclick="return hs.htmlExpand(this, <?php echo '{ anchor: \'top left\' } '; ?>
 ); "><?php echo $this->_tpl_vars['student']['firstName']; ?>
 <?php echo $this->_tpl_vars['student']['lastName']; ?>
</a>										
										
										<div  class="highslide-maincontent"  >
										
										
										<table align="center" border="0">
											<tr>
												<td colspan='2'><span class='subheading' >Personal Information</span></td>
											</tr>
											<tr>
												<td width='30%'>Name : </td>
												<td ><?php echo $this->_tpl_vars['student']['firstName']; ?>
 <?php echo $this->_tpl_vars['student']['lastName']; ?>
</td>
											</tr>
											<tr>
												<td>Roll No:</td><td> <?php echo $this->_tpl_vars['student']['studentId']; ?>
</td>
											</tr>
											<tr>
												<td>Class:</td><td> <?php echo $this->_tpl_vars['student']['className']; ?>
</td>
											</tr>
											<tr>
												<td>Standard:</td><td> <?php echo $this->_tpl_vars['student']['standard']; ?>
</td>
											</tr>
											<tr>
												<td>Address:</td><td> <?php echo $this->_tpl_vars['student']['address']; ?>
 <?php echo $this->_tpl_vars['student']['city']; ?>
 <?php echo $this->_tpl_vars['student']['state']; ?>
 <?php echo $this->_tpl_vars['student']['country']; ?>
 <?php echo $this->_tpl_vars['student']['zip']; ?>
</td>
											</tr>
											<tr>
												<td>Contact No:</td><td><?php echo $this->_tpl_vars['student']['homePhone']; ?>
 <?php echo $this->_tpl_vars['student']['mobilePhone']; ?>
</td>
											</tr>
											<tr>
												<td>Blood Group:</td><td><?php echo $this->_tpl_vars['student']['bloodGroup']; ?>
</td>
											</tr>
											
											
											<tr>
												<td colspan='2'><span class='subheading' >Attendance</span></td>
											</tr>
											<tr>
												<td>Total Attendance : </td>
												<td ><?php echo getAttendance(array('student_id' => $this->_tpl_vars['student']['studentId'],'attendance_check' => 'total','att_type' => 'flat'), $this);?>
 </td>
											</tr>
											<tr>
												<td>Present : </td>
												<td ><?php echo getAttendance(array('student_id' => $this->_tpl_vars['student']['studentId'],'attendance_check' => 'present','att_type' => 'flat'), $this);?>
 (<?php echo getAttendance(array('student_id' => $this->_tpl_vars['student']['studentId'],'attendance_check' => 'present','att_type' => 'percent'), $this);?>
)</td>
											</tr>
											<tr>
												<td>Absent : </td>
												<td ><?php echo getAttendance(array('student_id' => $this->_tpl_vars['student']['studentId'],'attendance_check' => 'absent','att_type' => 'flat'), $this);?>
 (<?php echo getAttendance(array('student_id' => $this->_tpl_vars['student']['studentId'],'attendance_check' => 'absent','att_type' => 'percent'), $this);?>
) </td>
											</tr>
											</table>
											
										</div>
										</td>
										
										<td class='GridDefault' align="left"><?php echo $this->_tpl_vars['student']['className']; ?>
</td>
										<td class='GridAlter'><?php echo $this->_tpl_vars['student']['standard']; ?>
</td>
									</tr>
									<?php endforeach; else: ?>
									<tr><td align="left" colspan="4" style="color:red;"><b>No Student found</b></td></tr>
									<?php endif; unset($_from); ?>
								</table>
							</td>
					<?php endif; ?>
					<?php endif; ?>
					
					
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