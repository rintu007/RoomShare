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
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$ipwofid=$row['pwofid'];
		$i="SELECT * FROM asso WHERE pwf_id='$ipwfid'";
		$r=mysqli_query($con,$i);
	
			$i="DELETE FROM asso WHERE pwf_id='$ipwfid' AND pwof_id='$ipwofid'";
			if(mysqli_query($con,$i))
			{
				mysqli_close($con);

				echo "<script>
				alert('Profile DISLIKED');
				window.close();
				</script>";
			}
		
		
		?>