<?php
	$r=$_POST['in'];

	/*echo $r;*/
	if($r=="PWOF")
	{
		header("refresh:0;url=pwof.html");
	}

	else if($r=="PWF")
	{
		header("refresh:0;url=pwf.html");
	}
?>