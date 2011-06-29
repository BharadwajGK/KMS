<html>
<head><title>Change Password</title>
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
				<form id="profile" name="profile" method="POST" action="change.php" >
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
								echo 'Old Password: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
								echo '<input type="password" size =20 name="oldpasswd" >'.'</br>'.'</br>';
								echo 'New Password: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
								echo '<input type="password" size =20 name="newpasswd" >'.'</br>'.'</br>';
								echo 'Retype New Password: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
								echo '<input type="password" size =20 name="repasswd" >'.'</br>'.'</br>';
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