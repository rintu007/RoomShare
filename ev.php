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

					$vemail=$_POST['email'];
                    $vpass=$_POST['pass'];

                    $_SESSION["s1name"]=$_POST['email'];
                    $_SESSION["s2name"]=$_POST['pass'];

                    $sql="SELECT * FROM pwof WHERE email='$vemail'";
                    $c=mysqli_num_rows(mysqli_query($con,$sql));

                    $sql="SELECT * FROM pwf WHERE email='$vemail'";
                    $p=mysqli_num_rows(mysqli_query($con,$sql));


                    mysqli_close($con);

                    if(($c==0)&& ($p==0))
                    {
                        echo "Email-id and password valid. Redirecting to next step.";

                        echo ".<br>Entered email ID is ".$_SESSION["s1name"];
                        header("refresh:1;url=pwof2.html");

                        
                    }

                    else
                    {
                        echo "Email-ID already in use. Redirecting to previous page.";

                        header("refresh:1;url=pwof.html");
                    }

                    //echo $_SESSION["s1name"];

                    //echo $_SESSION["s2name"];

                    
?>
