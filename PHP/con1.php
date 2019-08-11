<?php

$conn = mysqli_connect('127.0.0.1','root','','student');

mysqli_select_db($conn,'admin');
if($conn)
{
	echo " <center>Database Connected: <br/>";
}else{
	echo "Not Connected";
}
?>