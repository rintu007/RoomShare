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

		$sql="SELECT * FROM pwof WHERE email='$vemail'";

		$result=mysqli_query($con,$sql);
		$r=mysqli_fetch_assoc($result);

			$_SESSION['pepwofid']=$r['pwofid'];
			$_SESSION['pefname']=$r['fname'];
			$_SESSION['pemname']=$r['mname'];
			$_SESSION['pelname']=$r['lname'];
			$_SESSION['pesex']=$r['sex'];
			$_SESSION['peddate']=$r['ddate'];
			$_SESSION['pemonth']=$r['month'];
			$_SESSION['peyear']=$r['year'];
			$_SESSION['pecaste']=$r['caste'];
			$_SESSION['pestate']=$r['state'];
			$_SESSION['pecity']=$r['city'];
			$_SESSION['peoccupation']=$r['occupation'];
			$_SESSION['pearea']=$r['area'];
			$_SESSION['pebudget']=$r['budget'];
			$_SESSION['pestay']=$r['stay'];
			$_SESSION['pesmoking']=$r['smoking'];
			$_SESSION['pedrinking']=$r['drinking'];
			$_SESSION['peparties']=$r['parties'];
			$_SESSION['pevisitors']=$r['visitors'];
			$_SESSION['peeat']=$r['eat'];
			$_SESSION['pefoodarr']=$r['foodarr'];
			$_SESSION['petravel']=$r['travel'];
			$_SESSION['pesleep']=$r['sleep'];
			$_SESSION['pehobbies']=$r['hobbies'];

			echo "SLEEP".$_SESSION['pesmoking'];
			echo "SESSION VARIABLES SAVED";
			header("refresh:0;url=newpwofform.php");
?>