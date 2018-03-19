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
		//$vemail="q@g.c";
		$sql="SELECT * FROM asso WHERE pwof_id=(SELECT pwofid FROM pwof WHERE email='$vemail')";
		$result=mysqli_query($con,$sql);

		if(mysqli_num_rows($result) > 0)
			while($rowid=mysqli_fetch_assoc($result))
			{	
				$vid=$rowid['pwf_id'];
				$sql1="SELECT * from pwf join flat on pwfid='$vid' and fid=pwfflatid";
				$result1=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($result1);

				$rc="SELECT count(*) FROM roommate WHERE rpwfid=$vid";	
	    	    $row1=mysqli_query($con,$rc);
    	    	$row2=mysqli_fetch_assoc($row1);
				
				$roommatecount=$row2['count(*)'];
				$roommatecount=$roommatecount+2;
				$rent=$row['rent']/$roommatecount;
				
			?>
					<form action="rf.php" method="post" target="_blank">
					<div class="card" style="box-shadow: 0 12px 15px 0 rgba(1,1,1,0.8);background-color: #fff; transition: 0.3s; width:50%; align:center; margin: 2% 25% 0% 25%">
					<div class="info">
					<img id="im" src="flatuploads/<?php  if($row['image1'])
											echo $row['image1'];
										 else
										 	echo "default.png";	 ?>">
				<img id="im" src="flatuploads/<?php  if($row['image2'])
											echo $row['image2'];
										 else
										 	echo "default.png";	 ?>"><br>
					Rent:<?php  echo ceil($rent) ?><br>
					Current occupants:<?php  echo $roommatecount-1 ?><br>
					Area:<?php  echo $row['area'] ?><br>
					</div>
					
					<div id="an">
					<button type="submit" name="vmbtn" value=<?php echo $row['pwfid'] ?> style="border: none;background-color: #006600;color: white;padding: 14px 20px;cursor: pointer ;margin:3.5% 2% 20% 5%;" >View More</button>
					</div>
					</div>
					</form>

						<?php echo "<br><br>" ?>
						<?php } 
						else
							{
								echo "<script>alert('No cards to display...');</script>";
							header("refresh:0;url=card.html");
						
							}?>

	<?php mysqli_close($con);

	?>

</body>
</html>
