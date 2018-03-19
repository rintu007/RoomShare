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

		$vemail = $_POST['email'];
		$vep=$_POST['password'];

		$_SESSION["lemail"] = $_POST['email'];

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
				echo "PWOF page";

				$row=mysqli_fetch_assoc($result);
				if($row['password']==$vep)
				{


				mysqli_close($con);
				header("refresh:1;url=pwofinterface.html");
				}
				else
				{

				 echo  "Wrong password";
				 header("refresh:2;url=home.html");
				}



			}
			else if($pw)
			{
				echo "PWF page";

				$row=mysqli_fetch_assoc($result1);

				if($row['password']==$vep)
				{
				mysqli_close($con);

				header("refresh:1;url=pwfinterface.html");
				}

				else
				{

				 echo  "Wrong password.";
				 header("refresh:2;url=home.html");
				}
			}
		}
		else
		{
			echo "Email-id or password does not exists";
			header("refresh:2;url=home.html");	
		}


?>
