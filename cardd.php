<!DOCTYPE html>
<html>
<head>
<title>
	Page
</title>
	<link rel="stylesheet" type="text/css" href="cardd.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="edpwof.css">

	<style>

	.ind
	{
		position: fixed;
		/*top:245px;*/
		bottom: 25px;
		right:20px;
		background-color: white;
		width:300px;
		box-shadow: 4px 4px 5px;
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

<div class="ind">
<center><h3>Index</h3>


<div style="background-color: #E8A726;">Critical percentage</div>

<div style="background-color: #1A97C4;;">Non-Critical percentage</div>
</center>	
</div>
	<?php
		$flag=0;
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
		//$val=50;
		$vemail=$_SESSION['lemail'];
		$sql="SELECT * FROM pwf";
		$result=mysqli_query($con,$sql);
		$result1=mysqli_query($con,$sql);

		$arr_fn=array("smoking","drinking","travel","occupation","eat","foodarr","sleep","parties","caste","visitors");
		$arr_dr=array($_POST['dsmoking'],$_POST['ddrinking'],$_POST['dtravel'],$_POST['doccu'],$_POST['deat'],$_POST['deata'],$_POST['dsleeph'],$_POST['dparty'],$_POST['dcaste'],$_POST['dvisit']);

		$gender=$_POST['dsex'];
		$area=$_POST['darea'];

		$j=0;
		$num=0;
		$arp=array(array());
		
		if(mysqli_num_rows($result) > 0)
			while($row=mysqli_fetch_assoc($result))
				{
					$ctotal=0;
					$nctotal=0;
					$mctotal=0;
					$mnctotal=0;
					$rop=$row['pwfid'];
					$arp[$j][0]=$row['pwfid'];
						
					$rm="SELECT * FROM roommate WHERE rpwfid='$rop'";
					$rq=mysqli_query($con,$rm);
					for($i=0;$i<10;$i++)
					{
						if(isset($_POST[$arr_fn[$i]]))
						{
							$ctotal++;
							if($arr_dr[$i]==$row[$arr_fn[$i]])
								$mctotal++;							
						}
						else
						{
							$nctotal++;
							if($arr_dr[$i]==$row[$arr_fn[$i]])
								$mnctotal++;
						}
					}

					while($row1=mysqli_fetch_assoc($rq))
					{
						for($i=0;$i<10;$i++)
						{
							if(isset($_POST[$arr_fn[$i]]))
							{
								$ctotal++;
								if($arr_dr[$i]==$row1[$arr_fn[$i]])
									$mctotal++;							
							}
							else
							{
								$nctotal++;
								if($arr_dr[$i]==$row1[$arr_fn[$i]])
									$mnctotal++;
							}
						}
					}	
					if($ctotal==0)
					{
						$cper=0;
					}
					else
					{
						$val1=$mctotal/$ctotal;
						$cper=$val1*100;
					}
						
						$val1=$mnctotal/$nctotal;
						$ncper=$val1*100;
						
						$arp[$j][1]=$cper;
						$arp[$j][2]=$ncper;

						$j=$j+1;
						$num=$num+1;

						
//						echo $row['pwfid'];

					/*	echo $ctotal . "<br>";
						echo $nctotal."<br>";
						echo $mctotal."<br>";
						echo $mnctotal."<br><br><br>";
						echo "Percentage <br>";
						echo $val."<br>";*/
					//$val=1;
				
				}

					$arp[$j][0]=-1;
					$arp[$j][1]=-1;
					$arp[$j][2]=-1;



					for($i=0;$i<$num;$i++)
					{
						for($j=0;$j<$num-1;$j++)
						{
							if($arp[$j][1] < $arp[$j+1][1])
							{
								$temp0=$arp[$j][0];
								$temp1=$arp[$j][1];
								$temp2=$arp[$j][2];
								
								$arp[$j][0]=$arp[$j+1][0];
								$arp[$j][1]=$arp[$j+1][1];
								$arp[$j][2]=$arp[$j+1][2];

								$arp[$j+1][0]=$temp0;
								$arp[$j+1][1]=$temp1;
								$arp[$j+1][2]=$temp2;

							}
						}
					}

/*
					$i=0;
					while($arp[$i][0]!=-1)
					{
						echo $arp[$i][0]."   ".$arp[$i][1]."   ".$arp[$i][2]."   ";	
						
						echo "<br>";
						$i=$i+1;
					}*/


				$j=0;
				while($arp[$j][0]!=-1)
				{

					//	echo $arp[$j][0]."   ".$arp[$j][1]."   ".$arp[$j][2]."   ";	
						
					//	echo "<br>";
					$cardid=$arp[$j][0];
					$rc="SELECT count(*) FROM roommate WHERE rpwfid='$cardid'";	
	    	        $row1=mysqli_query($con,$rc);
    	    	    $row2=mysqli_fetch_assoc($row1);
				
					$roommatecount=$row2['count(*)'];
					$roommatecount=$roommatecount+2;
					$budget=$_POST['dbudget'];
					$sql="SELECT * FROM pwf p JOIN flat f ON pwfflatid=fid AND rent/'$roommatecount' < '$budget' AND pwfid='$cardid'";
					$result1=mysqli_query($con,$sql);
					$row=mysqli_fetch_assoc($result1);

					$displaybud="SELECT rent from flat where fid=(SELECT pwfflatid FROM pwf where pwfid='$cardid')";
					$result=mysqli_query($con,$displaybud);
					$rent1=mysqli_fetch_assoc($result);
					$rent=$rent1['rent'];
					$genderfunc=mysqli_query($con,"SELECT fullcheck('$gender','$cardid','$area') as gcheck");
					$genderrow=mysqli_fetch_assoc($genderfunc);
					$genderfinal=$genderrow['gcheck'];
					//echo $genderrow['gcheck'];

					if($rent/$roommatecount < $_POST['dbudget'] && $genderfinal)
					{
						$flag=1;

				
			?>
					<form action="rf.php" method="post" target="_blank">
					<div class="card" style="box-shadow: 0 12px 15px 0 rgba(1,1,1,0.8);background-color: #fff; transition: 0.3s; width:50%; margin: 5% 25% 0% 25%;">
					<div id="pro">
			<div id="bar" onmouseover="fill(this,<?php echo $arp[$j][1] ?>)" style="text-align: center; padding-top: 5px;background-color: #E8A726">
			</div>
			</div>
    				
			<div class="info">
				<img id="im" src="flatuploads/<?php  if($row['image1'])
											echo $row['image1'];
										 else
										 	echo "default.png";	 ?>">
				<img id="im" src="flatuploads/<?php  if($row['image2'])
											echo $row['image2'];
										 else
										 	echo "default.png";	 ?>"><br>

				Rent:<?php  echo round($rent/$roommatecount); ?><br>
				Current occupants:<?php  echo $roommatecount-1; ?><br>
				Critical percentage:<?php echo ceil($arp[$j][1]); ?><br>
				Non-Critical percentage:<?php echo ceil($arp[$j][2]); ?>
				</div>
					<div id="an">
					<button type="submit" name="vmbtn" value=<?php echo $row['pwfid'] ?> style="border: none;background-color: #006600;color: white;padding: 14px 20px;cursor: pointer ;margin:3.5% 2% 10% 5%;" >View More</button>
					</div>
			
			
			<div id="pro">
			<div id="bar" onmouseover="fill(this,<?php echo $arp[$j][2] ?>)" style="text-align: center; padding-top: 5px;background-color: #1A97C4;">
			</div>
			</div>
		</div>
		</form>

			<?php
				}  $j=$j+1; /*echo "<br><br>"*/ ?>
			<?php 
			}
			if($flag==0)
			{
				echo "<script>alert('No cards to display...Select another option');</script>";
				header("refresh:0;url=card.html");
			}	
				?>
		
	


	<?php mysqli_close($con);

	?>


	<script type="text/javascript">

	function fill(x,m)
	{
		//var elem=document.getElementById("bar");
		//window.alert("Inside function");
		var width=0;
		var id=setInterval(frame,1);
		if(m==0)
		{
			m=0.1;
		}
		function frame()
		{
			

			//window.alert("Inside function");
			if(width>=m)
				clearInterval(id);
			else
			{
				//window.alert("Inside function");
				width++;
				x.style.width = width + '%';
				x.innerHTML = width * 1 + '%';
			}
			if(m==0.1)
			{

				x.innerHTML = 0;
			}
		}
	}
</script>

</body>
</html>
