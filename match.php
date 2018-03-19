<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="edpwof.css">
	<link rel="stylesheet" type="text/css" href="cardd.css">
</head>
<body background="pwofb.jpg">
	<header style="padding: 4px 0;opacity:0.7;"><center><h1>ROOM SHARE</h1></center></header>
	<div class="topnav" id="myTopnav">
  <a href="card.html">Home</a>
  <a href="likepwof.php">Liked</a>
  <a href="refer.html">Referals</a>
  <a href="pwofed.php">Edit</a>
  <a href="match.php">Matched Profiles</a>
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

		$sql="SELECT * from pwf join asso2 on pwof_id=(SELECT pwofid from pwof WHERE email='$vemail') AND pwfid=pwf_id";
		$result=mysqli_query($con,$sql);
		$flag=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$flag=1;
			$cardid=$row['pwfid'];
		$rc="SELECT count(*) FROM roommate WHERE rpwfid=$cardid";
		$ren="SELECT * FROM flat WHERE fid=(SELECT pwfflatid from pwf WHERE pwfid='$cardid')";
		$room=mysqli_query($con,$rc);
		$roomrow=mysqli_fetch_assoc($room);
		$roomcount=$roomrow['count(*)'];

		$renn=mysqli_query($con,$ren);
		$rentrow=mysqli_fetch_assoc($renn);
		$rent=$rentrow['rent'];
		$roomcount=$roomcount+2;
			?>
					<form action="matchvm.php" method="post">
					<div class="card" style="box-shadow: 0 12px 15px 0 rgba(1,1,1,0.8);background-color: #fff; transition: 0.3s; width:50%; margin: 0 25% 0% 25%;">
    				
			<div class="info">
				<img id="im" src="flatuploads/<?php  if($rentrow['image1'])
											echo $rentrow['image1'];
										 else
										 	echo "default.png";	 ?>">
				<img id="im" src="flatuploads/<?php  if($rentrow['image2'])
											echo $rentrow['image2'];
										 else
										 	echo "default.png";	 ?>"><br>

				Rent:<?php  echo ceil($rent/$roomcount) ?><br>
				Current occupants:<?php  echo $roomcount-1 ?><br>
				Area: <?php  echo $rentrow['area'] ?><br>
				Contact number:<?php echo $row['contact'] ?>
				</div>
				<div id="an">
				<button type="submit" name="vmbtn" value=<?php echo $row['pwfid'] ?>  style="border: none;background-color: #006600;color: white;padding: 14px 20px;cursor: pointer ;margin:3.5% 2% 20% 5%;" >View More
				</div>
			
			<br>
		</div>
		</form>
			<?php
		}

		if($flag==0)
		{
			echo "<script>alert('No cards to display..');</script>";
				header("refresh:0;url=card.html");
				
		}
		
?>

</body>
</html>