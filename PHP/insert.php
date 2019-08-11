<?php
include ('con2.php');



if(isset($_POST['submit']))

	
	{
		$target = "Images/".$_FILES['upload']['name'];
		$q ="INSERT INTO `data`( `name`, `fname`, `roll`, `result`,`picture`) VALUES  ('$_POST[name]','$_POST[fname]','$_POST[roll]','$_POST[result]','$target')";


		move_uploaded_file($_FILES['upload']['name'], $target);
		if (mysqli_query($conn,$q) && move_uploaded_file($_FILES['upload']['tmp_name'], $target) )
		{
		
		echo "Data Added Successfully";
		header("refresh:3; url=/page/insert.html");
		}
	die(mysqli_error($conn));
	mysql_close($conn);
}
else if(isset($_POST['search']))
{
	
	
	$roll = $_POST['roll'];
	$querry = "SELECT * FROM `data` WHERE `roll`='$roll' ";
	$querry_run = mysqli_query($conn,$querry);

	if($row = mysqli_fetch_array($querry_run))
	{

		?>
		<style type="text/css">
		body{
		background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0.5)),url(1871_Tramonto.jpg);
		background-size: cover;
		background-position: center;
		}
		ul li a{
		color: blue;
		}
		td{
		color: yellow;
		}
		</style>
		
		<form action="insert.php" method="POST"><center>
		
			<table border="1" width="400" height="300">
			<tr>
				<td colspan="5" align="center" bgcolor="grey">Student's Informations</td>
			</tr>

			<tr>
				<td rowspan="6"><img  src="<?php echo $row['picture'] ?>" width="200" height="200">	</td>

			</tr>
			<tr>
				<td align="right">Name:</td><td align="center"><input type="text" name="name" disabled="disabled" value="<?php echo $row['name'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Father's Name:</td><td align="center"><input type="text" name="fname" disabled="disabled" value="<?php echo $row['fname'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Roll Number:</td><td align="center"><input type="text" name="roll"  disabled="disabled" value="<?php echo $row['roll'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Result:</td><td align="center"><input type="text" name="result"  disabled="disabled" value="<?php echo $row['result'] ?>"></td>
			</tr>
			
			</table>	
		
		</form>	</center>

			
		<?php
	}
	else
	{
		echo "The Data You Have Entered That is not Found";
		header("refresh:3; url=/page/search.html");
	}
}
else if(isset($_POST['usearch']))
{
	$roll = $_POST['roll'];
	

	$querry = "SELECT * FROM `data` WHERE `roll`='$roll' ";
	$querry_run = mysqli_query($conn,$querry);

	if($row = mysqli_fetch_array($querry_run))
	{
		?>
		<style type="text/css">
		body{
		background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0.5)),url(1871_Tramonto.jpg);
		background-size: cover;
		background-position: center;
		}
		ul li a{
		color: blue;
		}
		td{
		color: yellow;
		}
		</style>
		<form action="insert.php" method="POST"><center>
		
			<table border="1" width="400" height="300">
			<tr>
				<td colspan="5" align="center" bgcolor="grey">Student's Informations</td>
			</tr>

			<tr>
				<td rowspan="6"><img  src="<?php echo $row['picture'] ?>" width="200" height="200" >	</td>

			</tr>
			<tr>
				<td align="right">Name:</td><td align="center"><input type="text" name="name"  value="<?php echo $row['name'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Father's Name:</td><td align="center"><input type="text" name="fname"  value="<?php echo $row['fname'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Roll Number:</td><td  align="center"><input type="text"  name="roll" readonly="readonly" value="<?php echo $row['roll'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Result:</td><td align="center"><input type="text" name="result"   value="<?php echo $row['result'] ?>"></td>

			</tr>	
				
			<tr>
				<td colspan="5" align="center" bgcolor="yellow"><input type="submit" name="supdate" value="Update"></td>
			</tr>

			
			</table>	
		
		</form>	</center>
		<?php
	}
	else
	{
		echo "The Data You Have Entered That is not Found";
		header("refresh:3; url=/page/update.html");
	}
}


else if(isset($_POST['dsearch']))
{
	$roll = $_POST['roll'];
	

	$querry = "SELECT * FROM `data` WHERE `roll`='$roll' ";
	$querry_run = mysqli_query($conn,$querry);

	if($row = mysqli_fetch_array($querry_run))
	{
		?>
		<style type="text/css">
		body{
		background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0.5)),url(1871_Tramonto.jpg);
		background-size: cover;
		background-position: center;
		}
		ul li a{
		color: blue;
		}
		td{
		color: yellow;
		}
		</style>
		<form action="insert.php" method="POST"><center>

			<table border="1" width="400" height="300">
			<tr>
				<td colspan="5" align="center" bgcolor="grey">Student's Informations</td>
			</tr>

			<tr>
				<td rowspan="5"><img  src="<?php echo $row['picture'] ?>" width="200" height="200">	</td>
			</tr>
			<tr>
				<td align="right">Name:</td><td align="center"><input type="text" name="name" readonly="readonly" value="<?php echo $row['name'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Father's Name:</td><td align="center"><input type="text" name="fname" readonly="readonly"  value="<?php echo $row['fname'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Roll Number:</td><td align="center"><input type="text" name="roll"  readonly="readonly" value="<?php echo $row['roll'] ?>"></td>
			</tr>
			<tr>
				<td align="right">Result:</td><td align="center"><input type="text" name="result"  readonly="readonly" value="<?php echo $row['result'] ?>"></td>
			</tr>

			<tr>
				<td colspan="5" align="center" bgcolor="red"><input type="submit" name="sdelete" value="Delete"></td>
			</tr>	
			
			
			</table>	
		
		</form>	</center>
		<?php
	}
	else
	{
		echo "The Data You Have Entered That is not Found";
		header("refresh:3; url=/page/search.html");
	}
}


else if(isset($_POST['supdate']))
{
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$result = $_POST['result'];
	$roll = $_POST['roll'];
	
	

	$querry ="UPDATE `data` SET `name`='$name',`fname`='$fname',`result`='$result' WHERE  `roll`='$roll' "; 
	
	if (mysqli_query($conn,$querry)) 
	{
		echo "Data Updated Successfully";
		header("refresh:10; url=/page/update.html");
	}else{
		echo "Data Not Updated";
	}



}
else if(isset($_POST['sdelete']))

{
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$result = $_POST['result'];
	$roll = $_POST['roll'];

	$querry ="DELETE FROM `data` WHERE `roll`='$roll' "; 

	if (mysqli_query($conn,$querry)) 
	{
		echo "Data Deleted Successfully";
		header("refresh:3; url=/page/delete.html");
	}else{
		echo "Data Not Deleted";
	}

}



?>