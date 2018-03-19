<?php

	session_start();
	$vemail=$_SESSION['lemail'];

	$sql="SELECT * FROM pwof WHERE email='$vemail'";
		$sql1="SELECT * FROM pwf WHERE email='$vemail'";
		$result=mysqli_query($con,$sql);
		$result1=mysqli_query($con,$sql1);

		$pwo=mysqli_num_rows($result);
		$pw=mysqli_num_rows($result1);


		mysqli_close($con);
		
			if($pwo)
			{
				echo "PWOF page";
				header("refresh:1;url=pwofedit.php");
			}
			else if($pw)
			{
				echo "PWF page";
				header("refresh:0.5;url=selectrm.php");
			}

?>