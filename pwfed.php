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
		$roomno=$_POST['roommatenum'];
		$_SESSION['sessionroomno']=$roomno;
		echo 'ROOMATE NO.'.$roomno;

		$sql="SELECT count(*) FROM roommate where rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";
		$roomquery=mysqli_query($con,$sql);
		$roomrow=mysqli_fetch_assoc($roomquery);
		$roomcount=$roomrow['count(*)'];
		echo "<br>ROOMATE NUMasdasdas=".$roomcount;


		if($roomno==0)
		{
			$sql="SELECT * FROM pwf WHERE email='$vemail'";
			echo "pwf";

			/*$_SESSION['pefpwfid']=$r['pwfid'];*/
		}
		else if($roomno==11)
		{
			echo "flat";
				//----------------------------------------------------------
				$sql="SELECT * FROM flat WHERE fid=(SELECT pwfflatid FROM pwf WHERE email='$vemail')";	
		}
		else
		{			echo "rrr";

			$sql="SELECT * FROM roommate WHERE rmno='$roomno' AND rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";	
		}

		$row=mysqli_query($con,$sql);
		$r=mysqli_fetch_assoc($row);
		if($roomno!=11)
		{
			$_SESSION['peffname']=$r['fname'];
			$_SESSION['pefmname']=$r['mname'];
			$_SESSION['peflname']=$r['lname'];
			$_SESSION['pefsex']=$r['sex'];
			$_SESSION['pefddate']=$r['ddate'];
			$_SESSION['pefmonth']=$r['month'];
			$_SESSION['pefyear']=$r['year'];
			$_SESSION['pefcaste']=$r['caste'];
			$_SESSION['pefstate']=$r['state'];
			$_SESSION['pefcity']=$r['city'];
			$_SESSION['pefoccupation']=$r['occupation'];
			$_SESSION['pefsmoking']=$r['smoking'];
			$_SESSION['pefdrinking']=$r['drinking'];
			$_SESSION['pefparties']=$r['parties'];
			$_SESSION['pefvisitors']=$r['visitors'];
			$_SESSION['pefeat']=$r['eat'];
			$_SESSION['peffoodarr']=$r['foodarr'];
			$_SESSION['peftravel']=$r['travel'];
			$_SESSION['pefsleep']=$r['sleep'];
			$_SESSION['pefhobbies']=$r['hobbies'];
		}

		else
		{

               		$_SESSION['flatrent']=$r["rent"];
                    $_SESSION['flatdeposit']=$r["deposit"];
                    $_SESSION['flatfno']=$r['flatnum'];
                    $_SESSION['flatbname']=$r['building'];
                    $_SESSION['flatsname']=$r['street'];
                    $_SESSION['flatarea']=$r['area'];
                    $_SESSION['flatzip']=$r['zip'];
                    $_SESSION['flatsize']=$r['size'];
                    $_SESSION['flatrooms']=$r['rooms'];
                    $_SESSION['flatfur']=$r['furnish'];
                    $_SESSION['flatac']=$r['ac'];
                    $_SESSION['flateb']=$r['eb'];
                    $_SESSION['flatws']=$r['ws'];
                    $_SESSION['flatavailability']=$r['availability'];
                    $_SESSION['flatvacancy']=$r['vacancy'];      
                    $_SESSION['flatsec']=$r['security'];
                    $_SESSION['flatparking']=$r['parking'];

		}
			echo "SESSIon VARIABLES SAVED";
		
		if($roomno > $roomcount && $roomno!=11)
		{
			echo "INSIDE IF";
			echo "<script>alert('You dont have that roomate!!');</script>";
		
			header("refresh:0;url=selectrm.html");
		}
		else

			header("refresh:3;url=newpwfform.php");
			
?>