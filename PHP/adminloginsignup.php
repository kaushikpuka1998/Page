<?php
include ('con1.php');

if(isset($_POST['registerAdmin']))

	
	{
		$password = md5($_POST['password']);
		$username = $_POST['user'];
		$email = $_POST['email'];
		$q ="INSERT INTO `admin`( `Username`, `Email`, `password`) VALUES  ('$username','$email','$password')";


		
		if (mysqli_query($conn,$q))
		{
		
		echo "Registration Successfull";
		header("refresh:3; url=/page/insert.html");
		}
	die(mysqli_error($conn));
	mysql_close($conn);
}



?>