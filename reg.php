<html>
<body>
<?php
	
	$con=mysqli_connect("localhost","root","","kms") or die('Error in connection !! idiot ');
		
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];	
	$empid=$_POST['eid'];
	$titles=$_POST['title'];
	$boffice=$_POST['branchoffice'];
	$email=$_POST['offemail'];
	$ph=$_POST['offph'];
	
	if (empty($firstname)  )
	{
		echo 'Firstname field is missing .</br>';	
	
	}
	else if(empty($lastname) )
	{
		echo 'Lastname field is missing  .</br>';
	}
	else if(empty($empid))
	{
		echo 'Employee ID field is missing  .</br>';
	} 
	else if(empty($email) )
	{
		echo 'Email field is missing  .</br>';
	}
	else if(empty($ph))
	{
		echo 'Phone field is missing  .</br>';
	}
	else if($titles == -1)
	{		
		echo 'Title field is missing  .</br>';
	}
	else if($boffice == -1)
	{		
		echo 'Branch field is missing  .</br>';
	}
	
	else
	{	
	$result = mysqli_query($con,"SELECT * FROM users");	//recieves number of rows present in the users table
	$num_rows = mysqli_num_rows($result);
	$usrname=$empid;	
	$passwd=$num_rows.$firstname.$num_rows;
	
	$query= "INSERT INTO users (user_id, firstname, lastname, branch, title, email, phone, reg_date, user_name, password) VALUES ($num_rows + 1,'$firstname','$lastname','$boffice','$titles','$email','$ph',NOW(),'$usrname','$passwd') ";
	$res=mysqli_query($con,$query) or die('Error in connection !!  '.mysqli_error($con));
	header('Location: http://localhost/xampp/KMS/reg2.php');
	
	
	}
	
	mysqli_close($con);
?>
</body>
</html>