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

                      $target = "pwofuploads/".basename($_FILES["image1"]["name"]);
                     $image = $_FILES["image1"]["name"];     

                   // $sql="INSERT INTO pwof (image) VALUES ('$image')";
                    //$r=mysqli_query($con,$sql);              


                    $s1=$_SESSION["s1name"];
                    $s2=$_SESSION["s2name"];
                    $s3=$_POST['fname'];
                    $s4=$_POST['mname'];
                    $s5=$_POST['lname'];
                    $s6=$_POST['ge'];
                    $s7=$_POST['Date'];
                    $s8=$_POST['Month'];
                    $s9=$_POST['Year'];
                    $s10=$_POST['caste'];
                    $s11=$_POST['State'];
                    $s12=$_POST['city'];
                    $s13=$_POST['occu'];
                    $s14=$_POST['area'];
                    $s15=$_POST['budget'];      
                    $s16=$_POST['stay'];
                    $s17=$_POST['sm'];
                    $s18=$_POST['dr'];
                    $s19=$_POST['pa'];
                    $s20=$_POST['vi'];
                    $s21=$_POST['eh'];
                    $s22=$_POST['fd'];
                    $s23=$_POST['ta'];
                    $s24=$_POST['sh'];
                    $s25=$_POST['contact'];
                    echo "ASdasdasdasdsa======".$s25;
                    $s26=$_POST['hobbies'];

$i1="INSERT INTO pwof(email,password,fname,mname,lname,sex,ddate,month,year,contact,caste,state,city,occupation,area,budget,stay,smoking,drinking,parties,visitors,eat,foodarr,travel,sleep,hobbies,image) VALUES('$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s25','$s10','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','$s19','$s20','$s21','$s22','$s23','$s24','$s26','$image')";

        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target)) 
                    {
                        $msg = "Image uploaded successfully";
                    }
                    else
                    {
                        $msg = "Failed to upload image";
                    }
                    echo $msg;      
       
        if(mysqli_query($con,$i1))
        {
                 mysqli_close($con);
        	echo "Data saved successfully. Redirecting to login page. :)";
        	header("refresh:0;url=home.html");
        }
        else
        {
                 mysqli_close($con);
        	echo "Error 404:Not found. Redirecting to sign up page.";
        	header("refresh:0;url=pwof.html");
        }
?>
