<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="cardd.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="edpwof.css">
  <style>

	fieldset
	{
		border:0px;
		padding:0 0 0 0;
		margin:0 0 0 0;
	}
	div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

div.tab button:hover {
    background-color: #ddd;
}

div.tab button.active {
    background-color: #ccc;
}

.tabcontent {
    display: none;
    border: 1px solid #ccc;
    border-top: none;
    opacity:0.85;
}
	input[type=email], input[type=password], input[type=text], input[type=number]
	{
	    width: 60%;
	    padding: 12px 20px;
	    margin: 8px 0;
	    display: inline-block;
	    border: 1px solid #ccc;
	    box-sizing:	border-box;
	}

</style>
</head>
<body background="pwfb.jpg">

<script type="text/javascript">

		function changecity()
		{
			document.getElementById('city').selectedIndex=0;
		
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
			else if(stateselected=='Madhya Pradesh')
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
<header style="padding: 4px 0;opacity:0.7;"><center><h1>ROOM SHARE</h1></center></header>

	<div class="topnav" id="myTopnav">
  <a href="likepwf.php">Home</a>
  <a href="likedpwf.php">Liked</a>
  <a href="selectrm.html">Edit</a>
  <a href="logout.php" style="float: right;">Logout</a>
</div>


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

		$sql="SELECT count(*) FROM roommate WHERE rpwfid=(SELECT pwfid FROM pwf WHERE email='$vemail')";
		$result=mysqli_query($con,$sql);
		$roommatecount=mysqli_fetch_assoc($result);
		if($roommatecount==10)
		{
			echo "<script>alert('You have maximum roommates possible')<script>";
			header("refresh:0;url=selectrm.html");
		}
		else
		{ ?>

			<form action="insertaddroommate.php" method="post" enctype="multipart/form-data">
			<div id="inf1" class="info" style="text-align: left;">
		  	Profile Picture:
			<input type="file" name="image1"><br><br>

			Name:<br>
			<input id="in" type="text" name="fname1" placeholder="First Name" onkeyup="val()" required>&nbsp&nbsp
			<input id="in1" type="text" name="mname1" placeholder="Middle Name" onkeyup="val1()" required>&nbsp&nbsp
			<input id="in2" type="text" name="lname1" placeholder="Last Name" onkeyup="val2()" required><br><br>
			
			Gender:
			<input type="radio" name="ge1" value="Male" required>Male
			<input type="radio" name="ge1" value="Female" required>Female
			<input type="radio" name="ge1" value="Transgender"required>Transgender
			<br><br>
			
			Date Of Birth:

		<select name="Date1" required>
			<option> - Day - </option>
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

		<select name="Month1" required>
			<option> - Month - </option>
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

		<select name="Year1" required>
			<option> - Year - </option>
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
			<select name="caste1" required>
			<option> - Caste -</option>
			<option value="Hindu">Hindu</option>
			<option value="Muslim">Muslim</option>
			<option value="Christian">Christian</option>
			<option value="Jain">Jain</option>
			<option value="Buddhist">Buddhist</option>	
			</select><br><br>

			Origin:
			<select id="state" name="State" required onchange="changecity();">
			<option value=""> - State -</option>
			<option value="Maharashtra">Maharashtra</option>
			<option value="Madhya Pradesh">Madhya Pradesh</option>
			<option value="Gujrat">Gujrat</option>
			</select>

			<select id="city" name="city" required>
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
			<input type="radio" name="occu1" value="Working" required>Working
			<input type="radio" name="occu1" value="Studying" required>Studying
			<br><br>
			
			Smoking:
			<input type="radio" name="sm1" value="Yes" required>Yes
			<input type="radio" name="sm1" value="Occasionally" required>Ocassionally	
			<input type="radio" name="sm1" value="No" required>No
			<br><br>
			
			Drinking:
			<input type="radio" name="dr1" value="Yes" required>Yes
			<input type="radio" name="dr1" value="Occasionally" required>Ocassionally	
			<input type="radio" name="dr1" value="No" required>No
			<br><br>
			
			Do you host parties?:
			<input type="radio" name="pa1" value="Yes" required>Yes
			<input type="radio" name="pa1" value="Occasionally" required>Ocassionally	
			<input type="radio" name="pa1" value="No" required>No
			<br><br>
			
			Visitors:
			<input type="radio" name="vi1" value="Male" required>Male Friends
			<input type="radio" name="vi1" value="Female" required>Female Friends
			<input type="radio" name="vi1" value="Both male and female" required>Both
			<input type="radio" name="vi1" value="Only relatives" required>Only Relatives
			<input type="radio" name="vi1" value="None" required>None
			<br><br>
			
			Eating Habits:
			<input type="radio" name="eh1" value="Veg" required>Veg
			<input type="radio" name="eh1" value="Non-Veg" required>Non-veg	
			<input type="radio" name="eh1" value="Both Veg and Non-Veg" required>Both
			<br><br>
			
			Food Arrangement:
			<input type="radio" name="fd1" value="Cook" required>Cook
			<input type="radio" name="fd1" value="Mess" required>Mess
			<br><br>
			
			Travelling Arrangement:
			<input type="radio" name="ta1" value="Own Vehicle" required>Own Vehicle
			<input type="radio" name="ta1" value="Public Transport" required>Public Transport
			<br><br>
			
			Sleep habits:
			<input type="radio" name="sh1" value="Day person" required>Day Person
			<input type="radio" name="sh1" value="Night person" required>Night Person
			<br><br>
			
			
			Hobbies:
			<input id="hobby" type="text" name="hobbies1" placeholder="Max 100 Characters" maxlength="100" columns="50" rows="4" required><br><br>

			</div>
			<div class="sub">
			<input id="sub" type="submit" value="Save & Continue">
			</div>
			
		
		</form>

		<?php
		}

?>

</body>
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