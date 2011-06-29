<?php 
	session_start();	
	$logins =$_SESSION['login']; 
	$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
	$query1="select * from users where user_name='$logins'";
	$res1=mysqli_query($con,$query1) or die("Error: ".mysqli_error($con));
	$row1=mysqli_fetch_array($res1);
	$new=$_POST['newpasswd'];
	if(isset($_POST['update']))
	{
		if(empty($_POST['oldpasswd']) && empty($_POST['newpasswd']))
		{
			echo '<center><font size=5 color=red>*Enter Password Fields*</font></center>';
			$output=true;
		}
		else if(!empty($_POST['oldpasswd']) && empty($_POST['newpasswd']))
		{
			echo '<center><font size=5 color=red>*Enter New Password*</font></center>';
			$output=true;
		}	
		else if(empty($_POST['oldpasswd']) && !empty($_POST['newpasswd']))
		{
			echo '<center><font size=5 color=red>*Enter Old Password*</font></center>';
			$output=true;
		}
		else if(!empty($_POST['oldpasswd']) && !empty($_POST['newpasswd']))
		{
			
			
			if(($row1['password']) != ($_POST['oldpasswd']))
			{
				echo '<center><font size=5 color=red>*Old password Doesn\'t Match with Database*</font></center>';
				$output=true;
			}
			else if(($_POST['repasswd']) != ($_POST['newpasswd']))
			{	
				echo '<center><font size=5 color=red>*Password dont match*</font></center>';
				$output=true;
			}
			else
			{
				$query2="UPDATE users SET password='$new' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				echo '<center><font size=5 color=red>*Password Updated*</font></center>';
				$output=true;
			}
		}
	}
	if($output)
	{
?>
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
			<div class="LoginPanel" >
				<p class="para">
					<form id="profile" name="profile" method="POST" action="change.php" >
						<center>
							<?php
						//---------------------------------------------------------
						//display user info---------------------------------------
						//---------------------------------------------------------	
								
								
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
								//echo $row1['password'];
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
<?php
	}
?>