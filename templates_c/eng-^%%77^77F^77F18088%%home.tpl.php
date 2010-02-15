<?php /* Smarty version 2.6.22, created on 2010-02-15 11:01:09
         compiled from teacher/home.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
	<td width="200"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "teacher/left_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
    <td  bgcolor="#ffe503" valign="top">
	 <form id="form1" name="form1" method="post" action="">
	 <input type="hidden" name="schoolId" id="schoolId">
	 
	 
	 <table border="0" align="center" width="710">
		  <tbody>
		    <?php if ($this->_tpl_vars['unread'] > 0): ?>
			  <tr>
				<td colspan="2"><a href='messages.php'>You have <?php echo $this->_tpl_vars['unread']; ?>
 new message(s).</a></td>
			  </tr>
			  <?php endif; ?>
		  <tr valign='top'>
			<td>
				<table border="0" width="340" style="margin-right: 30px;">
		  <tbody><tr>
			<td colspan="2"><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/PersonalDetailsHeader.jpg"/></td>
			</tr>
		  <tr>
			<td valign="top" style="background-color: rgb(201, 212, 20);" colspan="2">
				<table cellspacing="2" cellpadding="2" border="0" width="335">
				  <tbody><tr bgcolor="#edf564">
					<td width="117"><strong>Name:</strong></td>
					<td width="204"><?php echo $this->_tpl_vars['student']['firstName']; ?>
 <?php echo $this->_tpl_vars['student']['lastName']; ?>
</td>
				  </tr>
				  <tr>
					<td><strong>Date of Birth:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['dateOfBirth']; ?>
</td>
				  </tr>
				  <tr bgcolor="#edf564">
					<td><strong>Address:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['address']; ?>
 <?php echo $this->_tpl_vars['student']['city']; ?>
 <?php echo $this->_tpl_vars['student']['state']; ?>
 <?php echo $this->_tpl_vars['student']['country']; ?>
 <?php echo $this->_tpl_vars['student']['zip']; ?>
</td>
				  </tr>
				  <tr>
					<td><strong>Contact No:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['homePhone']; ?>
 <?php echo $this->_tpl_vars['student']['mobilePhone']; ?>
</td>
				  </tr>
				  <tr bgcolor="#edf564">
					<td><strong>Blood group:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['bloodGroup']; ?>
</td>
				  </tr>
				  <tr>
					<td><strong>Doctor Details ( if any):</strong></td>
					<td>Name: <?php echo $this->_tpl_vars['student']['physicianName']; ?>
<br>Phone: <?php echo $this->_tpl_vars['student']['physicianPhone']; ?>
</td>
				  </tr>
				  <tr bgcolor="#edf564">
					<td><strong>Emergency Contacts:</strong></td>
					<td>1- <?php echo $this->_tpl_vars['student']['emergencyContactName1']; ?>
 - <?php echo $this->_tpl_vars['student']['emergencyContactPhone1']; ?>
<br>2- <?php echo $this->_tpl_vars['student']['emergencyContactName2']; ?>
 - <?php echo $this->_tpl_vars['student']['emergencyContactPhone2']; ?>
</td>
				  </tr>
				
				  <tr height='40'>
					<td> </td>
					<td> </td>
				  </tr>
				</tbody></table>
				
							</td>
							</tr>
						  <tr>
							<td> </td>
							<td> </td>
						  </tr>
						</tbody></table>

	</td>
    <td>
		<table border="0" width="340">
		  <tbody>
		  
		  <tr>
			<td colspan="2"><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/SchoolDetailsHeader.jpg"/></td>
			</tr>
		  <tr>
			<td style="background-color: rgb(122, 198, 190);" colspan="2">
				<table cellspacing="2" cellpadding="2" border="0" width="335">
				  <tbody><tr bgcolor="#d3f0cf">
					<td width="110"><strong>Country:</strong></td>
					<td width="211"><?php echo $this->_tpl_vars['student']['countryName']; ?>
</td>
				  </tr>
				  <tr>
					<td><strong>State:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['stateName']; ?>
</td>
				  </tr>
				  
				  <tr bgcolor="#d3f0cf">
					<td><strong>City:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['cityName']; ?>
 </td>
				  </tr>
				  <tr bgcolor="">
					<td><strong>School:</strong></td>
					<td><?php echo $this->_tpl_vars['student']['schoolName']; ?>
</td>
				  </tr>
				 
				  <tr bgcolor="#d3f0cf" height='20'>
					<td> </td>
					<td> </td>
				  </tr>
				  <tr  height='40'>
					<td> </td>
					<td> </td>
				  </tr>
				</tbody></table>

			</td>
			</tr>
		  <tr>
			<td> </td>
			<td> </td>
		  </tr>
		</tbody></table>
	</td>
  </tr>
</tbody></table>
	 
	 <!--
	<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="47">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <?php if ($this->_tpl_vars['unread'] > 0): ?>
	  <tr>
	    <td colspan="2"><a href='messages.php'>You have <?php echo $this->_tpl_vars['unread']; ?>
 new message(s).</a></td>
	  </tr>
	  <?php endif; ?>
      <tr>
        <td valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
         
		  <tr>
            <td><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/personal_top.jpg" width="347" height="43" /></td>
          </tr>
          <tr>
            <td class="loginbg2"><table width="325" border="0" cellspacing="0" cellpadding="2">
              <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td style="width:132px;" ><b>Name</b></td>
                <td style="width:3px;" >:</td>
                <td style="width:195px;" ><?php echo $this->_tpl_vars['student']['firstName']; ?>
 <?php echo $this->_tpl_vars['student']['lastName']; ?>
</td>
              </tr>
             <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Date of Birth</b></td>
                <td >:</td>
                <td ><?php echo $this->_tpl_vars['student']['dateOfBirth']; ?>
</td>
              </tr>
              <tr style="height:80px";>
                <td style="width:2px;">&nbsp;</td>
                <td  valign="top"><b>Address</b></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $this->_tpl_vars['student']['address']; ?>
 <?php echo $this->_tpl_vars['student']['city']; ?>
 <?php echo $this->_tpl_vars['student']['state']; ?>
 <?php echo $this->_tpl_vars['student']['country']; ?>
 <?php echo $this->_tpl_vars['student']['zip']; ?>
</td>
              </tr>
              <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Contact No</b><br /></td>
                <td >:</td>
                <td ><?php echo $this->_tpl_vars['student']['homePhone']; ?>
 <?php echo $this->_tpl_vars['student']['mobilePhone']; ?>
</td>
              </tr>
              <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Blood group</b><br /></td>
                <td >:</td>
                <td ><?php echo $this->_tpl_vars['student']['bloodGroup']; ?>
</td>
              </tr>
              <tr style="height:50px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Doctor Details ( if any)</b><br /></td>
                <td >:</td>
                <td >Name: <?php echo $this->_tpl_vars['student']['physicianName']; ?>
<br>Phone: <?php echo $this->_tpl_vars['student']['physicianPhone']; ?>
</td>
              </tr>
              <tr style="height:60px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Emergency Contacts</b></td>
                <td >:</td>
                <td >1- <?php echo $this->_tpl_vars['student']['emergencyContactName1']; ?>
 - <?php echo $this->_tpl_vars['student']['emergencyContactPhone1']; ?>
<br>2- <?php echo $this->_tpl_vars['student']['emergencyContactName2']; ?>
 - <?php echo $this->_tpl_vars['student']['emergencyContactPhone2']; ?>
</td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td align="right" height="6" class="loginbg2"></td>
          </tr>
          <tr>
            <td align="right" class="loginbg2"><a href="#"><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/send.jpg" width="35" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/personalbtm.jpg" width="347" height="21" /></td>
          </tr>
        </table></td>
        <td valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/detail_top.jpg" width="324" height="43" /></td>
          </tr>
		  
		  <tr>
            <td class="loginbg"><table width="98%" border="0" cellspacing="0" cellpadding="6">
              <tr>
                <td width="8%">&nbsp;</td>
                <td width="48%" align="left" valign="top" ><b>Country<b><br />                  <br /></td>
                <td width="4%" valign="top" >:</td>
                <td width="40%" valign="top" ><?php echo $this->_tpl_vars['student']['countryName']; ?>
</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>State</b><br />                  <br /></td>
                <td valign="top" >:</td>
                <td valign="top" ><?php echo $this->_tpl_vars['student']['stateName']; ?>
</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>City</b><br />                  <br /></td>
                <td valign="top" >:</td>
                <td valign="top" ><?php echo $this->_tpl_vars['student']['cityName']; ?>
</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>School</b><br />                  <br /></td>
                <td valign="top" >:</td>
                <td valign="top" ><?php echo $this->_tpl_vars['student']['schoolName']; ?>
</td>
              </tr>
              
            </table></td>
          </tr>
		  
		  
          <tr>
            <td class="loginbg">
			
			</td>
          </tr>
          <tr>
            <td class="loginbg"></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="loginbg"><span class="loginbg2"></span>&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/detailbtm.jpg" width="311" height="31" /></td>
          </tr>
          <tr>
            <td align="right"></td>
          </tr>
        </table></td>
      </tr>
    </table>
	-->
	
	
	</form></td>
  </tr>
 </table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>