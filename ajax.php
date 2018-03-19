<?php 

	if(isset($_POST['done'])){
		$first=mysqli_escape_string($_POST['firstd']);
		$second=mysqli_escape_string($_POST['secondd']);
		
		$iv2="INSERT INTO asso VALUES ('$first','$second')";
		$r1=mysqli_query($con,$iv2);
		exit();		
	}
?>