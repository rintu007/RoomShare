<!DOCTYPE HTML>
<html>
<head>
	    <style>

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
    background-color:"grey";
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
</head>
<body background="pwfb.jpg">

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
		$cardpwofid=$_POST['vmbtn'];
		$_SESSION['invid']=$cardpwofid;
		$val=$cardpwofid;
		$p="SELECT * FROM pwof WHERE pwofid='$cardpwofid'";
		$row=mysqli_query($con,$p);
		$rrow=mysqli_fetch_assoc($row);	

?>

            <form action="likepwf.php">
            <button id="but" type="submit">Go back</button>
            </form>
	<div class="box">
            <h1><center>Prospective Roommate</center></h1>
            <center>
            <img src="pwofuploads/<?php  if($rrow['image'])
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
<?php
            $sql="SELECT pwf_id FROM asso2 WHERE pwof_id='$cardpwofid' AND pwf_id=(SELECT pwfid FROM pwf WHERE email='$vemail')";
            $result=mysqli_query($con,$sql);
            $flag=0;
            if(mysqli_num_rows($result))
            {
                $flag=1;
            }
            
             echo $flag ;
            ?>
            
           <?php
           $sql="SELECT * FROM flat WHERE  fid=(SELECT pwfflatid FROM pwf WHERE pwfid=(SELECT pwfid FROM pwf WHERE email='$vemail'))";
           $result=mysqli_query($con,$sql);
           $row=mysqli_fetch_assoc($result);
           $vac=$row['vacancy'];

            if($vac) 
            {
                if($flag==0)
                { ?>
                    <center>
                    <button id="disbut" name="dislikebtn" style="display:none" onclick="pdislikef()"><img src="dislike.jpg" height=50 width=50></button>
                    <button id="likebut" name="likebtn" onclick="plikef()"><img src="like.jpg" height=50 width=50></button><br>
                    </center>
                
        <?php   }

                else
                { ?>
            <center>
                    <button id="disbut" name="dislikebtn" onclick="pdislikef()"><img src="dislike.jpg" height=50 width=50></button>
                    <button id="likebut" name="likebtn" style="display:none" onclick="plikef()"><img src="like.jpg" height=50 width=50></button><br>    
                    </center>
                <?php }
        }
        else
        {
            if($flag==0)
                { ?>
                    <center>
                    <button id="disbut" name="dislikebtn" style="display:none" onclick="pdislikef1()"><img src="dislike.jpg" height=50 width=50></button>
                    <button id="likebut" name="likebtn" onclick="plikef1();" ><img src="like.jpg" height=50 width=50></button><br>
                    </center>
                
        <?php   }

                else
                { ?>
            <center>
                    <button id="disbut" name="dislikebtn" onclick="pdislikef1()"><img src="dislike.jpg" height=50 width=50></button>
                    <button id="likebut" name="likebtn" style="display:none"><img src="like.jpg" height=50 width=50></button><br>    
                    </center>
                <?php }
            }
            ?>

<br><br>
</div>

<script>

function plikef()
{
	
    document.getElementById("likebut").style.display="none";
    document.getElementById("disbut").style.display="";
    window.open("inslikepwfvm.php");
}

function pdislikef()
{
    document.getElementById("likebut").style.display="";
    document.getElementById("disbut").style.display="none";
    window.open("deldislikepwfvm.php");
}

function pdislikef1()
{
    document.getElementById("likebut").style.display="";
    document.getElementById("disbut").style.display="none";
    window.open("deldislikepwfvm.php");
    location.reload();
}
function plikef1()
{
    alert('Vacancy is Zero... Please dislike any other account.');
}

</script>
</body>
</html>
