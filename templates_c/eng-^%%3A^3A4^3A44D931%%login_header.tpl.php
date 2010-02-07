<?php /* Smarty version 2.6.22, created on 2010-01-30 05:16:05
         compiled from login_header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>School Site :: Under Cunstration</title>
		<link href="<?php echo $this->_tpl_vars['SITEURL']; ?>
styles/style.css"  rel="stylesheet" type="text/css" />
		<script language="javascript" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
js/ajax.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
js/ajax-dynamic-list.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
highslide/highslide-full.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SITEURL']; ?>
highslide/highslide.css" />

		<?php echo '
		<script language="javascript">
		'; ?>

			hs.graphicsDir = '<?php echo $this->_tpl_vars['SITEURL']; ?>
highslide/graphics/';
			hs.outlineType = 'rounded-white';
			hs.wrapperClassName = 'draggable-header'
		
			var SITEURL = '<?php echo $this->_tpl_vars['SITEURL']; ?>
';
		<?php echo '
		</script>
		'; ?>

		<?php echo '
<script language="javascript">
	function getData(colId, tblName, ddName) 
	{
		var dd = \'#\'+ddName+\' option\';
		jQuery.post(\'masterDataAjax.php\', {id:colId, tableName:tblName}, function(data){jQuery(dd).remove(); //Remove current options
		eval(data);
		for(i in optData) { 
			jQuery(\'#\'+ddName).append(\'<option value="\'+i+\'">\'+optData[i]+\'</option>\');
		}}, \'html\');
	}

	function doLogin()
	{
		var countryId=document.getElementById(\'countryId\')[document.getElementById(\'countryId\').selectedIndex].value;
		var stateId=document.getElementById(\'stateId\')[document.getElementById(\'stateId\').selectedIndex].value;
		var cityId=document.getElementById(\'cityId\')[document.getElementById(\'cityId\').selectedIndex].value;
		var schoolId=document.getElementById(\'schoolId\')[document.getElementById(\'schoolId\').selectedIndex].value;
		var username=document.getElementById(\'username\').value;
		var password=document.getElementById(\'password\').value;
		if(username=="")
		{
			alert("Please Enter LoginId.");
			document.getElementById(\'username\').focus();
			return;
		}
		
		if(password=="")
		{
			alert("Please Enter Password.");
			document.getElementById(\'password\').focus();
			return;
		}
		
		jQuery.post(\'loginAjax.php\', {countryId:countryId, stateId:stateId,cityId:cityId,schoolId:schoolId, username:username, password:password}, 
		function(data)
		{
			eval(data);
			if(optData[\'msg\']==\'fail\')
			{
				alert(\'The LoginId or password you entered is incorrect.\');
				document.getElementById(\'username\').select();
			}
			else
			{
				if(optData[\'userType\']==\'1\') //student
				{
					document.location.href=\'student/home.php\';
				}
				else
				{
					document.location.href=\'teacher/home.php\';
				}
				document.location.href.reload();
				
			}
		}, 
		\'html\');
	}
	function setSchool(id) {
	
	
		$(\'#schoolId\').val(id);
		$(\'#schoolDiv\').css({ display:"none"});
		$(\'#loginDiv\').css({ display:"block"});
		
		document.getElementById(\'username\').select();
		


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

	</head>
	<body bottommargin="0" topmargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0">
	<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><img src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/school_logo/<?php if ($_SESSION['schoolLogo']): ?><?php echo $_SESSION['schoolLogo']; ?>
<?php else: ?>default.jpg	<?php endif; ?>" width="968" height="93" /></td>
	</tr>
	<tr>
		<td class="header" align="right" valign="top" >
			<table width="45%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="59" align="left" class="heading">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td width="96%" align="left" class="heading">About Us </td>
					<td width="4%">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" height="4"></td>
				</tr>
				<tr>
					<td bgcolor="#c7c7c7" height="1"></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2"  height="4"></td>
				</tr>
				<tr>
					<td align="left"><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="right"><a href="#" class="more">More...</a></td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!-- Login Strip --->
<form id="frmLogin" method="post" action="login.php">
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td height="43" bgcolor="#3399ff">
		
			<table cellspacing="0" cellpadding="4" align="center" width="69%" class="LinkTable">
				<tr >
					<td class='LinkTable' >
					<?php if ($_SESSION['userId']): ?><?php echo $_SESSION['countryName']; ?>
<?php else: ?>
					<select class="SelectBox" id="countryId" name="countryId" onchange="getData(this.value, 'states', 'stateId');">
					<option value="">--Select Country--</option>
					<?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cnt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cnt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['country']):
        $this->_foreach['cnt']['iteration']++;
?>
					<option value="<?php echo $this->_tpl_vars['country']['countryId']; ?>
"><?php echo $this->_tpl_vars['country']['countryName']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
					</select>
					<?php endif; ?>
					</td>
					<td class='LinkTable' >
					<?php if ($_SESSION['userId']): ?><?php echo $_SESSION['stateName']; ?>
<?php else: ?>
					<select class="SelectBox" id="stateId" name="stateId" onchange="getData(this.value, 'cities', 'cityId');">
							<option value="">--Select--</option>
							</select>
					<?php endif; ?>
					</td>
					<td class='LinkTable' >
					<?php if ($_SESSION['userId']): ?><?php echo $_SESSION['cityName']; ?>
<?php else: ?>
					<select class="SelectBox" id="cityId" name="cityId" onchange="getData(this.value, 'schools', 'schoolId');getSchoolList(this.value, 'schools');">
							<option value="">--Select--</option>
							</select>
					<?php endif; ?>	
					</td>
					<td class='LinkTable' >
					<?php if ($_SESSION['userId']): ?><?php echo $_SESSION['schoolName']; ?>
<?php else: ?>
					<select class="SelectBox" name="schoolId" size="1" id="schoolId" onchange="document.getElementById('username').select();">
						<option>School</option>
					</select>
					<?php endif; ?>
					</td>
					<td align="center" style="border: 1px solid rgb(0, 204, 255);">
					<?php if ($_SESSION['userId']): ?><a href="<?php echo $this->_tpl_vars['SITEURL']; ?>
app/index.php?act=logout"><img border="0" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/Logout.gif"/></a><?php else: ?>
					<a href="#"><input type="image" src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/login.jpg" width="108" height="29" border="0">
					<!--
					<img  src="<?php echo $this->_tpl_vars['SITEURL']; ?>
images/login.jpg" width="108" height="29" border="0" onclick="setSchool(this.value);" />
					-->
					</a>
					<?php endif; ?>
						</td>
				
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#8ac128" height="14"></td>
	</tr>
</table>

</form>
<!-- Login Strip --->