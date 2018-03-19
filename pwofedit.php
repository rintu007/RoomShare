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
                    $s14=$_POST['area'];
                 //   $s15=$_POST['budget'];      
                   // $s16=$_POST['stay'];
                    $s17=$_POST['sm'];
                    $s18=$_POST['dr'];
                    $s19=$_POST['pa'];
                    $s20=$_POST['vi'];
                    $s21=$_POST['eh'];
                    $s22=$_POST['fd'];
                    $s23=$_POST['ta'];
                    $s24=$_POST['sh'];
                    $s25=$_POST['hobbies'];

		$vemail=$_SESSION['lemail'];
		echo $s3."<br>";
		echo $s4."<br>";
		echo $s5."<br>";
		echo $s6."<br>";
		echo $s7."<br>";
		echo $s8."<br>";
		echo $s9."<br>";
		echo $s10."<br>";
		echo $s11."<br>";
		echo $s12."<br>";
		echo $s13."<br>";
		echo $s14."<br>";
		echo $s17."<br>";
		echo $s18."<br>";
		echo $s19."<br>";
		echo $s20."<br>";
		echo $s21."<br>";
		echo $s22."<br>";
		echo $s23."<br>";
		echo $s24."<br>";
		echo $s25."<br>";
		
		//$sql="UPDATE pwof SET fname='$s3',mname='$s4',lname='$s5',sex='$s6',ddate='$s7' WHERE email='$vemail'";


		$sql="UPDATE pwof SET fname='$s3',mname='$s4',lname='$s5',sex='$s6',ddate='$s7',month='$s8',year='$s9',caste='$s10',state='$s11',city='$s12',occupation='$s13',area='$s14',smoking='$s17',drinking='$s18',parties='$s19',visitors='$s20',eat='$s21',foodarr='$s22',travel='$s23',sleep='$s24',hobbies='$s25' WHERE email='$vemail'";


		if(mysqli_query($con,$sql))
		{
			echo 'UPDATED';
			//header("refresh:1;url=pwofinterface.html");
		}
		else
		{
			echo 'NOT UPDATED';
		}

		header("refresh:0;url=pwofinterface.html");

				


?>