{ include file = header.tpl }
<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
	<td width="200">{ include file = student/left_menu.tpl }</td>
    <td  bgcolor="#ffe503" valign="top">
	 <form id="form1" name="form1" method="post" action="">
	 <input type="hidden" name="schoolId" id="schoolId">
	 
	 
	 
	 <table border="0" align="center" width="710">
		  <tbody>
		    {if $unread > 0}
			  <tr>
				<td colspan="2"><a href='messages.php'>You have {$unread} new message(s).</a></td>
			  </tr>
			  {/if}
		  <tr valign='top'>
			<td>
				<table border="0" width="340" style="margin-right: 30px;">
		  <tbody><tr>
			<td colspan="2"><img src="{$SITEURL}images/PersonalDetailsHeader.jpg"/></td>
			</tr>
		  <tr>
			<td valign="top" style="background-color: rgb(201, 212, 20);" colspan="2">
				<table cellspacing="2" cellpadding="2" border="0" width="335">
				  <tbody><tr bgcolor="#edf564">
					<td width="117"><strong>Name:</strong></td>
					<td width="204">{$student.firstName} {$student.lastName}</td>
				  </tr>
				  <tr>
					<td><strong>Date of Birth:</strong></td>
					<td>{$student.dateOfBirth}</td>
				  </tr>
				  <tr bgcolor="#edf564">
					<td><strong>Address:</strong></td>
					<td>{$student.address} {$student.city} {$student.state} {$student.country} {$student.zip}</td>
				  </tr>
				  <tr>
					<td><strong>Contact No:</strong></td>
					<td>{$student.homePhone} {$student.mobilePhone}</td>
				  </tr>
				  <tr bgcolor="#edf564">
					<td><strong>Blood group:</strong></td>
					<td>{$student.bloodGroup}</td>
				  </tr>
				  <tr>
					<td><strong>Doctor Details ( if any):</strong></td>
					<td>Name: {$student.physicianName}<br>Phone: {$student.physicianPhone}</td>
				  </tr>
				  <tr bgcolor="#edf564">
					<td><strong>Emergency Contacts:</strong></td>
					<td>1- {$student.emergencyContactName1} - {$student.emergencyContactPhone1}<br>2- {$student.emergencyContactName2} - {$student.emergencyContactPhone2}</td>
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
			<td colspan="2"><img src="{$SITEURL}images/SchoolDetailsHeader.jpg"/></td>
			</tr>
		  <tr>
			<td style="background-color: rgb(122, 198, 190);" colspan="2">
				<table cellspacing="2" cellpadding="2" border="0" width="335">
				  <tbody><tr bgcolor="#d3f0cf">
					<td width="110"><strong>Adminssion Date:</strong></td>
					<td width="211">{$student.addmissionDate}</td>
				  </tr>
				  <tr>
					<td><strong>Adminssion Number:</strong></td>
					<td>{$student.addmissionNo}</td>
				  </tr>
				  <tr bgcolor="#d3f0cf">
					<td><strong>Class:</strong></td>
					<td>{$student.className}</td>
				  </tr>
				  <tr>
					<td><strong>Class Roll No.:</strong></td>
					<td>{$student.studentId} </td>
				  </tr>
				  <tr bgcolor="#d3f0cf">
					<td><strong>Class Teacher Name:</strong></td>
					<td>{$student.teacherName}</td>
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
  </tr>
</tbody></table>
	 
	 
	 
	 
	 
	 
	 
	 <!--
	<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="47">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  {if $unread > 0}
	  <tr>
	    <td colspan="2"><a href='messages.php'>You have {$unread} new message(s).</a></td>
	  </tr>
	  {/if}
      <tr>
        <td valign="top">
		
		
		
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
         
		  <tr>
            <td><img src="{$SITEURL}images/personal_top.jpg" width="347" height="43" /></td>
          </tr>
          <tr>
            <td class="loginbg2"><table width="325" border="0" cellspacing="0" cellpadding="2">
              <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td style="width:132px;" ><b>Name</b></td>
                <td style="width:3px;" >:</td>
                <td style="width:195px;" >{$student.firstName} {$student.lastName}</td>
              </tr>
             <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Date of Birth</b></td>
                <td >:</td>
                <td >{$student.dateOfBirth}</td>
              </tr>
              <tr style="height:80px";>
                <td style="width:2px;">&nbsp;</td>
                <td  valign="top"><b>Address</b></td>
                <td valign="top">:</td>
                <td valign="top">{$student.address} {$student.city} {$student.state} {$student.country} {$student.zip}</td>
              </tr>
              <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Contact No</b><br /></td>
                <td >:</td>
                <td >{$student.homePhone} {$student.mobilePhone}</td>
              </tr>
              <tr style="height:40px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Blood group</b><br /></td>
                <td >:</td>
                <td >{$student.bloodGroup}</td>
              </tr>
              <tr style="height:50px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Doctor Details ( if any)</b><br /></td>
                <td >:</td>
                <td >Name: {$student.physicianName}<br>Phone: {$student.physicianPhone}</td>
              </tr>
              <tr style="height:60px";>
                <td style="width:2px;">&nbsp;</td>
                <td ><b>Emergency Contacts</b></td>
                <td >:</td>
                <td >1- {$student.emergencyContactName1} - {$student.emergencyContactPhone1}<br>2- {$student.emergencyContactName2} - {$student.emergencyContactPhone2}</td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td align="right" height="6" class="loginbg2"></td>
          </tr>
          <tr>
            <td align="right" class="loginbg2"><a href="#"><img src="{$SITEURL}images/send.jpg" width="35" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td><img src="{$SITEURL}images/personalbtm.jpg" width="347" height="21" /></td>
          </tr>
        </table>
		</td>
        <td valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="{$SITEURL}images/detail_top.jpg" width="324" height="43" /></td>
          </tr>
          <tr>
            <td class="loginbg"><table width="98%" border="0" cellspacing="0" cellpadding="6">
              <tr>
                <td width="8%">&nbsp;</td>
                <td width="48%" align="left" valign="top" ><b>Adminssion Date</b><br />                  <br /></td>
                <td width="4%" valign="top" >:</td>
                <td width="40%" valign="top" >{$student.addmissionDate}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>Admission Number</b><br />                  <br /></td>
                <td valign="top" >:</td>
                <td valign="top" >{$student.addmissionNo}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>Class</b><br />                  <br /></td>
                <td valign="top" >:</td>
                <td valign="top" >{$student.className}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>Class Roll No</b><br />                  <br /></td>
                <td valign="top" >:</td>
                <td valign="top" >{$student.studentId}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top" ><b>Class teacher Name</b><br /></td>
                <td valign="top" >:</td>
                <td valign="top" >{$student.teacherName}</td>
              </tr>
              
              
            </table></td>
          </tr>
          <tr>
            <td class="loginbg">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" valign="top" class="loginbg"><span class="loginbg2"><a href="#"><img src="{$SITEURL}images/send.jpg" width="35" height="16" border="0" /></a></span>&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><img src="{$SITEURL}images/detailbtm.jpg" width="311" height="31" /></td>
          </tr>
          <tr>
            <td align="right"><img src="{$SITEURL}images/student_info.jpg" width="311" height="40" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
	
	-->
	
	
	
	
	
	
	
	
	
	</form></td>
  </tr>
 </table>
{ include file = footer.tpl }