{ include file = header.tpl }
{literal}
<script language="javascript">
	function sendMail() {
		$('#act').val('send');
		$('#messageForm').submit();
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
	var classId=document.getElementById('classId').value;
	if(classId=='')
	{
		alert("Please Select Class!");
		obj.value='';
		document.getElementById('classId').focus();
		return false;
	}
	var params="classId="+classId+"&"+codeblock;
	
	
	ajax_showOptions(obj,params,e);
}
function validate()
{
	var classId=document.getElementById('classId').value;
	if(classId=='')
	{
		alert("Please Select Class!");
		document.getElementById('classId').focus();
		return false;
	}
	
	return true;
}
</script>


	
{/literal}
<!-- the tooltip --> 

<div class="tooltip">&nbsp;</div> 
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td width="200" valign="top">
		{if $smarty.session.userType == 2}
		{ include file = teacher/left_menu.tpl }
		{else}
			{ include file = student/left_menu.tpl }
		{/if}
		</td>
			<td  bgcolor="#ffe503" valign="top">
				<table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">
					<form id="messageForm" name="messageForm" method="post" action="">
					<input type="hidden" name="act" id="act">
					<input type="hidden" name="fromId" id="fromId" value="{$smarty.session.userId}">
					
					<tr style="height:10px;">
						<td class="td_text1" colspan="4"><b>&nbsp;</b>
						</td>
					</tr>
					<tr class='GridDefault' style="height:40px;">
						<td class="td_text1" valign="top">Class:</td>
						<td  valign="top">
						<select name="classId" id="classId" style="width:200px">
							<option value="">--Select Classes--</option>
							{foreach from=$classes item=class name=cnt}
							<option value="{$class.id}" {if $smarty.post.classId == $class.id}selected{/if}>{$class.className}</option>
							{/foreach}
						</select>
						</td>
						
						<td>Roll No.</td>
						<td><input type="text" name="roll_no" id="roll_no"  style="width:200px" value="{$smarty.post.roll_no}" /></td>
					</tr>
					<tr class='GridDefault' style="height:30px;">
						
						<td>First name</td>
						<td><input type="text" id="firstName" name="firstName"  style="width:200px" value="{$smarty.post.firstName}" autocomplete="off" onkeyup="autosuggest(this,'getByFirstName',event)"/>
						<input type="hidden" id="firstName_hidden" name="firstName_ID">
						</td>
						<td>Last name</td>
						<td><input type="text" name="lastName"  style="width:200px" value="{$smarty.post.lastName}" autocomplete="off" onkeyup="autosuggest(this,'getByLastName',event)" /></td>
					</tr>
					
					
					<tr class="GridSelect" style="height: 10px;">
						<td style="padding-left: 80px;" colspan="2" class="td_text1"><input type="submit" style="" onclick='return validate()' value="Search"/></td>
						<td colspan='2' style="color:red;">{if $msg!=''}{$msg}{/if}</td>
					</tr>
					<tr style="height:30px;">
						<td class="td_text1" colspan="4"><b>&nbsp;</b></td>
					</tr>
					{if $msg==''}
					
					{if $smarty.post}
						<tr>
							<td colspan="4">
								<table width="98%" class='GridStructure1' border="0" align="center" cellpadding="4" cellspacing="0">
									<tr class='GridSelect'>
										<th align="left" width="">Roll No.</th>
										<th align="left" width="">First Name</th>
										
										<th align="left" width="">Class</th>
										<th align="left" width="">Standard</th>
										
									</tr>
									{foreach from=$searchResult item=student name=cnt}
										<tr>
										
										<td  class='GridDefault' align='center'>{$student.studentId}</td>
										<td class='GridAlter' align="left" ><a href="#" style='text-decoration:underline;' onclick="return hs.htmlExpand(this, {literal}{ anchor: 'top left' } {/literal} ); ">{$student.firstName} {$student.lastName}</a>										
										
										<div  class="highslide-maincontent"  >
										
										
										<table align="center" border="0">
											<tr>
												<td colspan='2'><span class='subheading' >Personal Information</span></td>
											</tr>
											<tr>
												<td width='30%'>Name : </td>
												<td >{$student.firstName} {$student.lastName}</td>
											</tr>
											<tr>
												<td>Roll No:</td><td> {$student.studentId}</td>
											</tr>
											<tr>
												<td>Class:</td><td> {$student.className}</td>
											</tr>
											<tr>
												<td>Standard:</td><td> {$student.standard}</td>
											</tr>
											<tr>
												<td>Address:</td><td> {$student.address} {$student.city} {$student.state} {$student.country} {$student.zip}</td>
											</tr>
											<tr>
												<td>Contact No:</td><td>{$student.homePhone} {$student.mobilePhone}</td>
											</tr>
											<tr>
												<td>Blood Group:</td><td>{$student.bloodGroup}</td>
											</tr>
											
											
											<tr>
												<td colspan='2'><span class='subheading' >Attendance</span></td>
											</tr>
											<tr>
												<td>Total Attendance : </td>
												<td >{getAttendance student_id=$student.studentId attendance_check="total" att_type='flat'} </td>
											</tr>
											<tr>
												<td>Present : </td>
												<td >{getAttendance student_id=$student.studentId attendance_check="present" att_type='flat'} ({getAttendance student_id=$student.studentId attendance_check="present" att_type='percent'})</td>
											</tr>
											<tr>
												<td>Absent : </td>
												<td >{getAttendance student_id=$student.studentId attendance_check="absent" att_type='flat'} ({getAttendance student_id=$student.studentId attendance_check="absent" att_type='percent'}) </td>
											</tr>
											</table>
											
										</div>
										</td>
										
										<td class='GridDefault' align="left">{$student.className}</td>
										<td class='GridAlter'>{$student.standard}</td>
									</tr>
									{foreachelse}
									<tr><td align="left" colspan="4" style="color:red;"><b>No Student found</b></td></tr>
									{/foreach}
								</table>
							</td>
					{/if}
					{/if}
					
					
		  </form>
		</table>
		
	</td>
  </tr>
</table>

{ include file = footer.tpl }