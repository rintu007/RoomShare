
<!DOCTYPE html>
<html>
<head>
<title>
	Page
</title>
	


</head>

<body onload="loadg();">
	
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
	/*	$val=$_POST['vm'];
		echo "Value of val <br>";
		echo $val;
		$_SESSION['inval']=$val;
		$vem=$_SESSION['lemail'];

			echo "Work bitch";
			/*$sq="SELECT pwofid FROM pwof WHERE email='$vem'";
			$r=mysqli_query($con,$sq);
			if(mysqli_num_rows($r))
			{
				$k=mysqli_fetch_assoc();
				$vemid=$k['pwofid']
			}*/
			$sql="SELECT pwf_id FROM asso WHERE pwf_id=6 AND pwof_id=1";

			$result=mysqli_query($con,$sql);
			$flag=0;
			if(mysqli_num_rows($result))
			{
				$flag=1;
			}
			
			 echo $flag ;
			 function like()
			 {
				 $i="INSERT INTO asso (pwf_id,pwof_id) VALUES (6,1)"; 
				if(mysqli_query($con,$i))
				{
					echo "inserted";
				}
				else
				{
					echo "Not inserted";
				}
			 }
			 function dislike()
			 {
				 $d="DELETE FROM asso WHERE pwof_id=1;"; 
				if(mysqli_query($con,$d))
				{
					echo "Deleted";
				}
				else
				{
					echo "Not deleted";
				}
			 }

			/*if(!$flag)
			{ ?>
				<input type="submit" id="li" name="sub" value="LIKE" onclick="inlike()"><br>
				<input type="submit" id="di" name="dl" value="DISLIKE" onclick="delike()" style="display:none">
	<?php	}

			else
			{ ?>
				<input type="submit" id="li" name="sub" value="LIKE" onclick="inlike()" style="display:none"><br>
				<input type="submit" id="di" name="dl" value="DISLIKE" onclick="delike()">
			<?php }
			?>*/
			?>
				<input type="submit" id="li" name="sub" value="LIKE" onclick="delike(0)" style="display:none"><br>
				<input type="submit" id="di" name="dl" value="DISLIKE" onclick="delike(1)" style="display:none"><br>
			

<script>

	function loadg()
	{
			var j=<?php echo $flag ?>;
			
			alert(j);
			if(j==1)
			{
				document.getElementById("li").style.display="none";
				document.getElementById("di").style.display="";
				
			}
			else
			{
				
				document.getElementById("li").style.display="";
				document.getElementById("di").style.display="none";
			}
	}
</script>


<script>
	function delike(r)
	{
		if(r==1)
		{
			document.getElementById("li").style.display="";
			document.getElementById("di").style.display="none";
			<?php dislike(); ?>
		}	
		else{
			document.getElementById("li").style.display="none";
			document.getElementById("di").style.display="";
			<?php like(); ?>
		}	


	}
</script>


<?php
	mysqli_close($con);
	?>

</body>
</html>