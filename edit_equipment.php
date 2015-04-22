<html>
	<head>
		<title>Add Equipment</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body>
		<?php
			if(!isset($_REQUEST['eid'])){
				exit();
			}		
				include("equipment.php");
				$obj = new equipment();
				$eid=$_REQUEST['eid'];		
				if(!$obj->view_equipment($eid)) {
					echo "Error Editing Equipment";
					exit();
				}else{
					$row=$obj->fetch();
				}
			?>
	<form method="Get" action="page.php">
		<table>
			<tr>
			<td>Equipment Name:</td><td> <input type="text" value="<?php echo $row['equipment_name']?>" name="en"></td>
			</tr>
			<tr>
			<td>Serial Number: </td><td><input type="text" value="<?php echo $row['serial_number']?>" name="sn"></td>
			</tr>
			
			<tr>
			<td>Inventory Number:</td><td> <input type="text" value="<?php echo $row['inventory_number']?>" name="in"></td>
			</tr>
			<tr>
			<td>Lab ID:</td><td><select name="lid">
						<option value="0">--Select Lab--</option>
						<?php
							include_once("labs.php");
							$sup=new labs();
							$sup->get_labs();
							while($sup_row=$sup->fetch()){
								
								if($sup_row['lab_id']==$row['lab_id']){
									echo "<option value='{$sup_row['lab_id']}' selected>{$sup_row['lab_name']}</option>";
								}else{
									echo "<option value='{$sup_row['lab_id']}'>{$sup_row['lab_name']}</option>";
								}
								
							}
						?>
						</td>
			</tr>
			<tr>
			<td>Date Purchased:</td><td> <input type="date" value="<?php echo $row['date_purchased']?>" name="dp"></td>
			</tr>
			<tr>
			<td>Supplier ID:</td><td> <select name="sid">
							<?php
							include_once("suppliers.php");
							$sup=new suppliers();
							$sup->get_suppliers();
							while($sup_row=$sup->fetch()){
								
								if($sup_row['supplier_id']==$row['supplier_id']){
									echo "<option value='{$sup_row['supplier_id']}' selected>{$sup_row['supplier_name']}</option>";
								}else{
									echo "<option value='{$sup_row['supplier_id']}'>{$sup_row['supplier_name']}</option>";
								}
								
							}
						?>
			</td>
			</tr>
			<tr>
			<td>Description: </td><td><textarea name="ed" cols="30" rows="5"><?php echo $row['description']?></textarea></td>
			</tr>
			<tr><td></td><td>
			<input type="submit" name="do" value="Edit"></td>
			</tr>
		</table>
	</form>
		
	</body>
</html>