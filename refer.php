<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="cardd.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="edpwof.css">
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
		$vemail=$_POST['mail'];
		$sql="SELECT * FROM asso WHERE pwof_id=(SELECT pwofid FROM pwof WHERE email='$vemail')";
		$result=mysqli_query($con,$sql);

		echo mysqli_num_rows($result);
		if(mysqli_num_rows($result) > 0)
			while($rowid=mysqli_fetch_assoc($result))
			{	
				$vid=$rowid['pwf_id'];


					$rc="SELECT count(*) FROM roommate WHERE rpwfid='$vid'";	
	    	        $row1=mysqli_query($con,$rc);
    	    	    $row2=mysqli_fetch_assoc($row1);
				
					$roommatecount=$row2['count(*)'];
					$roommatecount=$roommatecount+2;



					$displaybud="SELECT * from flat where fid=(SELECT pwfflatid FROM pwf where pwfid='$vid')";
					$resultref=mysqli_query($con,$displaybud);
					$rentrow=mysqli_fetch_assoc($resultref);
					$rentdisp=$rentrow['rent'];
					$a=$rentrow['area'];


				$sql1="SELECT * FROM pwf where pwfid='$vid'";
				$result1=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($result1);
				
			?>
					<form action="rf.php" method="post" target="_blank">
					<div class="card" style="box-shadow: 0 12px 15px 0 rgba(1,1,1,0.8);background-color: #fff; transition: 0.3s; width:50%; margin: 2% 25% 0% 25%;">
					<div class="info">
					<img id="im" src="pwfuploads/<?php  if($row['image'])
											echo $row['image'];
										 else
										 	echo "default.png";	 ?>" style="width:200px;height:200px"><br><br><br>
					Rent:<?php  echo round($rentdisp/$roommatecount); ?><br>
					Current occupants:<?php  echo $roommatecount-1; ?><br>
					Area:<?php  echo $a?><br>
					
					</div>
					<br>
					<div id="an">
					<button type="submit" name="vmbtn" value=<?php echo $row['pwfid'] ?> style="border: none;background-color: #006600;color: white;padding: 14px 20px;cursor: pointer ;margin:3.5% 2% 10% 5%;" >View More</button>
					</div>
					</div>
					</form>



						<?php 

						}
						else  {
						 	echo "<script>alert('Invalid ID Or no profiles are liked by the Id');</script>";
						 	header("refresh:0;url=refer.html");
						 } ?>

	<?php mysqli_close($con);

	?>
</body>
</html>


