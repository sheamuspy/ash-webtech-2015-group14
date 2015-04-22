<?php
		if(isset($_REQUEST['ln'])){
		include_once("labs.php");
		$obj1 = new labs();$id=$_REQUEST['id'];
		$name=$_REQUEST['ln'];
		$dept_head=$_REQUEST['dh'];
		$loc=$_REQUEST['ll'];
		$obj1->edit_lab($id,$name,$dept_head,$loc);
		header('Location: labpage.php');
		}
	?>
<html>
	<head> 
		<title> Edit Lab</title>
		<link rel="stylesheet" href="style.css">
		<script>

		</script>
	</head>

	<body>
		<?php
		if(isset($_REQUEST['lab_id'])){
			require_once("labs.php");
			$lab_id = $_REQUEST['lab_id'];
			$obj = new labs();
			$obj->get_lab($lab_id);
			$row= $obj->fetch();

			$labname=$row['lab_name'];
			$dhead=$row['department_head'];
			$loc=$row['lab_location'];
		}
		?>
		<form method="get" action="editlab.php">
			<input type="hidden" name="id" value="<?php echo $lab_id; ?>">
			Lab Name :<input type="text" required name="ln" value="<?php echo $labname; ?>">
			<div>Department head :</div>
			<div>
			<input type="text" name="dh" required value="<?php echo $dhead; ?>">
			</div>
			<div>Location:<input type="text" required name="ll" value="<?php echo $loc; ?>"></div>
			<input type="submit" name="do" value="Update">
		</form>
	
	</body>
</html>