<?php /* Smarty version 2.6.22, created on 2010-02-07 13:20:39
         compiled from teacher/student_attendance_bulk.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style type="text/css">
<!--
.style2 {font-size: 14px}
.messageStackError, .messageStackWarning { font-family: Verdana, Arial, sans-serif; font-size: 10px; background-color: #ffb3b5; }
.messageStackSuccess { font-family: Verdana, Arial, sans-serif; font-size: 10px; background-color: #99ff00; }
-->
</style>

'; ?>

<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td width="200" valign="top"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "teacher/left_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
			<td  bgcolor="#ffe503" valign="top">
				
<table width="100%" border="0" cellspacing="0">
	<tr class="navTitle"> 
		<td colspan="2">Attendance Management </td>
	</tr>
    <tr>
		<td colspan="2" class="row1">
		<?php echo $this->_tpl_vars['login_error']; ?>

		<FORM ENCTYPE="multipart/form-data" ACTION="" METHOD="POST" name="frmCSV">
			<p style="margin-top: 8px;"><b>Upload File to Database </b></p>
			<p><table border="0"><tr><td><INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="100000000">
			<input name="usrfl" type="file" size="50"></td><td>
			<input type="image" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/insertIntoDB.gif" name="buttoninsert"></td></tr></table>
			
            <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
			<font size="2"><b>Uploading Instructions<br /></b><br /></font><span class="style2">&#8226;</span> Add/Edit student attendance in Excel sheet..<br />
                <span class="style2">&#8226;</span> The end of a row(line) is detected by<strong> EOL</strong>, so be sure, before you start a new row, your last row must have<strong> EOL</strong> at the end just below in <strong>EOL</strong> column. <br />
                <span class="style2">&#8226;</span> Before uploading a <strong>TEXT</strong> file, please check it in <strong>EXCEL</strong> and confirm that there is <strong>EOL</strong> to end the row and must  in EOL column.<br />
            <span class="style2">&#8226;</span> If any row has EOL and not in it's column, please <strong>Delete</strong> that row manually, because this will affect others rows below it to be inserted into the Database .<br />
            <span class="style2">&#8226;</span> Copy the rows from the EXCEL and paste it in Notepad.<br />
            <span class="style2">&#8226;</span> Save the Notepad in UTF-8 format. <br />
            <span class="style2">&#8226;</span> Your text file is ready to upload. </p><br />
			<span class="style2">&#8226;</span> Download sample excel file &nbsp;&nbsp;<a href='download.php?file=xls'><img border="0" width='25' src='<?php echo $this->_tpl_vars['SITEURL']; ?>
images/xls.jpg'></a> </p><br />
			<span class="style2">&#8226;</span>Download sample text file&nbsp;&nbsp;<a href='download.php?file=txt'><img border="0" width='25' src='<?php echo $this->_tpl_vars['SITEURL']; ?>
images/text_logo.jpg'></a > </p>
        </form>	  </td>
    </tr>
    <tr>
      <td colspan="2" class="row1">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="row1" style="border-bottom:#000000 1px solid;">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="row1"><p style="margin: 8px;"><font size="2"><b>Download CSV  File (PIPE '|' Delimited) <br />
      </b><br />
        Create entire file in server memory then stream download after completed.<br />
        <br />
      </font>
          <!-- Download file links -  Add your custom fields here -->
        <a href="#">
        
        Download <b>Attendance</b> as .csv file to edit</a> <br />
        <br />
        <a href="#">
        Download <b>Attendance</b> as .txt file to edit</a></p></td>
    </tr>
   <!-- <tr>
      <td width="19%" class="row1"><input type="checkbox" name="checkbox3" value="checkbox" /> 
        Pipe( | ) Delimited      </td>
      <td width="79%" class="row1"><input type="checkbox" name="checkbox32" value="checkbox" />
Pipe( | ) Delimited </td>
    </tr>
    <tr>
      <td colspan="2" class="row1"><input type="submit" name="Submit" value="Download Category/Products as .csv file to edit" /> 
        <input type="submit" name="Submit2" value="Download Category/Products as .txt file to edit" /></td>
    </tr>-->
    <tr> 
      <td colspan="2" class="row1"><p style="margin: 8px;">
        <!-- VJ product attributes end //-->
      </p>        </td>
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