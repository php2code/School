<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>School Site :: Under Construction</title>
		<link href="{$SITEURL}styles/style.css"  rel="stylesheet" type="text/css" />
		<script language="javascript" src="{$SITEURL}js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="{$SITEURL}js/ajax.js"></script>
		<script type="text/javascript" src="{$SITEURL}js/ajax-dynamic-list.js"></script>
		<script type="text/javascript" src="{$SITEURL}highslide/highslide-full.js"></script>
		
		<link rel="stylesheet" type="text/css" href="{$SITEURL}highslide/highslide.css" />

		{literal}
		<script language="javascript">
		{/literal}
			hs.graphicsDir = '{$SITEURL}highslide/graphics/';
			hs.outlineType = 'rounded-white';
			hs.wrapperClassName = 'draggable-header'
		
			var SITEURL = '{$SITEURL}';
		{literal}
		</script>
		{/literal}
		{literal}
<script language="javascript">

	function validateForm()
	{
		if(document.getElementById('countryId').value=="")
		{
			alert("Please select country")
			return false;
		}
		if(document.getElementById('stateId').value=="")
		{
			alert("Please select state")
			return false;
		}
		if(document.getElementById('cityId').value=="")
		{
			alert("Please select city")
			return false;
		}
		if(document.getElementById('schoolId').value=="")
		{
			alert("Please select school")
			return false;
		}
	}
	
	function getData(colId, tblName, ddName) 
	{
		var dd = '#'+ddName+' option';
		jQuery.post('masterDataAjax.php', {id:colId, tableName:tblName}, function(data){jQuery(dd).remove(); //Remove current options
		eval(data);
		for(i in optData) { 
			jQuery('#'+ddName).append('<option value="'+i+'">'+optData[i]+'</option>');
		}}, 'html');
	}

	function doLogin()
	{
		var countryId=document.getElementById('countryId')[document.getElementById('countryId').selectedIndex].value;
		var stateId=document.getElementById('stateId')[document.getElementById('stateId').selectedIndex].value;
		var cityId=document.getElementById('cityId')[document.getElementById('cityId').selectedIndex].value;
		var schoolId=document.getElementById('schoolId')[document.getElementById('schoolId').selectedIndex].value;
		var username=document.getElementById('username').value;
		var password=document.getElementById('password').value;
		if(username=="")
		{
			alert("Please Enter LoginId.");
			document.getElementById('username').focus();
			return;
		}
		
		if(password=="")
		{
			alert("Please Enter Password.");
			document.getElementById('password').focus();
			return;
		}
		
		jQuery.post('loginAjax.php', {countryId:countryId, stateId:stateId,cityId:cityId,schoolId:schoolId, username:username, password:password}, 
		function(data)
		{
			eval(data);
			if(optData['msg']=='fail')
			{
				alert('The LoginId or password you entered is incorrect.');
				document.getElementById('username').select();
			}
			else
			{
				if(optData['userType']=='1') //student
				{
					document.location.href='student/home.php';
				}
				else
				{
					document.location.href='teacher/home.php';
				}
				document.location.href.reload();
				
			}
		}, 
		'html');
	}
	function setSchool(id) {
	
	
		$('#schoolId').val(id);
		$('#schoolDiv').css({ display:"none"});
		$('#loginDiv').css({ display:"block"});
		
		document.getElementById('username').select();
		


	}

	function getSchoolList(colId, tblName) {
		
		jQuery.post('masterDataAjax.php', {id:colId, tableName:tblName}, function(data){ 
		eval(data);
		var tblhtml = "<table>";
		for(i in optData) { 
			tblhtml += "<tr><td><a href='javascript:void(0);' onclick='setSchool("+i+")'>"+optData[i]+"</td></tr>";
			//jQuery('#'+ddName).append('<option value="'+i+'">'+optData[i]+'</option>');
		}
		tblhtml += "</table>";
		$('#schoolDiv').html(tblhtml);
		}, 'html');
	}
	
	
	
	
	
	function doEnter(e)
	{ //e is event object passed from function invocation
		var characterCode //literal character code will be stored in this variable

		if(e && e.which)
		{ //if which property of event object is supported (NN4)
			e = e
			characterCode = e.which //character code is contained in NN4's which property
		}
		else
		{
			e = event
			characterCode = e.keyCode //character code is contained in IE's keyCode property
		}

		if(characterCode == 13)
		{ //if generated character code is equal to ascii 13 (if enter key)
			doLogin();//submit the form
			return false
		}	
		else
		{
			return true
		}
	}

</script>
{/literal}
	</head>
	<body bottommargin="0" topmargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0">
	<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><img src="{$SITEURL}images/school_logo/{if $smarty.session.schoolLogo}{$smarty.session.schoolLogo}{else}default.jpg	{/if}" width="968" height="93" /></td>
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
					<td align="right"><a href="{$SITEURL}app/aboutus.php" class="more">More...</a></td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!-- Login Strip --->
<form id="frmLogin" method="post" >
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td height="43" bgcolor="#3399ff">
		
			<table cellspacing="0" cellpadding="4" align="center" width="69%" class="LinkTable">
				<tr >
					<td class='LinkTable' >
					{if $smarty.session.userId}{$smarty.session.countryName}{else}
					<select class="SelectBox" id="countryId" name="countryId" onchange="getData(this.value, 'states', 'stateId');">
					<option value="">--Select Country--</option>
					{foreach from=$countries item=country name=cnt}
						{if $smarty.post.countryId==$country.countryId}
							<option selected value="{$country.countryId}">{$country.countryName}</option>						
						{else}
							<option  value="{$country.countryId}">{$country.countryName}</option>						
						{/if}
					{/foreach}
					</select>
					{/if}
					</td>
					<td class='LinkTable' >
					{if $smarty.session.userId}{$smarty.session.stateName}{elseif $smarty.post.stateId}
					
						<select class="SelectBox" id="stateId" name="stateId" onchange="getData(this.value, 'cities', 'cityId');">
						{foreach from=$states item=state name=cnt1}
							{if $state.stateId==$smarty.post.stateId}
								<option selected value="{$state.stateId}">{$state.stateName}</option>												
							{else}
								<option  value="{$state.stateId}">{$state.stateName}</option>												
							{/if}
						{/foreach}
						</select>
					{else}
					<select class="SelectBox" id="stateId" name="stateId" onchange="getData(this.value, 'cities', 'cityId');">
							<option value="">--Select--</option>
					</select>
					{/if}
					</td>
					<td class='LinkTable' >
					{if $smarty.session.userId}{$smarty.session.cityName}{elseif $smarty.post.cityId}
						<select class="SelectBox" id="cityId" name="cityId" onchange="getData(this.value, 'schools', 'schoolId');getSchoolList(this.value, 'schools');">
						{foreach from=$cities item=city name=cnt2}
							{if $city.cityId==$smarty.post.cityId}
								<option selected value="{$city.cityId}">{$city.cityName}</option>														
							{else}
								<option  value="{$city.cityId}">{$city.cityName}</option>														
							{/if}
						{/foreach}
						</select>
					
					{else}
					<select class="SelectBox" id="cityId" name="cityId" onchange="getData(this.value, 'schools', 'schoolId');getSchoolList(this.value, 'schools');">
							<option value="">--Select--</option>
							</select>
					{/if}	
					</td>
					<td class='LinkTable' >
					{if $smarty.session.userId}{$smarty.session.schoolName}{elseif $smarty.post.schoolId}
					
					<select class="SelectBox" name="schoolId" size="1" id="schoolId" >
						{foreach from=$schools item=school name=cnt3}
							{if $school.schoolId==$smarty.post.schoolId}
								<option selected value="{$school.schoolId}">{$school.schoolName}</option>														
							{else}
								<option  value="{$school.schoolId}">{$school.schoolName}</option>														
							{/if}
						{/foreach}
						</select>
					
					{else}
					<select class="SelectBox" name="schoolId" size="1" id="schoolId">
						<option>School</option>
					</select>
					{/if}
					</td>
					<td align="center" style="border: 1px solid rgb(0, 204, 255);">
					{if $smarty.session.userId}<a href="{$SITEURL}app/index.php?act=logout"><img border="0" src="{$SITEURL}images/Logout.gif"/></a>{else}
					<a href="#"><input type="image" src="{$SITEURL}images/login.jpg" width="108" height="29" border="0" onclick="return validateForm()">
					<input type="hidden" name="action" id="action" value="submit">
					<!--
					<img  src="{$SITEURL}images/login.jpg" width="108" height="29" border="0" onclick="setSchool(this.value);" />
					-->
					</a>
					{/if}
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




<table cellspacing="0" cellpadding="0" border="0" align="center" width="968">
	<tr>
		<td bgcolor="#ffe503" valign="top">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr valign='top'>
				 <td height='40' width="100%" class="PageHeading">{$module_heading}</td>
			  </tr>
			</table>
		</td>
	</tr>
	
</table>