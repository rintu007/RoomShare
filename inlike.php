<?php

		session_start();
		$con=mysqli_connect('127.0.0.1','root','1234');
		if(!$con)
		{
			echo 'Connection error';
		}

		if(!mysqli_select_db($con,'pro'))
		{
			echo 'Database not selected';
		}
		$val=$_SESSION['inval'];

		$vem=$_SESSION['lemail'];

				$iv="SELECT * FROM pwof WHERE email='$vem'";
				$ir=mysqli_query($con,$iv);
				while($irow=mysqli_fetch_assoc($ir))
				{
					$irr=$irow['pwofid'];
				}

				$iv2="INSERT INTO asso VALUES ('$irr','$val')";
				$r1=mysqli_query($con,$iv2);
				mysqli_close($con);
				if($r1)
				{
					 header( 'Location: cardd.php' );
				}
				else
				{
					echo 'NOT iNSERTED';
				}

?>