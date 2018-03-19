<?php
	$msg="";
	if(isset($_POST['upload']))
	{
		$target = "pwofuploads/".basename($_FILES["image1"]["name"]);

		$con=mysqli_connect('127.0.0.1','root','123456');
					if(!$con)
					{
						echo 'Connection error';
					}

					if(!mysqli_select_db($con,'project'))
					{
						echo 'Database not selected';
					}

		$image = $_FILES["image1"]["name"];		

		$sql="INSERT INTO pwof (image) VALUES ('$image')";
		$r=mysqli_query($con,$sql);

		if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target)) 
		{
			$msg = "Image uploaded successfully";
			header("refresh:4;url=pwof2.html");
		}
		else
		{
			$msg = "Failed to upload image";
		}
		echo $msg;
	}

?>