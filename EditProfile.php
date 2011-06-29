<html>
<head><title>Edit Profile </title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" > 
<body>
<div class="header">
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <font size=15pt>KMS</font>
	</div>

	<div class="left">
		
	</div>

	<div class="center">
		
		<div class="subdiv">
			<font size=4px color=White><a href="MyProfile.php">My Profile</a> &nbsp &nbsp &nbsp  |&nbsp &nbsp |<a href="EditProfile.php">Edit Profile</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp <a href="ChangePasswd.php">Change Password </a>&nbsp|&nbsp <a href="logout.php">Logout</a></font>
			<div class="LoginPanel" ><p class="para">
				<form id="profile" name="profile" method="POST" action="edit.php" >
						<center>
							<?php
						//---------------------------------------------------------
						//display user info---------------------------------------
						//---------------------------------------------------------	
								
								
								session_start();	
								$logins =$_SESSION['login']; 
								$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
								$query1="select * from users where user_name='$logins'";
								$res1=mysqli_query($con,$query1) or die("Error: ".mysqli_error($con));
								$row1=mysqli_fetch_array($res1);
								echo $row1['firstname'].' '.$row1['lastname'].'</br>';
								echo 'Phone: '.$row1['phone'].'</br>';
								echo 'Email: '.$row1['email'].'</br>'.'</br>'.'</br>';
								echo '<table align="left"  cellpadding=10><tr><td ><center><font size=4>Consultant Type&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="edittitle">
									<option value="-1">Select</option>
									<option value="1">Business Analyst</option>
  									<option value="2">System Analyst</option>
  									<option value="3">Infrastructure Analyst </option>
 									<option value="4">Change Analyst</option></select></font></center></td></tr>';
			
								echo '<tr><td ><center><font size=4>Branch &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="editbranch" >
  									<option value="-1">Select</option>
									<option value="1">Bangalore</option>
  									<option value="2">New York</option>
  									<option value="3">Madrid </option>
 									<option value="4">Waterford</option>
								</select></font></center></td></tr>';
								echo '<tr><td ><center><font size=4>Qualification&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><select name="editqual" >
  									<option value="-1">Select</option>
									<option value="1">B.E</option>
  									<option value="2">H.Dip</option>
  									<option value="3">M.Sc</option>
 									<option value="4">MBA</option>
								</select></font></center></td></tr>';
								echo '<tr><td ><center><font size=4>Experience at this position&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="editxp" >
  									<option value="-1">Select</option>
									<option value="1">1-2 years</option>
  									<option value="2">2-5 years</option>
  									<option value="3">5-8 years</option>
 									<option value="4">>8 years</option>
								</select></font></center></td></tr></table>';
								echo '</hr>';
								echo '<input type="submit" value="Update" name="update">';
								
								?>
							
						</center>
						

					</form>
				</p>
			</div>
		</div>
	</div>

	<div class="right">
		
	</div>
	<div class="footer">
	<center> <font face="ms linedraw" size=2pt>@2011 KMS inc </font></center>
	</div>
</body>
</html>