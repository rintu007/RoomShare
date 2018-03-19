<!DOCTYPE html>
<html>
<head>
	<title>Edit Page</title>
	<link rel="stylesheet" type="text/css" href="cardd.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="edpwof.css">
  <style type="text/css">
    body
    {
      background-size: cover;
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

<body background="pwfb.jpg" onload="changecity(1);">
<header style="padding: 4px 0;opacity:0.7;"><center><h1>ROOM SHARE</h1></center></header>

	<div class="topnav" id="myTopnav">
  <a href="likepwf.php">Home</a>
  <a href="likedpwf.php">Liked</a>
  <a href="selectrm.html">Edit</a>
  <a href="logout.php" style="float: right;">Logout</a>
</div>
	<form action="pwfedit.php" method="post">	
<?php
	session_start();
	$roomno=$_SESSION['sessionroomno'];

	if($roomno!=11)
	{
?>
	<div class="edf" style="background-color: #fff;color:#000; margin:2% auto 0 auto; width: 60%;padding: 2% 5% 2% 5%; opacity: 0.85;">	
	Name:<br>
	<input id="in" type="text" name="fname" value=<?php echo $_SESSION['peffname'] ?> onkeyup="val()" required>&nbsp&nbsp
	<input id="in1" type="text" name="mname" value=<?php echo $_SESSION['pefmname'] ?> onkeyup="val1()" required>&nbsp&nbsp
	<input id="in2" type="text" name="lname" value=<?php echo $_SESSION['peflname'] ?> onkeyup="val2()" required><br><br>
	
	Gender:
	<input type="radio" name="ge" <?php if($_SESSION['pefsex']=="Male") {echo "checked";} ?> value="Male" required>Male
	<input type="radio" name="ge" <?php if($_SESSION['pefsex']=="Female") {echo "checked";} ?> value="Female" required>Female
	<input type="radio" name="ge" <?php if($_SESSION['pefsex']=="Transgender") {echo "checked";} ?> value="Transgender" required>Transgender
	<br><br>
	
	Date Of Birth:

<select name="Date" required>
	<option value=<?php echo $_SESSION['pefddate'] ?>><?php echo $_SESSION['pefddate'] ?></option>
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
	<option value=<?php echo $_SESSION['pefmonth'] ?>><?php echo $_SESSION['pefmonth'] ?></option>
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
	<option value=<?php echo $_SESSION['pefyear'] ?>><?php echo $_SESSION['pefyear'] ?></option>
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
	<option value=<?php echo $_SESSION['pefcaste'] ?>><?php echo $_SESSION['pefcaste'] ?></option>
	<option value="Hindu">Hindu</option>
	<option value="Muslim">Muslim</option>
	<option value="Christian">Christian</option>
	<option value="Jain">Jain</option>
	<option value="Buddhist">Buddhist</option>	
	</select><br><br>

	Origin:
	<select id="state" name="State" required onchange="changecity(2)">
	<option id="statedefault" value=<?php echo $_SESSION['pefstate'] ?>> <?php echo $_SESSION['pefstate'] ?></option>
	<option value="Maharashtra">Maharashtra</option>
	<option value="Madhya Pradesh">Madhya Pradesh</option>
	<option value="Gujrat">Gujrat</option>
	</select>

	<select id="city" name="city" required>
	<option id="citydefault" value=<?php echo $_SESSION['pefcity'] ?>> <?php echo $_SESSION['pefcity'] ?></option>
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
	<input type="radio" name="occu" <?php if($_SESSION['pefoccupation']=="Working") {echo "checked";} ?> value="Working" required>Working
	<input type="radio" name="occu" <?php if($_SESSION['pefoccupation']=="Studying") {echo "checked";} ?> value="Studying" required>Studying
	<br><br>
	
	

	
	Smoking:
	<input type="radio" name="sm" <?php if($_SESSION['pefsmoking']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
	<input type="radio" name="sm" <?php if($_SESSION['pefsmoking']=="Occasionally") {echo "checked";} ?> value="Occasionally">Occasionally	
	<input type="radio" name="sm" <?php if($_SESSION['pefsmoking']=="No") {echo "checked";} ?> value="No">No
	<br><br>
	
	Drinking:
	<input type="radio" name="dr" <?php if($_SESSION['pefdrinking']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
	<input type="radio" name="dr" <?php if($_SESSION['pefdrinking']=="Occasionally") {echo "checked";} ?> value="Occasionally">Occasionally	
	<input type="radio" name="dr" <?php if($_SESSION['pefdrinking']=="No") {echo "checked";} ?> value="No">No
	<br><br>
	
	Do you host parties?:
	<input type="radio" name="pa" <?php if($_SESSION['pefparties']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
	<input type="radio" name="pa" <?php if($_SESSION['pefparties']=="Occasionally") {echo "checked";} ?> value="Occasionally" required>Occasionally	
	<input type="radio" name="pa" <?php if($_SESSION['pefparties']=="No") {echo "checked";} ?> value="No" required>No
	<br><br>
	
	Visitors:
	<input type="radio" name="vi" <?php if($_SESSION['pefvisitors']=="Male") {echo "checked";} ?> value="Male" required>Male Friends
	<input type="radio" name="vi" <?php if($_SESSION['pefvisitors']=="Female") {echo "checked";} ?> value="Female" required>Female Friends
	<input type="radio" name="vi" <?php if($_SESSION['pefvisitors']=="Both male and female") {echo "checked";} ?> value="Both male and female" required>Both
	<input type="radio" name="vi" <?php if($_SESSION['pefvisitors']=="Only relatives") {echo "checked";} ?> value="Only relatives" required>Only Relatives
	<input type="radio" name="vi" <?php if($_SESSION['pefvisitors']=="None") {echo "checked";} ?> value="None" required>None
	<br><br>
	
	Eating Habits:
	<input type="radio" name="eh" <?php if($_SESSION['pefeat']=="Veg") {echo "checked";} ?> value="Veg" required>Veg
	<input type="radio" name="eh" <?php if($_SESSION['pefeat']=="Non-Veg") {echo "checked";} ?> value="Non-Veg" required>Non-veg	
	<input type="radio" name="eh" <?php if($_SESSION['pefeat']=="Both Veg and Non-Veg") {echo "checked";} ?> value="Both Veg and Non-Veg" required>Both
	<br><br>
	
	Food Arrangement:
	<input type="radio" name="fd" <?php if($_SESSION['peffoodarr']=="Cook") {echo "checked";} ?> value="Cook" required>Cook
	<input type="radio" name="fd" <?php if($_SESSION['peffoodarr']=="Mess") {echo "checked";} ?> value="Mess" required>Mess
	<br><br>
	
	Travelling Arrangement:
	<input type="radio" name="ta" <?php if($_SESSION['peftravel']=="Own Vehicle") {echo "checked";} ?> value="Own Vehicle" required>Own Vehicle
	<input type="radio" name="ta" <?php if($_SESSION['peftravel']=="Public Transport") {echo "checked";} ?> value="Public Transport" required>Public Transport
	<br><br>
	

	Sleep habits:
	<input type="radio" name="sh" <?php if($_SESSION['pefsleep']=="Day person") {echo "checked";} ?> value="Day person" required>Day Person
	<input type="radio" name="sh" <?php if($_SESSION['pefsleep']=="Night person") {echo "checked";} ?> value="Night person" required>Night Person
	<br><br>
	
	Hobbies:
	<input id="hobby" type="text" name="hobbies" placeholder="Max 100 Characters" maxlength="100" columns="50" rows="4" value=<?php echo $_SESSION['pefhobbies'] ?> required><br><br>


	<?php }
		else
		{?>
			<h3><b><u>Rent:</h3></b></u>
		<hr><br>
		Total rent : 
		<select name="rent" required>
			<option value=<?php echo $_SESSION['flatrent'] ?>><?php echo $_SESSION['flatrent'] ?></option>

			<option value="2000">2000-2499</option>
			<option value="2500">2500-2999</option>
			<option value="3000">3000-3499</option>
			<option value="3500">3500-3999</option>
			<option value="4000">4000-4499</option>
			<option value="4500">4500-4999</option>
			<option value="5000">5000-5499</option>
			<option value="5500">5500-5999</option>
			<option value="6000">6000-6499</option>
			<option value="6500">6500-6999</option>
			<option value="7000">7000-7499</option>
			<option value="7500">7500-7999</option>
			<option value="8000">8000-8499</option>
			<option value="8500">8500-8999</option>
			<option value="9000">9000-9499</option>
			<option value="9500">9500-9999</option>
			<option value="10000">10000-10499</option>
			<option value="10500">10500-10999</option>
			<option value="11000">11000-11499</option>
			<option value="11500">11500-11999</option>
			<option value="12000">12000-12499</option>
			<option value="12500">12500-12999</option>
			<option value="13000">13000-13499</option>
			<option value="13500">13500-13999</option>
			<option value="14000">14000-14499</option>
			<option value="14500">14500-14999</option>
			<option value="15000">15000-15499</option>
			<option value="15500">15500-15999</option>
			<option value="16000">16000-16499</option>
			<option value="16500">16500-16999</option>
			<option value="17000">17000-17499</option>
			<option value="17500">17500-17999</option>
			<option value="18000">18000-18499</option>
			<option value="18500">18500-18999</option>
			<option value="19000">19000-19499</option>
			<option value="19500">19500-19999</option>
			<option value="20000">20000+</option>
		</select><br><br>
		
		
		Deposit : 
		<input type="number" name="deposit" placeholder="Amount in INR" value=<?php echo $_SESSION['flatdeposit'] ?> required><br><br>
		
		<h3><b><u>Address :</h3></b></u>
		<hr><br>
		Flat number : 
		<input type="text" name="fno" value=<?php echo $_SESSION['flatfno'] ?> required><br><br>
		
		Building name : 
		<input type="text" name="bname" value=<?php echo $_SESSION['flatbname'] ?> required><br><br>
		
		Street name : 
		<input type="text" name="sname" value=<?php echo $_SESSION['flatsname'] ?> required><br><br>
		
		Area : 
		<select name="area" required>
			<option value=<?php echo $_SESSION['flatarea'] ?>><?php echo $_SESSION['flatarea'] ?></option>
			<option name="a" value="Kothrud">Kothrud</option>
			<option name="a" value="Koregaon Park">Koregaon Park</option>
			<option name="a" value="Kalyaninagar">Kalyaninagar</option>
			<option name="a" value="Pimpri">Pimpri</option>
			<option name="a" value="Nigdi">Nigdi</option>
			<option name="a" value="Bhosri">Bhosri</option>
			<option name="a" value="Shivajinagar">Shivajinagar</option>
		</select><br><br>

		Zip :
		<input type="number" name="zip" min="111111" max="999999" value=<?php echo $_SESSION['flatzip'] ?> required>
		<br><hr>

		Size : 
		<input type="number" name="size" placeholder="_square feet" value=<?php echo $_SESSION['flatsize'] ?> required><br><br>

		Rooms : 
		<input type="number" name="rooms" placeholder="Bedrooms" value=<?php echo $_SESSION['flatrooms'] ?> required min="1" max="6"><br><br>

		Furnishing : 
		<input type="radio" name="fur" <?php if($_SESSION['flatfur']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
		<input type="radio" name="fur" <?php if($_SESSION['flatfur']=="No") {echo "checked";} ?> value="No" required>No<br><br>

		AC : 
		<input type="radio" name="ac" <?php if($_SESSION['flatac']=="Yes") {echo "checked";} ?>  value="Yes" required>Yes
		<input type="radio" name="ac" <?php if($_SESSION['flatac']=="No") {echo "checked";} ?> value="No" required>No<br><br>

		Electric backup : 
		<input type="radio" name="eb" <?php if($_SESSION['flateb']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
		<input type="radio" name="eb" <?php if($_SESSION['flateb']=="No") {echo "checked";} ?> value="No" required>No<br><br>

		Water supply : 
		<input type="radio" name="ws" <?php if($_SESSION['flatws']=="Once a day") {echo "checked";} ?> value="Once a day" required>Once a day
		<input type="radio" name="ws" <?php if($_SESSION['flatws']=="Twice a day") {echo "checked";} ?> value="Twice a day" required>Twice a day
		<input type="radio" name="ws" <?php if($_SESSION['flatws']=="All day") {echo "checked";} ?> value="All day" required>All day<br><br>

		Availability :
		<select name="availability">
			<option value=<?php echo $_SESSION['flatavailability'] ?>><?php echo $_SESSION['flatavailability'] ?></option>
			<option name="avail" value="6 months">6 months</option>
			<option name="avail" value="1 year">1 year</option>
			<option name="avail" value="1.5 years">1.5 years</option>
			<option name="avail" value="2 years or more">2 years or more</option>
		</select><br><br>

		Vacancy :
		<select name="vacancy">
			<option value=<?php echo $_SESSION['flatvacancy'] ?>><?php echo $_SESSION['flatvacancy'] ?></option>
			
			<option name="vac" value="1">1</option>
			<option name="vac" value="2">2</option>
			<option name="vac" value="3">3</option>
			<option name="vac" value="4">4</option>
			<option name="vac" value="5">5</option>
			<option name="vac" value="6">6</option>
			<option name="vac" value="7">7</option>
			<option name="vac" value="8">8</option>
			<option name="vac" value="9">9</option>
		</select><br><br>
		
		<h3><b><u>Society:</h3></b></u>
		<hr><br>
		Security :
		<input type="radio" name="sec" <?php if($_SESSION['flatsec']=="Yes") {echo "checked";} ?> value="Yes" required>Yes
		<input type="radio" name="sec" <?php if($_SESSION['flatsec']=="No") {echo "checked";} ?> value="No" required>No<br><br>
		
		Parking :
		<input type="radio" name="parking" <?php if($_SESSION['flatparking']=="Car") {echo "checked";} ?> value="Car" required>Car
		<input type="radio" name="parking" <?php if($_SESSION['flatparking']=="Bike") {echo "checked";} ?> value="Bike" required>Bike
		<input type="radio" name="parking" <?php if($_SESSION['flatparking']=="None") {echo "checked";} ?> value="None" required>None
		<hr><br><br>
<?php
		} ?>

		</div>
	<div class="sub">
	<input id="sub" type="submit" value="Save & Continue">
	</div>

	</form>
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
	
