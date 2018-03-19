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

	$ipwfid=$_SESSION['invid'];
	$ipwofemail=$_SESSION['lemail'];
	$sql="SELECT pwofid FROM pwof WHERE email='$ipwofemail'";
	$r=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($r);
	$ipwofid=$row['pwofid'];

			$i="INSERT INTO asso VALUES('$ipwfid','$ipwofid')";
			if(mysqli_query($con,$i))
			{
				mysqli_close($con);
				echo "2";
				echo "<script>
				alert('Profile LIKED');
				window.close();
				</script>";
			}	
?>