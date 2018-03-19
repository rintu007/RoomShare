
		$i="SELECT * FROM asso WHERE pwf_id='$ipwfid'";
		$r=mysqli_query($con,$i);
		if(mysqli_num_rows($r))
		{
			$i="DELETE FROM asso WHERE pwf_id='$ipwfid'";
			if(mysqli_query($con,$i))
			{
				mysqli_close($con);

				echo "<script>
				alert('Profile DISLIKED');
				window.close();
				</script>";
			}

			else
			{
				mysqli_close($con);
				echo "3";
				echo "<script>
				alert('You have already disliked this profile');
				window.close();
				</script>";
		
			}
		}