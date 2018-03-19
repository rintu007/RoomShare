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
	
	$s1=$_POST["rent"];
        $s2=$_POST["deposit"];	//number
                    $s3=$_POST['fno'];
                    $s4=$_POST['bname'];
                    $s5=$_POST['sname'];
                    $s6=$_POST['area'];
                    $s7=$_POST['zip'];//n
                    $s8=$_POST['size'];//n
                    $s9=$_POST['rooms'];//n
                    $s10=$_POST['fur'];
                    $s11=$_POST['ac'];
                    $s12=$_POST['eb'];
                    $s13=$_POST['ws'];
                    $s14=$_POST['availability'];
                    $s15=$_POST['vacancy'];      
                    $s16=$_POST['sec'];
                    $s17=$_POST['parking'];
                    
                    
  
$i1="INSERT INTO flat(rent,deposit,flatnum,building,street,area,zip,size,rooms,furnish,ac,eb,ws,availability,vacancy,security,parking) VALUES('$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13','$s14','$s15','$s16','$s17')";
        $r=mysqli_query($con,$i1);
        
                    
        if($r)
        {
        	echo "Data saved successfully. Redirecting to login page. :)";
        	header("refresh:5;url:login.html");
        }
        else
        {
        	echo "Error 404:Not found. Redirecting to sign up page.";
        	header("refresh:5;url:login.html");
        }
?>
