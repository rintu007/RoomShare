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
		
			$sql="SELECT pwfid FROM pwf WHERE email='$vemail'";
            $row1=mysqli_query($con,$sql);
            $row2=mysqli_fetch_assoc($row1);
 			$pi=$row2['pwfid'];

 			$sql="SELECT max(rmno) FROM roommate WHERE rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";
 			$result=mysqli_query($con,$sql);
 			/*echo $pi;
 			echo $result['max(rmno)'];

 				$row=mysqli_fetch_assoc($result);
 				$rmno=$row['max(rmno)'];
 				echo $rmno;*/
 			
 			if($row=mysqli_fetch_assoc($result))
 			{
 				echo "before adding one";
 				$rmno=$row['max(rmno)'];
 				echo $rmno;
                $rmno=$rmno+1;
 				echo "After adding one";
 				echo $rmno;
 			}
 			else
 				$rmno=1;

     				$sa=$_POST['fname1'];
                    $sb=$_POST['mname1'];
                    $sc=$_POST['lname1'];
                    $sd=$_POST['ge1'];
                    $se=$_POST['Date1'];
                    $sf=$_POST['Month1'];
                    $sg=$_POST['Year1'];
                    $sh=$_POST['caste1'];
                    $si=$_POST['State'];
                    $sj=$_POST['city'];
                    $sk=$_POST['occu1'];
                    $sl=$_POST['sm1'];
                    $sm=$_POST['dr1'];
                    $sn=$_POST['pa1'];
                    $so=$_POST['vi1'];
                    $sp=$_POST['eh1'];
                    $sq=$_POST['fd1'];
                    $sr=$_POST['ta1'];
                    $ss=$_POST['sh1'];
                    $st=$_POST['hobbies1'];

                    $target = "pwfuploads/".basename($_FILES["image1"]["name"]);
                    $image = $_FILES["image1"]["name"];
        
        
        $i1="INSERT INTO roommate(rmno,rpwfid,fname,mname,lname,sex,ddate,month,year,caste,state,city,occupation,smoking,drinking,parties,visitors,eat,foodarr,travel,sleep,hobbies,image) VALUES('$rmno','$pi','$sa','$sb','$sc','$sd','$se','$sf','$sg','$sh','$si','$sj','$sk','$sl','$sm','$sn','$so','$sp','$sq','$sr','$ss','$st','$image')";
        $r1=mysqli_query($con,$i1);
        if($r1)
        {
            echo "<br>ROOMATE    Data saved successfully. Redirecting to login page. :)";
            //header("refresh:0;url:pwfinterface.html");
        }
        else
        {
            echo "<br>ROOMMATE....Error 404:Not found. Redirecting to sign up page.";
            //header("refresh:0;url:selectrm.html");
        }
       				 if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target)) 
                    {
                        echo "Image uploaded successfully";
                           
                    }
                    else
                    {
                        echo "Failed to upload image";
                    }

header("refresh:0;url=pwfinterface.html");
?>