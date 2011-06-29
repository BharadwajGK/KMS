<html>
<head><title>Manager: Search Profile</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" > 
<body>
<div class="header">
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <font size=15pt>KMS</font>
	</div>

	<div class="left">
		
	</div>

	<div class="center">
		
		<div class="subdiv">
			<font size=4px color=White><a href="MyProfile.php">Search Profile</a> &nbsp &nbsp &nbsp  |&nbsp &nbsp |<a href="EditProfile.php">Edit Profile</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp <a href="ChangePasswd.php">Change Password </a>&nbsp|&nbsp <a href="logout.php">Logout</a></font>
			<div class="LoginPanel" ><p class="para">
				
						<center>
							
							<?php

								session_start();	
								$logins =$_SESSION['login']; 
								$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
								$query1="select * from users where user_name='$logins'";
								$res1=mysqli_query($con,$query1) or die("Error: ".mysqli_error($con));
								$row1=mysqli_fetch_array($res1);
								$mgrtitle=$_POST['title'];
								$mgrbranch=$_POST['branch'];
								$search=$_POST['Search'];
								echo $row1['firstname'].' '.$row1['lastname'].'</br>';
								echo 'Phone: '.$row1['phone'].'</br>';
								echo 'Email: '.$row1['email'].'</br>'.'</br>'.'</br>';
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
								echo '</form>';
								if(isset($search))
								{
									if(($mgrtitle != -1) && ($mgrbranch == -1))
									{
										$query="Select user_name,firstname, lastname, email, phone, qual_name,branch,xp from users where title='$mgrtitle'  order by firstname ASC ";
										$res=mysqli_query($con, $query) or die("Error2: ".mysqli_error($con));
										echo '</br></br><p><div style="overflow:auto; width:700; height:200; "><table  cellpadding=10 width="500" height="50"> ';
										if(mysqli_num_rows($res) == 0)
										{
											echo '</br></br></br><font size=4 color=red>*No results found*</font>';
										}
										else
										{
											echo '<tr class="one" bgcolor=#E6A9EC><th>FirstName</th><th>LastName</th><th>Employee ID</th><th>Email</th><th>Contact</th><th>Type</th><th>Branch</th><th>Qualification</th><th>Experience</th></tr>';
											while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
											{
												

												$query4="Select qual_name,exp_yrs,title,branch from qual,exp,title,branch where qual_id='".$row['qual_name']."'"." AND exp_id='".$row['xp']."'"." AND title_id='$mgrtitle'"." AND branch_id='".$row['branch']."'" ;
												$res4=mysqli_query($con,$query4) or die("Error: ".mysqli_error($con));
												$row4=mysqli_fetch_array($res4);
												
												
												echo '<tr class="two" bgcolor=#ADDFFF><th>'.$row['firstname'].'</th><th>'.$row['lastname'].'</th><th>'.$row['user_name'].'</th><th>'.$row['email'].'</th><th>'.$row['phone'].'</th><th>'.$row4['title'].'</th><th>'.$row4['branch'].'</th><th>'.$row4['qual_name'].'</th><th>'.$row4['exp_yrs'].'</th></tr>';
					
											}
											$num=mysqli_num_rows($res);	
											echo '<hr/>'.'* '.$num.' results found * <hr>' ;
						
										}					
									}
									if(($mgrbranch != -1) && ($mgrtitle == -1))
									{
										$query="Select user_name,firstname, lastname, email, phone, qual_name,xp,title,branch from users where branch='$mgrbranch'  order by firstname ASC ";
										$res=mysqli_query($con, $query) or die("Error2: ".mysqli_error($con));
										echo '</br></br><div style="overflow:auto;width:700;height:200"><table  cellpadding=10 width="500" height="50"> ';
										if(mysqli_num_rows($res) == 0)
										{
											echo '</br></br></br><font size=4 color=red>*No results found*</font>';
										}
										else	
										{
											/*echo '<tr class="one" bgcolor=#E6A9EC><th>FirstName</th><th>LastName</th><th>Employee ID</th><th>Email</th><th>Contact</th><th>Qualification</th><th>Experience</th></tr>';
											while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
											{
				
												echo '<tr class="two" bgcolor=#ADDFFF><th>'.$row['firstname'].'</th><th>'.$row['lastname'].'</th><th>'.$row['user_name'].'</th><th>'.$row['email'].'</th><th>'.$row['phone'].'</th><th>'.$row['qual_name'].'</th><th>'.$row['xp'].'</th></tr>';
				
											}*/
											
											echo '<tr class="one" bgcolor=#E6A9EC><th>FirstName</th><th>LastName</th><th>Employee ID</th><th>Email</th><th>Contact</th><th>Type</th><th>Branch</th><th>Qualification</th><th>Experience</th></tr>';
											while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
											{
												

												$query4="Select qual_name,exp_yrs,title,branch from qual,exp,title,branch where qual_id='".$row['qual_name']."'"." AND exp_id='".$row['xp']."'"." AND title_id='".$row['title']."'"." AND branch_id='".$row['branch']."'";
												$res4=mysqli_query($con,$query4) or die("Error: ".mysqli_error($con));
												$row4=mysqli_fetch_array($res4);

												
												echo '<tr class="two" bgcolor=#ADDFFF><th>'.$row['firstname'].'</th><th>'.$row['lastname'].'</th><th>'.$row['user_name'].'</th><th>'.$row['email'].'</th><th>'.$row['phone'].'</th><th>'.$row4['title'].'</th><th>'.$row4['branch'].'</th><th>'.$row4['qual_name'].'</th><th>'.$row4['exp_yrs'].'</th></tr>';
					
											}
											$num=mysqli_num_rows($res);	
											echo '<hr/>'.'* '.$num.' results found * <hr>' ;
										}
									} 
									if(($mgrtitle != -1) && ($mgrbranch != -1))
									{
										$query="Select user_name,firstname, lastname, email, phone, qual_name,branch,title,xp from users where title='$mgrtitle' AND branch='$mgrbranch'  order by firstname ASC ";
										$res=mysqli_query($con, $query) or die("Error2: ".mysqli_error($con));
										echo '</br></br><div style="overflow:auto;width:700;height:200"><table  cellpadding=10 width="500" height="50"> ';
										if(mysqli_num_rows($res) == 0)
										{
											echo '</br></br></br><font size=4 color=red>*No results found*</font>';
										}
										else
										{
											/*echo '<tr class="one" bgcolor=#E6A9EC><th>FirstName</th><th>LastName</th><th>Employee ID</th><th>Email</th><th>Contact</th><th>Qualification</th><th>Experience</th></tr>';
											while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
											{
				
												echo '<tr class="two" bgcolor=#ADDFFF><th>'.$row['firstname'].'</th><th>'.$row['lastname'].'</th><th>'.$row['user_name'].'</th><th>'.$row['email'].'</th><th>'.$row['phone'].'</th><th>'.$row['qual_name'].'</th><th>'.$row['xp'].'</th></tr>';
						
											}*/


											echo '<tr class="one" bgcolor=#E6A9EC><th>FirstName</th><th>LastName</th><th>Employee ID</th><th>Email</th><th>Contact</th><th>Type</th><th>Branch</th><th>Qualification</th><th>Experience</th></tr>';
											while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
											{
												

												$query4="Select qual_name,exp_yrs,title,branch from qual,exp,title,branch where qual_id='".$row['qual_name']."'"." AND exp_id='".$row['xp']."'"." AND title_id='".$row['title']."'"." AND branch_id='".$row['branch']."'";
												$res4=mysqli_query($con,$query4) or die("Error: ".mysqli_error($con));
												$row4=mysqli_fetch_array($res4);

												
												echo '<tr class="two" bgcolor=#ADDFFF><th>'.$row['firstname'].'</th><th>'.$row['lastname'].'</th><th>'.$row['user_name'].'</th><th>'.$row['email'].'</th><th>'.$row['phone'].'</th><th>'.$row4['title'].'</th><th>'.$row4['branch'].'</th><th>'.$row4['qual_name'].'</th><th>'.$row4['exp_yrs'].'</th></tr>';
					
											}
											$num=mysqli_num_rows($res);	
											echo '<hr/>'.'* '.$num.' results found * <hr>' ;
										}			
									}
									else
									{
										echo ' ';
									}
								}
								echo '</table></div></p>';
								
							?>	
	
						</center>
						
					
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