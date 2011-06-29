<html>
	<head>
		<title>KMS Login</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" > 
	</head>
	<body>
<?php
		session_start();
		if(!isset($_SESSION['login']))
		{
			if(isset($_COOKIE['login']))
			{
				$_SESSION['login']=$_COOKIE['login'];
			}
		}
			
		$_SESSION['login'] = $_POST['login'];
		$login=$_POST['login'];
		$passwd=$_POST['passwd'];
		$submit=$_POST['SignIn'];
		$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
		
		$query="select * from users where user_name='$login'";
		$res=mysqli_query($con,$query) or die("Error: ".mysqli_error($con));
		if(isset($_POST['SignIn']))
		{	
			$output=false;
			$next=false;
			if(empty($login) && empty($passwd))
			{
				echo '<center><h4 ><i><font color=red >*Please enter your Username and Password*</font></i></h4></center>';	
				$output=true;
			}
			if(empty($login) && !(empty($passwd)))
			{
				echo '<center><h4 ><i><font color=red >*Invalid Username*</font></i></h4></center>';	
				$output=true;
			}
			if((!empty($login)) &&(empty($passwd)))
			{
				echo '<center><h4 ><i><font color=red >*Invalid Password*</font></i></h4></center>';	
				$output=true;
			}
			if((!empty($login)) && (!empty($passwd)))		
			{
				while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
				{
		
					if(($row['user_name'] == $login) && ($row['password'] == $passwd))
					{
						echo '<center><h4 ><i><font color=red >*Successful Login*</font></i></h4></center>';
						setcookie('username',$row['user_name'],time() +(60*60*24*30));
						$next=true;
						
					}
					else
					{
						echo '<center><h4 ><i><font color=red >*Invalid Username and Password*</font></i></h4></center>';		
						$output=true;
					}
			
				}
			}
		}
		else
		{
			$output=true;
		}
//---------------------------------------------------------------------------------------------------------------------
// This condition is dispaly the form if the input is invalid
//---------------------------------------------------------------------------------------------------------------------

		if($output)	
		{
?>
<div class="header">
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <font size=15pt>KMS</font>
	</div>

	<div class="left">
		
	</div>

	<div class="center">
		
		<div class="subdiv">
			
			<div class="LoginPanel" >
				
				</br></br>
				<p class="para">
					<form id="loginform" name="loginform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
						<center>Username : &nbsp &nbsp &nbsp &nbsp &nbsp
							<input type="text" id="login" name="login" maxlength=20  /></br> </br>
							Password : &nbsp &nbsp &nbsp &nbsp &nbsp
							<input type="password" id="passwd" name="passwd" maxlength=20 /></br> </br>
							<input type="Submit" name="SignIn" value="Sign In" id="signin"/></br></br></br></br>
								
							<i><font face="ms linedraw" size=3pt id=fonts">New to KMS ?</font></i></br>
							<input type="button" name="Create" value="Create  an Account >>>" OnClick="location.href='registration.html';" id="createacc"/></br></br>
							
							</br></br></br></br><i><font face="ms linedraw" size=2pt>Forgot Password ??</br>
							Email System Administrator:</br>
							sysadmin@abc.org</font></i>
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
<?php
}
//---------------------------------------------------------------------------------------------------------------------
// This condition is to dispaly the form if the input is valid
//---------------------------------------------------------------------------------------------------------------------

		if($next)
		{
			
?>

	<div class="header">
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <font size=15pt>KMS</font>
	</div>

	<div class="left">
		
	</div>

	<div class="center">
		
		<div class="subdiv">
			<form id="profile" name="profile" method=" GET" action="">
			<font size=4px color=White><a href="MyProfile.php?id=' .$row1['user_id'].'&amp;date='.$row1['reg_date'].'&amp;fname='.$row1['lastname'].'&amp;lname'.$row1['firstname'].'&amp;phone'.$row1['phone'].'&amp;email'.$row1['email'].'&amp;title'.$row1['title'].'&amp;branch'.$row1['branch'].'&amp;login'.$row1['username'].'" >My Profile</a> &nbsp &nbsp &nbsp  |&nbsp &nbsp <ahref="EditProfile.html">Edit Profile</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="Changepasswd">Change Password</a>&nbsp|&nbsp <a href="logout.html">Logout</a></font>
				<div class="LoginPanel" >
				
						<center>
							<?php
						//---------------------------------------------------------
						//display user info---------------------------------------
						//---------------------------------------------------------	
								header('Location: http://localhost/xampp/KMS/MyProfile.php');
							
		
							?>
						</center>
						

					</div>
				
			</form>
		</div>
	</div>

	<div class="right">
		
	</div>
	<div class="footer">
	<center> <font face="ms linedraw" size=2pt>@2011 KMS inc </font></center>
	</div>
<?php
		}
		mysqli_close($con);
?>
	</body>
</html>	