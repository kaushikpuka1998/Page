<?php
include ('con1.php');
if(isset($_POST['loginAdmin']))

{

	$l=$_POST['luser'];
	$p =$_POST['lemail'];
	$y=md5($_POST['lpassword']);

	$q ="SELECT * FROM `admin` WHERE `Username`= '$l' AND `Email`='$p'  AND `password`='$y'";

	$result = mysqli_query($conn,$q);

	$num = mysqli_num_rows($result );
	if($num == 1)
	{
		
		echo "Welcome,", $l  ;
		header("refresh:3; url=/page/insert.html");
	}
	else
	{
		echo "Login Not Succeed";
	}
	die(mysqli_error($conn));
	mysql_close($conn);
}


?>