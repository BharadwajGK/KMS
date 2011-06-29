<?php
	
		session_start();	
		$logins =$_SESSION['login']; 
		$edit_type=$_POST['edittitle'];
		$edit_branch=$_POST['editbranch'];
		$qualification=$_POST['editqual'];
		$xp=$_POST['editxp'];
		$output=false;	
		
		if(isset($_POST['update']))
		{
			$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
			$query1="select * from users where user_name='$logins'";
			$res1=mysqli_query($con,$query1) or die("Error: ".mysqli_error($con));
			$row1=mysqli_fetch_array($res1);
		
			if($edit_type != -1)
			{
				
				$query2="UPDATE users SET title='$edit_type' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				echo '<center><marquee LOOP=1 width=200 ><font size=3 color=red>*Type Successfully Updated*</font></marquee></center>';
				$output=false;
								
			}	
			else
			{	
				$query2="UPDATE users SET title='$row1[title]' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				$output=false;
				
			}
					
			if($edit_branch != -1)
			{
				$query2="UPDATE users SET branch='$edit_branch' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				echo '<center><marquee LOOP=1 width=100 ><font size=3 color=red>*Branch Successfully Updated*</font></marquee></center>';
				$output=false;
								
			}
			else
			{	
				$query2="UPDATE users SET branch='$row1[branch]' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				$output=false;
			}
		
			if(!empty($qualification))
			{
				
					
				//$pos = strstr($row1['qual_name'], "$qualification");
				//if(strstr(strtolower($row1['qual_name']), strtolower($qualification)))
				//{
					
				//	echo '<center><font size=5 color=red>*Qualification Exists</font></center>';
				//	$output=true;
					
					
				//}
				//else
				//{
					//$quals_name=$row1['qual_name'].', '.$qualification;
					$query2="UPDATE users SET qual_name='$qualification' where user_name='$logins'";
					$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
					echo '<center><font size=5 color=red>*Successfully Updated*</font></center>';
					$output=false;				
						
				//}
								
			}
			else
			{	
				$query2="UPDATE users SET qual_name='$row1[qual_name]' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				$output=false;
				
			}
			if($xp != -1)
			{
				$query2="UPDATE users SET xp='$xp' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				echo '<center><marquee LOOP=1 width=200 ><font size=3 color=red>*Xperience Successfully Updated*</font></marquee></center>';
				$output=false;
				
								
			}
			else
			{	
				$query2="UPDATE users SET xp='$row1[xp]' where user_name='$logins'";
				$res2=mysqli_query($con,$query2) or die("Error: ".mysqli_error($con));
				$output=false;
			}
		}
			
		if($output)
		{
?>
	<html>
<head><title>Edit Profile</title>
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
									<option value="Business Analyst">Business Analyst</option>
  									<option value="System Analyst">System Analyst</option>
  									<option value="Infrastructure Analyst">Infrastructure Analyst </option>
 									<option value="Change Analyst">Change Analyst</option></select></font></center></td></tr>';
			
								echo '<tr><td ><center><font size=4>Branch &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="editbranch" >
  									<option value="-1">Select</option>
									<option value="Bangalore">Bangalore</option>
  									<option value="New York">New York</option>
  									<option value="Madrid">Madrid </option>
 									<option value="Waterford">Waterford</option>
								</select></font></center></td></tr>';
								echo '<tr><td ><center><font size=4>Qualification&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><textarea rows=2 cols=20 name="editqual"></textarea></center></td></tr>';
								echo '<tr><td ><center><font size=4>Experience at this position&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4><select name="editxp" >
  									<option value="-1">Select</option>
									<option value="1-2 years">1-2 years</option>
  									<option value="2-5 years">2-5 years</option>
  									<option value="5-8 years">5-8 years</option>
 									<option value=">8 years">>8 years</option>
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
	</div></body></html>
<?php
	}
	else
	{
?>
	<html>
<head><title>My Profile</title>
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
				<form id="profile" name="profile" method="POST" action="">
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
												
								echo '<table align="left" cellpadding=10><tr><td ><center><font size=4>Consultant Type&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row2['title'].'</font></center></td></tr>';
								echo '<tr><td ><center><font size=4>Branch &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row3['branch'].'</font></center></td></tr>';
								echo '<tr><td ><center><font size=4>Qualification&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row4['qual_name'].'</font></center></td></tr>';
								echo '<tr><td ><center><font size=4>Experience at this position&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></center></td><td><center><font size=4>'.$row5['exp_yrs'].'</font></center></td></tr></table>';
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
	</div></body></html>
<?php
	}

?>