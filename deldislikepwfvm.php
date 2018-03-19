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

	$ipwofid=$_SESSION['invid'];
	$ipwfemail=$_SESSION['lemail'];

	$sql="SELECT pwfid FROM pwf WHERE email='$ipwfemail'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$ipwfid=$row['pwfid'];
	
			$i="DELETE FROM asso2 WHERE pwof_id='$ipwofid' AND pwf_id='$ipwfid'";
			if(mysqli_query($con,$i))
			{
				mysqli_close($con);

				echo "<script>
				alert('Profile DISLIKED');
				window.close();
				</script>";
			}
		
		?>