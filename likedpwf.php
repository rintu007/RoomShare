<!DOCTYPE html>
<html>
<head>
<title>
	Page
</title>
	<link rel="stylesheet" type="text/css" href="cardd.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="edpwof.css">
  <style type="text/css">
    body
    {
      background-size: cover;
    }
   </style> 

</head>

<body background="pwfb.jpg">
<header style="padding: 4px 0;opacity:0.7;"><center><h1>ROOM SHARE</h1></center></header>

	<div class="topnav" id="myTopnav">
  <a href="likepwf.php">Home</a>
  <a href="likedpwf.php">Liked</a>
  <a href="selectrm.html">Edit</a>
  <a href="logout.php" style="float: right;">Logout</a>
</div>

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

		//$vemail="z@g.c";
		$sql="SELECT * FROM asso2 WHERE pwf_id=(SELECT pwfid FROM pwf WHERE email='$vemail')";
		$result=mysqli_query($con,$sql);

		if(mysqli_num_rows($result) > 0)
			while($rowid=mysqli_fetch_assoc($result))
			{	
				$vid=$rowid['pwof_id'];
				$sql1="SELECT * FROM pwof WHERE pwofid='$vid'";
				$result1=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($result1);
				
			?>
					<form action="likepwfvm.php" method="post">
					<div class="card" style="box-shadow: 0 12px 15px 0 rgba(1,1,1,0.8);background-color: #fff; transition: 0.3s; width:50%; align:center; margin: 2% 25% 0% 25%">
					<div class="info">
					<img id="im" src="pwofuploads/<?php  if($row['image'])
															echo $row['image'];
										 				 else
										 					echo "default.png";	 ?>"><br>
					Name :<?php  echo $row['fname'] ?><br>
					Sex :<?php echo $row['sex'] ?><br>
					Contact :<?php  echo $row['contact'] ?>

					</div>
					
					<div id="an">
					<button type="submit" name="vmbtn" value=<?php echo $row['pwofid'] ?> style="border: none;background-color: #006600;color: white;padding: 14px 20px;cursor: pointer ;margin:3.5% 2% 20% 5%;" >View More</button>
					</div>
					</div>
					</form>

						<?php echo "<br><br><br>" ?>
						<?php } ?>

	<?php mysqli_close($con);

	?>

</body>
</html>
