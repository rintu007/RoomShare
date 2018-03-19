
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
		$val=$_POST['vm'];
		echo "Value of val <br>";
		echo $val;
		$_SESSION['inval']=$val;
		$vem=$_SESSION['lemail'];

        $p=0;
        $s="SELECT * FROM roommate WHERE pwfid=$val";
        $trows=mysqli_query($con,$s);
        $count=mysqli_num_rows($trows);
        $pq="SELECT * FROM pwf WHERE pwfid=$val";
        $pwfres=mysqli_query($con,$pq);
        ?>
        <?php
        while($rrow=mysqli_fetch_assoc($trows)))
        {
        ?>
            
        <button id="<?php echo $p?>" class="tablinks" style="display:none" onclick="openCity(event, 'room')"> 

        <div id="room" class="tabcontent">
            Name:<?php echo $rrow['name']; ?>
            Sex:<?php echo $rrow['sex']; ?>
            Smoking:<?php echo $rrow['smoking']; ?>
        </div>
    <?php }
    ?>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


<?php
	mysqli_close($con);
	?>

</body>
</html>