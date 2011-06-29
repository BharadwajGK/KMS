<html>
<head><title>My Profile </title>
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
					
						<center>
							<?php
						//---------------------------------------------------------
						//display user info---------------------------------------
						//---------------------------------------------------------	
								session_start();	
								$logins =$_SESSION['login']; 
									
								$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
								//-----------------------------------------------------------------------------
								//query for display users info...........
								//-----------------------------------------------------------------------------
								$query1="select * from users where user_name='$logins'";
								$res1=mysqli_query($con,$query1) or die("Error: ".mysqli_error($con));
								$row1=mysqli_fetch_array($res1);
								echo '</br></br>';
								echo $row1['firstname'].' '.$row1['lastname'].'</br>';
								echo 'Phone: '.$row1['phone'].'</br>';
								echo 'Email: '.$row1['email'].'</br>'.'</br>'.'</br>';
								//-----------------------------------------------------------------------------
								//query for display mapping tables for title info...........
								//-----------------------------------------------------------------------------
								
								$query2="Select title from title where title_id='".$row1['title']."'";
								$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
								$row2=mysqli_fetch_array($res2);
								
								//-----------------------------------------------------------------------------
								//query for display mapping tables for branch info...........
								//-----------------------------------------------------------------------------
								
								$query3="Select branch from branch where branch_id='".$row1['branch']."'";
								$res3=mysqli_query($con,$query3) or die("Error: ".mysqli_error($con));
								$row3=mysqli_fetch_array($res3);
											
								//-----------------------------------------------------------------------------
								//query for display mapping tables for qualification info...........
								//-----------------------------------------------------------------------------
								
								$query4="Select qual_name from qual where qual_id='".$row1['qual_name']."'";
								$res4=mysqli_query($con,$query4) or die("Error: ".mysqli_error($con));
								$row4=mysqli_fetch_array($res4);
												
								//-----------------------------------------------------------------------------
								//query for display mapping tables for xp info...........
								//-----------------------------------------------------------------------------
								
								$xp=$row1['xp'];//echo $xp;
								$query5="Select exp_yrs from exp where exp_id='".$row1['xp']."'";
								$res5=mysqli_query($con,$query5) or die("Error: ".mysqli_error($con));
								$row5=mysqli_fetch_array($res5);
							//----------------------------------------------------------------------------------------------------------------					
								if($row1['access'] ==1)
								{
									echo '<table align="left" cellpadding=10><tr><td ><center><font size=4>Consultant Type&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row2['title'].'</font></center></td></tr>';
									echo '<tr><td ><center><font size=4>Branch &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row3['branch'].'</font></center></td></tr>';
									echo '<tr><td ><center><font size=4>Qualification&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row4['qual_name'].'</font></center></td></tr>';
									echo '<tr><td ><center><font size=4>Experience at this position&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row5['exp_yrs'].'</font></center></td></tr></table>';
										
								}
								else 
								{
									echo '<form method="POST" action="Manager.php">';
									echo '<table align="left"  cellpadding=10><tr><td ><center><font size=4>Consultant Type&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="title">
									<option value="-1">Select</option>
									<option value="1">Business Analyst</option>
  									<option value="2">System Analyst</option>
  									<option value="3">Infrastructure Analyst </option>
 									<option value="4">Change Analyst</option></select></font></center></td></tr>';
			
									echo '<tr><td ><center><font size=4>Branch &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="branch" >
  									<option value="-1">Select</option>
									<option value="1">Bangalore</option>
  									<option value="2">New York</option>
  									<option value="3">Madrid </option>
 									<option value="4">Waterford</option>
									</select></font></center></td></tr></table>';
									echo '<input type="submit" value="Search" name="Search">';
									//echo '<center><iframe src="Manager.php" width="600" height="200" ></iframe></center>';

									echo '</form>';
								
								}
								
								
							?>
						</center>
						
					
					
				
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