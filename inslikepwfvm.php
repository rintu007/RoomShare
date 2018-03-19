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
	$r=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($r);
	$ipwfid=$row['pwfid'];

		$sql="SELECT vacancy FROM flat WHERE fid=(SELECT pwfflatid FROM pwf WHERE pwfid='$ipwfid')";
		$sqlquery=mysqli_query($con,$sql);
		$vacancyrow=mysqli_fetch_assoc($sqlquery);
		$vacancycount=$vacancyrow['vacancy'];
		if($vacancycount==0)
		{
			echo "<script>
				alert('NO vacancies remaining');
				window.close();
				</script>";
		}
			$i="INSERT INTO asso2 VALUES('$ipwofid','$ipwfid')";
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