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


		$vemail=$_SESSION['lemail'];
		$roomno=$_SESSION['sessionroomno'];

				if($roomno!=11)
				{
					$s3=$_POST['fname'];
                    $s4=$_POST['mname'];
                    $s5=$_POST['lname'];
                    $s6=$_POST['ge'];
                    $s7=$_POST['Date'];
                    $s8=$_POST['Month'];
                    $s9=$_POST['Year'];
                    $s10=$_POST['caste'];
                    $s11=$_POST['State'];
                    $s12=$_POST['city'];
                    $s13=$_POST['occu'];
                    $s17=$_POST['sm'];
                    $s18=$_POST['dr'];
                    $s19=$_POST['pa'];
                    $s20=$_POST['vi'];
                    $s21=$_POST['eh'];
                    $s22=$_POST['fd'];
                    $s23=$_POST['ta'];
                    $s24=$_POST['sh'];
                    $s25=$_POST['hobbies'];
               	}
               	else
               	{
               		$s1=$_POST["rent"];
                    $s2=$_POST["deposit"];
                    $s3=$_POST['fno'];
                    $s4=$_POST['bname'];
                    $s5=$_POST['sname'];
                    $s6=$_POST['area'];
                    $s7=$_POST['zip'];
                    $s8=$_POST['size'];
                    $s9=$_POST['rooms'];
                    $s10=$_POST['fur'];
                    $s11=$_POST['ac'];
                    $s12=$_POST['eb'];
                    $s13=$_POST['ws'];
                    $s14=$_POST['availability'];
                    $s15=$_POST['vacancy'];      
                    $s16=$_POST['sec'];
                    $s17=$_POST['parking'];


               	}

		if($roomno==0)
		{
			$sql="UPDATE pwf SET fname='$s3',mname='$s4',lname='$s5',sex='$s6',ddate='$s7',month='$s8',year='$s9',caste='$s10',state='$s11',city='$s12',occupation='$s13',smoking='$s17',drinking='$s18',parties='$s19',visitors='$s20',eat='$s21',foodarr='$s22',travel='$s23',sleep='$s24',hobbies='$s25' WHERE email='$vemail'";
		}
		else if($roomno==11)
		{

			$sql="UPDATE flat SET rent='$s1',deposit='$s2',flatnum='$s3',building='$s4',street='$s5',area='$s6',zip='$s7',size='$s8',rooms='$s9',furnish='$s10',ac='$s11',eb='$s12',ws='$s13',availability='$s14',vacancy='$s15',security='$s16',parking='$s17' WHERE fid=(SELECT pwfflatid FROM pwf WHERE email='$vemail')";
		}
		else
		{

			$sql="UPDATE roommate SET fname='$s3',mname='$s4',lname='$s5',sex='$s6',ddate='$s7',month='$s8',year='$s9',caste='$s10',state='$s11',city='$s12',occupation='$s13',smoking='$s17',drinking='$s18',parties='$s19',visitors='$s20',eat='$s21',foodarr='$s22',travel='$s23',sleep='$s24',hobbies='$s25' WHERE rmno='$roomno' AND rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";	
		}


		if(mysqli_query($con,$sql))
		{
			echo 'UPDATED';
			header("refresh:0;url=pwfinterface.html");
		}
		else
		{
			echo 'NOT UPDATED';
		}


				


?>