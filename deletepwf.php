<?php 
session_start();
$con=mysqli_connect('127.0.0.1','root','123456');
		if(!$con)
		{
			echo 'Connection error';
		}

		if(!mysqli_select_db($con,'project'))
		{
			echo 'Database not selected';
		}


	$demail=$_SESSION['lemail'];

	$sql="DELETE FROM pwf WHERE email='$demail'";

	$result=mysqli_query($con,$sql);

	if($result)
	{
		header("refresh:0;url=logout.php");
	}
	else
	{
		echo 'could not delete';
	}
?>