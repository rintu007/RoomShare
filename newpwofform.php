<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="edpwof.css">
	 <style type="text/css">
    body
    {
      background-size: cover;
    }
    input[type=checkbox]
    {
    	transform: scale(1.3,1.3);
    	margin-right: 10px;
    }

.container {
    padding: 16px;
}
    .modal 
{
    display: none; 
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {

    background-color: #fefefe;
    margin: 20% auto 15% auto; 
    border: 1px solid #888;
    width: 20%;
}


.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }

}


  </style>

   <script type="text/javascript">
   			function changecity(functionselected)
		{
			if(functionselected==2)
			{
				document.getElementById('city').selectedIndex=1;
				document.getElementById('citydefault').style.display="none";
				document.getElementById('statedefault').style.display="none";
			}
			var stateselected=document.getElementById('state').value;
			if(stateselected=="Maharashtra")
			{
				document.getElementById('Mumbai').style.display="";
				document.getElementById('Pune').style.display="";
				document.getElementById('Sangli').style.display="";
				document.getElementById('Bhopal').style.display="none";
				document.getElementById('Indore').style.display="none";
				document.getElementById('Gwalior').style.display="none";
				document.getElementById('Ahemdabad').style.display="none";
				document.getElementById('Badodra').style.display="none";
				document.getElementById('Surat').style.display="none";
			}
			else if(stateselected=='Madhya Pradesh' || stateselected=='Madhya')
			{
			
				document.getElementById('Mumbai').style.display="none";
				document.getElementById('Pune').style.display="none";
				document.getElementById('Sangli').style.display="none";
				document.getElementById('Bhopal').style.display="";
				document.getElementById('Indore').style.display="";
				document.getElementById('Gwalior').style.display="";
				document.getElementById('Ahemdabad').style.display="none";
				document.getElementById('Badodra').style.display="none";
				document.getElementById('Surat').style.display="none";
			}
			
			else if(stateselected=='Gujrat')
			{
			
				document.getElementById('Mumbai').style.display="none";
				document.getElementById('Pune').style.display="none";
				document.getElementById('Sangli').style.display="none";
				document.getElementById('Bhopal').style.display="none";
				document.getElementById('Indore').style.display="none";
				document.getElementById('Gwalior').style.display="none";
				document.getElementById('Ahemdabad').style.display="";
				document.getElementById('Badodra').style.display="";
				document.getElementById('Surat').style.display="";
			}

		}
   </script>
</head>

<body background="pwofb.jpg" onload="changecity(1);">
<?php
	session_start();
?>
		<header style="padding: 4px 0;opacity:0.7;"><center><h1>ROOM SHARE</h1></center></header>

	<div class="topnav" id="myTopnav">
  <a href="card.html">Home</a>
  <a href="likepwof.php">Liked</a>
  <a href="refer.html">Referals</a>
  <a href="pwofed.php">Edit</a>
  <a href="match.php">Matched Profiles</a>
  <a href="logout.php" style="float: right;">Logout</a>
</div>


	<button style="float: right;margin: 2% 1% 0 0;border:none; background-color: crimson;
    color: white;
    padding: 14px 20px;
    cursor: pointer;" onclick="document.getElementById('s1').style.display='block'">DELETE PROFILE</button>

<div id="s1" class="modal" style="display: none;">
  

  <form class="modal-content animate" action="deletepwof.php" method="post">
   
	<div class="container">
	<center>Are you sure?
	<hr>

      <button type="submit" style="border:none; background-color: #6600cc;
    color: white;
    padding: 14px 20px;
    cursor: pointer;">Confirm</button>


    
      <button type="button" onclick="document.getElementById('s1').style.display='none'" class="cancelbtn" style="border:none; background-color:  crimson;
    color: white;
    padding: 14px 20px;
    cursor: pointer;">Cancel</button>
      </center>
      </div>
  </form>
</div>



	<form action="pwofedit.php" method="post">
	<div class="edf" style="background-color: #fff;color:#000; margin:6% auto 0 auto; width: 60%;padding: 2% 5% 2% 5%; opacity: 0.85;">	
	Name:<br>
	<input id="in" type="text" name="fname" value=<?php echo $_SESSION['pefname'] ?> onkeyup="val()" required>&nbsp&nbsp
	<input id="in1" type="text" name="mname" value=<?php echo $_SESSION['pemname'] ?> onkeyup="val1()" required>&nbsp&nbsp
	<input id="in2" type="text" name="lname" value=<?php echo $_SESSION['pelname'] ?> onkeyup="val2()" required><br><br>
	
	Gender:
	<input type="radio" name="ge" <?php if($_SESSION['pesex']=="Male") {echo "checked";} ?> value="Male" required>Male
	<input type="radio" name="ge" <?php if($_SESSION['pesex']=="Female") {echo "checked";} ?> value="Female" required>Female
	<input type="radio" name="ge" <?php if($_SESSION['pesex']=="Transgender") {echo "checked";} ?> value="Transgender" required>Transgender
	<br><br>
	
	Date Of Birth:

<select name="Date" required>
	<option value=<?php echo $_SESSION['peddate'] ?>><?php echo $_SESSION['peddate'] ?></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>

<select name="Month" required>
	<option value=<?php echo $_SESSION['pemonth'] ?>><?php echo $_SESSION['pemonth'] ?></option>
	<option value="1">January</option>
	<option value="2">Febuary</option>
	<option value="3">March</option>
	<option value="4">April</option>
	<option value="5">May</option>
	<option value="6">June</option>
	<option value="7">July</option>
	<option value="8">August</option>
	<option value="9">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
</select>

<select name="Year" required>
	<option value=<?php echo $_SESSION['peyear'] ?>><?php echo $_SESSION['peyear'] ?></option>
	<option value="2000">2000</option>
	<option value="1999">1999</option>
	<option value="1998">1998</option>
	<option value="1997">1997</option>
	<option value="1996">1996</option>
	<option value="1995">1995</option>
	<option value="1994">1994</option>
	<option value="1993">1993</option>
	<option value="1992">1992</option>
	<option value="1991">1991</option>
	<option value="1990">1990</option>
	<option value="1989">1989</option>
	<option value="1988">1988</option>
	<option value="1987">1987</option>
	<option value="1986">1986</option>
	<option value="1985">1985</option>
	<option value="1984">1984</option>
	<option value="1983">1983</option>
	<option value="1982">1982</option>
	<option value="1981">1981</option>
	<option value="1980">1980</option>
	<option value="1979">1979</option>
	<option value="1978">1978</option>
	<option value="1977">1977</option>
	<option value="1976">1976</option>
	<option value="1975">1975</option>
	<option value="1974">1974</option>
	<option value="1973">1973</option>
	<option value="1972">1972</option>
	<option value="1971">1971</option>
	
</select><br><br>
	
	Caste:
	<select name="caste" required>
	<option value=<?php echo $_SESSION['pecaste'] ?>><?php echo $_SESSION['pecaste'] ?></option>
	<option value="Hindu">Hindu</option>
	<option value="Muslim">Muslim</option>
	<option value="Christian">Christian</option>
	<option value="Jain">Jain</option>
	<option value="Buddhist">Buddhist</option>	
	</select><br><br>
	
	
	Origin:
	<select id="state" name="State" required onchange="changecity(2)">
	<option id="statedefault" value=<?php echo $_SESSION['pestate'] ?>> <?php echo $_SESSION['pestate'] ?></option>
	<option value="Maharashtra">Maharashtra</option>
	<option value="Madhya Pradesh">Madhya Pradesh</option>
	<option value="Gujrat">Gujrat</option>
	</select>

	<select id="city" name="city" required>
	<option id="citydefault" value=<?php echo $_SESSION['pecity'] ?>> <?php echo $_SESSION['pecity'] ?></option>
	<option value=""> - City -</option>
	<option id="Mumbai" value="Mumbai">Mumbai</option>
	<option id="Pune" value="Pune">Pune</option>
	<option id="Sangli" value="Sangli">Sangli</option>
	<option id="Bhopal" value="Bhopal">Bhopal</option>
	<option id="Indore" value="Indore">Indore</option>
	<option id="Gwalior" value="Gwalior">Gwalior</option>
	<option id="Ahemdabad" value="Ahemdabad">Ahemdabad</option>
	<option id="Badodra" value="Badodra">Badodra</option>
	<option id="Surat" value="Surat">Surat</option>
	</select><br><br>


	Occupation:
	<input type="radio" name="occu" <?php if($_SESSION['peoccupation']=="Working") {echo "checked";} ?> value="Working" required>Working
	<input type="radio" name="occu" <?php if($_SESSION['peoccupation']=="Studying") {echo "checked";} ?> value="Studying" required>Studying
	<br><br>
	
	Area:
	<select name="area" required>
	<option value=<?php echo $_SESSION['pearea'] ?>> <?php echo $_SESSION['pearea'] ?></option>
	<option value="Kothrud">Kothrud</option>
	<option value="Pimpri">Pimpri</option>
	<option value="Chinchwad">Chinchwad</option>
	<option value="Aundh">Aundh</option>
	<option value="Vimannagar">Vimannagar</option>	
	</select><br><br>


	
	Smoking:
	<input type="radio" name="sm" <?php if($_SESSION['pesmoking']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
	<input type="radio" name="sm" <?php if($_SESSION['pesmoking']=="Occasionally") {echo "checked";} ?> value="Occasionally">Occasionally	
	<input type="radio" name="sm" <?php if($_SESSION['pesmoking']=="No") {echo "checked";} ?> value="No">No
	<br><br>
	
	Drinking:
	<input type="radio" name="dr" <?php if($_SESSION['pedrinking']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
	<input type="radio" name="dr" <?php if($_SESSION['pedrinking']=="Occasionally") {echo "checked";} ?> value="Occasionally">Occasionally	
	<input type="radio" name="dr" <?php if($_SESSION['pedrinking']=="No") {echo "checked";} ?> value="No">No
	<br><br>
	
	Do you host parties?:
	<input type="radio" name="pa" <?php if($_SESSION['peparties']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
	<input type="radio" name="pa" <?php if($_SESSION['peparties']=="Occasionally") {echo "checked";} ?> value="Occasionally" required>Occasionally	
	<input type="radio" name="pa" <?php if($_SESSION['peparties']=="No") {echo "checked";} ?> value="No" required>No
	<br><br>
	
	Visitors:
	<input type="radio" name="vi" <?php if($_SESSION['pevisitors']=="Male") {echo "checked";} ?> value="Male" required>Male Friends
	<input type="radio" name="vi" <?php if($_SESSION['pevisitors']=="Female") {echo "checked";} ?> value="Female" required>Female Friends
	<input type="radio" name="vi" <?php if($_SESSION['pevisitors']=="Both male and female") {echo "checked";} ?> value="Both male and female" required>Both
	<input type="radio" name="vi" <?php if($_SESSION['pevisitors']=="Only relatives") {echo "checked";} ?> value="Only relatives" required>Only Relatives
	<input type="radio" name="vi" <?php if($_SESSION['pevisitors']=="None") {echo "checked";} ?> value="None" required>None
	<br><br>
	
	Eating Habits:
	<input type="radio" name="eh" <?php if($_SESSION['peeat']=="Veg") {echo "checked";} ?> value="Veg" required>Veg
	<input type="radio" name="eh" <?php if($_SESSION['peeat']=="Non-Veg") {echo "checked";} ?> value="Non-Veg" required>Non-veg	
	<input type="radio" name="eh" <?php if($_SESSION['peeat']=="Both Veg and Non-Veg") {echo "checked";} ?> value="Both Veg and Non-Veg" required>Both
	<br><br>
	
	Food Arrangement:
	<input type="radio" name="fd" <?php if($_SESSION['pefoodarr']=="Cook") {echo "checked";} ?> value="Cook" required>Cook
	<input type="radio" name="fd" <?php if($_SESSION['pefoodarr']=="Mess") {echo "checked";} ?> value="Mess" required>Mess
	<br><br>
	
	Travelling Arrangement:
	<input type="radio" name="ta" <?php if($_SESSION['petravel']=="Own Vehicle") {echo "checked";} ?> value="Own Vehicle" required>Own Vehicle
	<input type="radio" name="ta" <?php if($_SESSION['petravel']=="Public Transport") {echo "checked";} ?> value="Public Transport" required>Public Transport
	<br><br>
	

	Sleep habits:
	<input type="radio" name="sh" <?php if($_SESSION['pesleep']=="Day person") {echo "checked";} ?> value="Day person" required>Day Person
	<input type="radio" name="sh" <?php if($_SESSION['pesleep']=="Night person") {echo "checked";} ?> value="Night person" required>Night Person
	<br><br>
	
	Hobbies:
	<input id="hobby" type="text" name="hobbies" placeholder="Max 100 Characters" maxlength="100" columns="50" rows="4" value=<?php echo $_SESSION['pehobbies'] ?> required><br><br>
	</div>

	<div class="sub">
	<input id="sub" type="submit" value="Save & Continue">
	</div>
	</form>
	

</body>
  <script>
var modal1 = document.getElementById('s1');
window.onclick = function(event) 
{
    if (event.target == modal1) 
    {
        modal1.style.display = "none";
    }
}
</script>

<script type="text/javascript">
		
	function val()
	{
    var nam = document.getElementById('in');
    var filter =  /^[A-Za-z]$/;

    if (!/^[A-Za-z\s]+$/.test(nam.value)) 
    {
   
    nam.focus;
    document.getElementById("sub").disabled = true;
    document.getElementById("sub").value = "Check your name";
    if(nam.value!="")
    window.alert("Please check your name");
    
 	}    
    else
    {
        document.getElementById("sub").disabled = false;
    
    document.getElementById("sub").value = "Submit details";
}
	}

	function val1()
	{
    var nam = document.getElementById('in1');
    var filter =  /^[A-Za-z]$/;

    if (!/^[A-Za-z\s]+$/.test(nam.value)) 
    {
   
    nam.focus;
    document.getElementById("sub").disabled = true;
    document.getElementById("sub").value = "Check your name";
    if(nam.value!="")
    window.alert("Please check your name");
    
 	}    
    else
    {
        document.getElementById("sub").disabled = false;
    
    document.getElementById("sub").value = "Submit details";
}
	}

	function val2()
	{
    var nam = document.getElementById('in2');
    var filter =  /^[A-Za-z]$/;

    if (!/^[A-Za-z\s]+$/.test(nam.value)) 
    {
   
    nam.focus;
    document.getElementById("sub").disabled = true;
    document.getElementById("sub").value = "Check your name";
    if(nam.value!="")
    window.alert("Please check your name");
    
 	}    
    else
    {
        document.getElementById("sub").disabled = false;
    
    document.getElementById("sub").value = "Submit details";
}
	}
	</script>
</html> 
