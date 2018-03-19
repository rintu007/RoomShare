<?php


        session_start();
        $vemail=$_SESSION['lemail'];

        $con=mysqli_connect('127.0.0.1','root','123456');
	
			if(!$con)
			{
				echo 'Connection error';
			}
	
			if(!mysqli_select_db($con,'project'))
			{
				echo 'Database not selected';
			}

			$rating=$_POST['rating'];
			$comments=$_POST['comments'];
	
		$sql="SELECT * FROM pwof WHERE email='$vemail'";
		$sql1="SELECT * FROM pwf WHERE email='$vemail'";
		$result=mysqli_query($con,$sql);
		$result1=mysqli_query($con,$sql1);

		$pwo=mysqli_num_rows($result);
		$pw=mysqli_num_rows($result1);


		
		if($pwo || $pw)
		{
			if($pwo)
			{
				$sql="SELECT * FROM pwof WHERE email='$vemail'";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row['pwofid'];

				echo $id;
				echo $rating;
				echo $comments;
				
				$sql="INSERT INTO feedback VALUES(NULL,'$id','$rating','$comments')";
				if(mysqli_query($con,$sql))
				{
					mysqli_close($con);
					header("refresh:1;url=pwofinterface.html");
				}
				else
					echo "NULL";
			}
			else if($pw)
			{
				$sql="SELECT * FROM pwf WHERE email='$vemail'";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row['pwfid'];
				
				$sql="INSERT INTO feedback VALUES('$id',NULL,'$rating','$comments')";
				if(mysqli_query($con,$sql))
				{
					mysqli_close($con);
					header("refresh:0.5;url=pwfinterface.html");
				}
			}
		}
?>