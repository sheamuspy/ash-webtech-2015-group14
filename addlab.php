<?php
		if(isset($_REQUEST['ln'])){
			include("labs.php");
			$obj = new labs();
			$name = $_REQUEST['ln'];
			$department_head=$_REQUEST['dh'];
			$location=$_REQUEST['ll'];
			$obj->add_lab($name,$department_head,$location);
			header("Location: labpage.php");
		}
		?>
<html>
	<head>
		<title>Add Lab</title>
		<link rel="stylesheet" href="style.css">                                       
		<script>
		</script>
	</head>
	<body>
		<form method="GET" action="addlab.php">
			<div>Lab Name :<input type="text" id="name" name="ln"></div>
			<div>Department Head :<input type="text" id="dephead" name="dh"</div>
			<div>Location:<input type="text" id="loc" name="ll"> </div>
			<input type="submit" name="do" value="ADD">
			<br>
		</form>
	</body>
</html>