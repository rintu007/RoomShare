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

                    $target = "pwfuploads/".basename($_FILES["pwfimage"]["name"]);
                    $image1 = $_FILES["pwfimage"]["name"];

                    $s1=$_SESSION["pwfmail"];
                    $s2=$_SESSION["pwfpass"];
                    $s3=$_POST['fname'];
                    $s4=$_POST['mname'];
                    $s5=$_POST['lname'];
                    $s6=$_POST['ge'];
                    $s7=$_POST['Date'];
                    $s8=$_POST['Month'];
                    $s9=$_POST['Year'];
                    $s26=$_POST['contact'];
                    $s10=$_POST['caste'];
                    $s11=$_POST['State'];
                    $s12=$_POST['city'];
                    $s13=$_POST['occu'];
                    $s17=$_POST['sm'];
                    $s18=$_POST['dr'];
                    $s19=$_POST['pa'];
                    $s20=$_POST['vi'];
                    $s21=$_POST['eh'];
                    $s22=$_POST['fd'];
                    $s23=$_POST['ta'];
                    $s24=$_POST['sh'];
                    $s25=$_POST['hobbies'];

                    echo $s1;
        
        
        $i1="INSERT INTO pwf(email,password,fname,mname,lname,sex,ddate,month,year,contact,caste,state,city,occupation,smoking,drinking,parties,visitors,eat,foodarr,travel,sleep,hobbies,image) VALUES('$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s26','$s10','$s11','$s12','$s13','$s17','$s18','$s19','$s20','$s21','$s22','$s23','$s24','$s25','$image1')";
        $r1=mysqli_query($con,$i1);
        if($r1)
        {
        	echo "<br><br>Data saved successfully. Redirecting to login page. :)";
        	//header("refresh:5;url:login.html");
        }
        else
        {
        	echo "<br>pwf Error 404:Not found. Redirecting to sign up page.";
        	//header("refresh:5;url:pwof.html");
        }
        if (move_uploaded_file($_FILES["pwfimage"]["tmp_name"], $target)) 
                    {
                        $msg = "Image uploaded successfully";
                        
                    }
                    else
                    {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;    

                $sql="SELECT max(pwfid) FROM pwf";
            $row1=mysqli_query($con,$sql);
            $row2=mysqli_fetch_assoc($row1);

            $pi=$row2['max(pwfid)'];
            //$pi=$pi+1;
            echo "<br>PWFID:".$pi;


//------------------------------------------------


        



                    $s1=$_POST["rent"];
                    $s2=$_POST["deposit"];  //number
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

                  	$target1 = "flatuploads/".basename($_FILES["fimage1"]["name"]);
                    $image1 = $_FILES["fimage1"]["name"];
                    $target2 = "flatuploads/".basename($_FILES["fimage2"]["name"]);
                    $image2 = $_FILES["fimage2"]["name"];
                    $target3 = "flatuploads/".basename($_FILES["fimage3"]["name"]);
                    $image3 = $_FILES["fimage3"]["name"];
                    $target4 = "flatuploads/".basename($_FILES["fimage4"]["name"]);
                    $image4 = $_FILES["fimage4"]["name"];



  
$i1="INSERT INTO flat(rent,deposit,flatnum,building,street,area,zip,size,rooms,furnish,ac,eb,ws,availability,vacancy,security,parking,image1,image2,image3,image4) VALUES('$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$image1','$image2','$image3','$image4')";
        $r2=mysqli_query($con,$i1);
       
        if( $r2)
        {
        	echo "<br>flatData saved successfully. Redirecting to login page. :)";
        	//header("refresh:5;url:login.html");
        }
        else
        {
        	echo "<br>flatError 404:Not found. Redirecting to sign up page.";
        	//header("refresh:5;url:pwof.html");
        }



            $sql="SELECT max(fid) FROM flat";
            $row1=mysqli_query($con,$sql);
            $row2=mysqli_fetch_assoc($row1);

            $fi=$row2['max(fid)'];
            echo $pi;
            echo $fi;

$i1="UPDATE pwf SET pwfflatid='$fi' WHERE pwfid='$pi'";
$r=mysqli_query($con,$i1);

    if($r)
        {
            echo "<br>FLAT ID  Data saved successfully. Redirecting to login page. :)";
            //header("refresh:1;url:home.html");
        }
        else
        {
            echo "<br>FLAT ID   Error 404:Not found. Redirecting to sign up page.";
            //header("refresh:5;url:pwof.html");
        }

         if (move_uploaded_file($_FILES["fimage1"]["tmp_name"], $target1)) 
                    {
                        $msg = "Image uploaded successfully";
                        
                    }
                    else
                    {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;
           if (move_uploaded_file($_FILES["fimage2"]["tmp_name"], $target2)) 
                    {
                        $msg = "Image uploaded successfully";
                        
                    }
                    else
                    {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;
                              
             if (move_uploaded_file($_FILES["fimage3"]["tmp_name"], $target3)) 
                    {
                        $msg = "Image uploaded successfully";
                        
                    }
                    else
                    {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;
             if (move_uploaded_file($_FILES["fimage4"]["tmp_name"], $target4)) 
                    {
                        $msg = "Image uploaded successfully";
                        
                    }
                    else
                    {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;                         



                    header("refresh:1;url=home.html");
?>