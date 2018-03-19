<html>
<head>
<style>
div *{
	width:100px;
	height:100px;
	border:5px solid black;
}
</style>
</head>
<body>
	<form action="2.php" method="post" target="_blank">
	<input type="submit" name="sub" onsubmit="try();" >
	</form>	
	
	<script>
	function try()
	{
		window.close();
	}
	</script>
	</body>
</html>
