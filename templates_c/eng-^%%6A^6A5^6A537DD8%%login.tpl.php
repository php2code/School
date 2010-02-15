<?php /* Smarty version 2.6.22, created on 2010-02-15 10:30:36
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<!--td width="200">&nbsp;</td-->
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<form id="form1" name="form1" method="post" action="">
					<input type="hidden" name="schoolId" id="schoolId">
					<tr align="center">
						<td colspan="2" bgcolor="#ffe503">
						
						
						</td>
					</tr>
					<tr>
						<td  bgcolor="#ffe503" valign="top" colspan="2">
							<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td width="48%" >&nbsp;</td>
									<td colspan="2" >&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">
									<img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/new.jpg" width="179" height="41" /><br><br>
									<span class="redtext">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</span><br />
										<br />
										There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
										<br />
										<br />
										<span class="redtext">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</span><br />
										<br />
										There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
									</td>
									<td width="22%" valign="top">&nbsp;</td>
									<td width="30%" valign="top">
									
									
									<!-- login form start -->
									<div id="loginDiv" style="display:block" >
										<table width="280" border="0" cellpadding="0" cellspacing="0" class="login_table">
											<tr>
												<td bgcolor="#ffe503"><fieldset style="border:1px solid green"><legend style="padding: 0.2em 0.5em;
  border:1px solid green;
  color:green;
  font-size:100%;
  text-align:center;
"><strong>Login</strong></legend>
													<table width="280" border="0" cellspacing="1" cellpadding="4">
														
														<tr>
															<td width="78" align="left" class="redtext">Login ID<span class="errortext_red">*</span></td>
															<td width="183" align="left">
																
																<input type="text" name="username" id="username"  class="textbox_normal2" size="20" value="<?php echo $_REQUEST['username']; ?>
"  onkeypress="doEnter(event);"  />
															</td>
														</tr>
														
														<tr>
															<td width="78" align="left" class="redtext">Password<span class="errortext_red">*</span></td>
															<td width="183" align="left">
																<input type="password" id="password" name="password" class="textbox_normal2" size="20" onkeypress="doEnter(event);" />
															</td>
														</tr>
														<tr>
															<td width="50%" align="right">
															<input type="button" value="Login" onclick='doLogin();'>
															</td>
															<td width="50%" align="left">
															<input type="button" value="Reset" onclick="document.getElementById('username').value='';document.getElementById('password').value='';document.getElementById('username').select();">
															</td>
														</tr>							
														<tr>
															<td colspan="2" align="left" valign="middle" ><strong>Forgot Your Password?</strong>
																<a href="forgot_password.php" class="more" style="text-decoration:underline;" > Click here </a> 
															</td>
														</tr>
													</table>
													</fieldset>
												</td>
											</tr>
										</table>
									</div>
						
									<!-- login form end -->
									
									<img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/work.jpg" width="179" height="41" /><br><br>
									<img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/img.jpg" width="289" height="197" />
									</td>
								</tr>
								<tr>
									<td valign="top"><br />
										
									</td>
									<td valign="top">&nbsp;</td>
									<td valign="top"></td>
								</tr>
								<tr>
									<td valign="top">&nbsp;</td>
									<td colspan="2" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">&nbsp;</td>
									<td colspan="2" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">&nbsp;</td>
									<td colspan="2" valign="top">&nbsp;</td>
								</tr>
							</table>
		
						</td>
					</tr>
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>

<script language="javascript">
document.getElementById('username').focus();
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>