
<!DOCTYPE html>
<html>
<head>
<title>
	Page
</title>
	


</head>

<body>

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
		?>

</body>
</html>