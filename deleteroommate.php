<?php

	$con=mysqli_connect('127.0.0.1','root','123456');
		if(!$con)
		{
			echo 'Connection error';
		}

		if(!mysqli_select_db($con,'project'))
		{
			echo 'Database not selected';
		}
		session_start();
		
		$vemail=$_SESSION['lemail'];
		$roomno=$_POST['delroommatenum'];
		$_SESSION['sessionroomno']=$roomno;
		echo 'ROOMATE NO.'.$roomno;

		$sql="SELECT count(*) FROM roommate where rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";
		$roomquery=mysqli_query($con,$sql);
		$roomrow=mysqli_fetch_assoc($roomquery);
		$roomcount=$roomrow['count(*)'];


		if($roomno > $roomcount)
		{
			echo "INSIDE IF";
			echo "<script>alert('You dont have that roomate!!');</script>";
		
			header("refresh:0;url=selectrm.html");
		}
		else
		{
				$sql="DELETE FROM roommate WHERE rmno='$roomno' AND rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";	
				if(mysqli_query($con,$sql))
				{

					for($i=$roomno;$i<=$roomcount;$i++)
					{
						$j=$i-1;
						$sql="UPDATE roommate SET rmno='$j' WHERE rmno='$i' AND rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";
						$row=mysqli_query($con,$sql);
						//echo "updated rmno".$i."to".$j."<br>";
					}
					echo "<script>alert('Roommate deleted');</script>";
					header("refresh:0;url=selectrm.html");

				}			
		}
?>