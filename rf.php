
<!DOCTYPE html>
<html>
<head>
<title>
    Page
</title>
    

    <style>

body
{
    background-attachment: fixed;
    background-size: cover;
}

 .box{
 	margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.8;
 }   
 
div.r1 {

	padding-left: 200px;
	padding-right: 200px;
	font-size: 20px;
}

div.pi {
	padding-left: 300px;
}

div.tablinks {
    background-color:#ffffff;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 20px;
}

.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

#but
{
border: none;background-color: crimson;color: white;padding: 14px 20px;cursor: pointer ;margin-top: 3%;
}
    </style> 
    <script type="text/javascript">
        function close1()
        {
            window.close();
        }
    </script>
</head>

<body background="pwofb.jpg">
<button id="but" onclick="close1();">Go back</button>
    
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
        $val=$_POST['vmbtn'];
        $_SESSION['invid']=$val;
        $vemail=$_SESSION['lemail'];

        

        $vam=array("one","two","three","four","five","six","seven","eight","nine","ten");
        $nam=array("five","six","seven","ate","hgh");
        $p=2;
        $q=0;
        



        $s="SELECT * FROM pwf WHERE pwfid='$val'";
        $trows=mysqli_query($con,$s);
        $rrow=mysqli_fetch_assoc($trows);
        $flatid=$rrow['pwfflatid'];

            ?>
        	<div class="box">
            <h1><center>Roommate 1</center></h1>
            <center>
            <img src="pwfuploads/<?php  if($rrow['image'])
                                            echo $rrow['image'];
                                         else
                                            echo "default.png";  ?>" style="width: 200px;height: 200px"><br><br>
            </center>
            <div id=r1 class=r1>
            <fieldset>
            <legend>Personal Information</legend>
            <div class=pi>
            Sex:<?php echo $rrow['sex'] ?><br><br>
            Dob:<?php echo $rrow['ddate'] ?> / <?php echo $rrow['month'] ?> / <?php echo $rrow['year'] ?><br><br>
            Caste: <?php echo $rrow['caste'] ?><br><br>
            State:<?php echo $rrow['state'] ?><br><br>
            City:<?php echo $rrow['city'] ?><br><br>
            Occupation:<?php echo $rrow['occupation'] ?><br><br>
            </div>
            </fieldset>
            <br>
            <fieldset>
            <legend>Habbits, Hobbies and more</legend>
            <div class=pi>
            Smoking:<?php echo $rrow['smoking'] ?><br><br>
            Drinking:<?php echo $rrow['drinking'] ?><br><br>
            Does he host parties?:<?php echo $rrow['parties'] ?><br><br>
            Visitors:<?php echo $rrow['visitors'] ?><br><br>
            Eating Habits:<?php echo $rrow['eat'] ?><br><br>
            Food Arrangement:<?php echo $rrow['foodarr'] ?><br><br>
            Travelling:<?php echo $rrow['travel'] ?><br><br>
            Sleeping Habits:<?php echo $rrow['sleep'] ?><br><br>
            Hobbies:<?php echo $rrow['hobbies'] ?><br><br>
            </div>
            </fieldset>
            </div>
            <br>
            </div>

            <?php
        $s="SELECT * FROM roommate WHERE rpwfid=(SELECT pwfid FROM pwf WHERE pwfid='$val')";
        $trows=mysqli_query($con,$s);
        $count=mysqli_num_rows($trows);
       // $pq="SELECT * FROM tpwf WHERE pwfid='$val'";
        //$pwfres=mysqli_query($con,$pq);


        ?>
        <?php
        while($rrow=mysqli_fetch_assoc($trows))
        {
    
        ?>
             <button id=<?php echo $vam[$q]?> class="tablinks" onclick="openCity(event, <?php echo $p?>)" style="background-color: #fff;float: left; border:none; outline:none; cursor: pointer; padding: 14px 16px; transition: 0.3s;"> Roommate <?php echo $p ?></button>
        <div id=<?php echo $p?> class="tabcontent" style="margin-top: 5%;">
            
            <div class="box" style="margin-top: 5px;">
            <h1><center>Roommate <?php echo $p ?></center></h1>
            <center>
            <img src="pwfuploads/<?php  if($rrow['image'])
                                            echo $rrow['image'];
                                         else
                                            echo "default.png";  ?>" style="width: 200px;height: 200px"><br><br>
           </center>
            <div id=r1 class=r1>
            <fieldset>
            <legend>Personal Information</legend>
            <div class=pi>
            Sex:<?php echo $rrow['sex'] ?><br><br>
            Dob:<?php echo $rrow['ddate'] ?> / <?php echo $rrow['month'] ?> / <?php echo $rrow['year'] ?><br><br>
            Caste: <?php echo $rrow['caste'] ?><br><br>
            State:<?php echo $rrow['state'] ?><br><br>
            City:<?php echo $rrow['city'] ?><br><br>
            Occupation:<?php echo $rrow['occupation'] ?><br><br>
            </div>
            </fieldset>
            <br>	
            <fieldset>
            <legend>Habbits, Hobbies and more</legend>
            <div class=pi>
            Smoking:<?php echo $rrow['smoking'] ?><br><br>
            Drinking:<?php echo $rrow['drinking'] ?><br><br>
            Does he host parties?:<?php echo $rrow['parties'] ?><br><br>
            Visitors:<?php echo $rrow['visitors'] ?><br><br>
            Eating Habits:<?php echo $rrow['eat'] ?><br><br>
            Food Arrangement:<?php echo $rrow['foodarr'] ?><br><br>
            Travelling:<?php echo $rrow['travel'] ?><br><br>
            Sleeping Habits:<?php echo $rrow['sleep'] ?><br><br>
            Hobbies:<?php echo $rrow['hobbies'] ?><br><br>
            </div>
            </fieldset>
            </div>
            <br>
            </div>

        </div>
    <?php 
        //echo $p;
        $p=$p+1;
            $q=$q+1;}
?>

<?php
            $sql="SELECT * FROM flat WHERE fid=(SELECT pwfflatid FROM pwf WHERE pwfid='$val')";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($r);
    ?>

         <div class="box" style="margin-top: 10%;padding-bottom: 5%;">
            <h1><center>FLAT</center></h1>
            <center>
            <img src="flatuploads/<?php  if($row['image1'])
                                            echo $row['image1'];
                                         else
                                            echo "default.png";  ?>" style="width: 200px;height: 200px">
            <img src="flatuploads/<?php  if($row['image2'])
                                            echo $row['image2'];
                                         else
                                            echo "default.png";  ?>" style="width: 200px;height: 200px">
            <img src="flatuploads/<?php  if($row['image3'])
                                            echo $row['image3'];
                                         else
                                            echo "default.png";  ?>" style="width: 200px;height: 200px">
            <img src="flatuploads/<?php  if($row['image4'])
                                            echo $row['image4'];
                                         else
                                            echo "default.png";  ?>" style="width: 200px;height: 200px"><br><br>
            </center>
            <div id=r1 class=r1>
            <fieldset>
            <legend>Personal Information</legend>
            <div class=pi>
           	Rent:<?php echo $row['rent'] ?><br><br>
           	Deposit:<?php echo $row['rent'] ?><br><br>
           	Address:<?php echo $row['flatnum'] ?> ,<?php echo $row['building'] ?>,<?php echo $row['street'] ?>,<br>
           	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row['area'] ?>,<br>
           	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row['zip'] ?><br><br>
           	Size: <?php echo $row['size'] ?><br><br>
           	Rooms: <?php echo $row['rooms'] ?><br><br>
           	Is the flat furnished?:<?php echo $row['furnish'] ?><br><br>
           	AC available?:<?php echo $row['ac'] ?><br><br>
           	Electric backup available?:<?php echo $row['eb'] ?><br><br>
           	Water supply availability?:<?php echo $row['ws'] ?><br><br>
           	Availability of flat:<?php echo $row['availability'] ?> years<br><br>
           	Vacancy:<?php echo $row['vacancy'] ?><br><br>
           	Security:<?php echo $row['security'] ?><br><br>
           	Parking availability?:<?php echo $row['parking'] ?><br><br>
            </div>
            </fieldset>
            </div>
            <br><br>
            

<?php
        $sql="SELECT pwf_id FROM asso WHERE pwf_id='$val' AND pwof_id=(SELECT pwofid FROM pwof WHERE email='$vemail')";
            $result=mysqli_query($con,$sql);
            $flag=0;
            if(mysqli_num_rows($result))
            {
                $flag=1;
            }
            
             //echo $flag ;
            ?>
            
            <?php
             
            if($flag==0)
            { ?>
                <center>
                <button id="disbut" name="dislikebtn" style="display:none" onclick="dislikef()"><img src="dislike.jpg" height=50 width=50></button>
                <button id="likebut" name="likebtn" onclick="likef()"><img src="like.jpg" height=50 width=50></button><br>
                </center>
            
    <?php   }

            else
            { ?>
        <center>
                <button id="disbut" name="dislikebtn" onclick="dislikef()"><img src="dislike.jpg" height=50 width=50></button>
                <button id="likebut" name="likebtn" style="display:none" onclick="likef()"><img src="like.jpg" height=50 width=50></button><br>    
                </center>
            <?php }
            ?>
</div>


<script>

function likef()
{
    document.getElementById("likebut").style.display="none";
    document.getElementById("disbut").style.display="";
    window.open("likepwofvm.php");
}

function dislikef()
{
    document.getElementById("likebut").style.display="";
    document.getElementById("disbut").style.display="none";
    window.open("dislikepwofvm.php");
}

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