<html>
	<head>
		<title>Add Equipment</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body>
	<form method="Get" action="addequipment.php">
		<table>
			<tr>
				<td>Equipment Name: </td><td><input type="text" name="en" size="30"></td>
			</tr>
			<tr>
				<td>Serial Number: </td><td><input type="text" name="sn" size="30"></td>
			</tr>
			<tr>
				<td>Inventory Number: </td><td><input type="text" name="in" size="30"></td>
			</tr>
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
			<tr>
				<td>Date Purchased:</td><td> <input type="date" name="dp" size="30"></td>
			</tr>
			<tr>
				<td>Supplier ID:</td><td> <select name="sid">
								<option value="0">--Select Supplier--</option>
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
				<td>Description:</td> <td><textarea name="ed" cols="30" rows="5"></textarea></td>
			<tr><td>
				</td><td><input type="submit" name="do" value="ADD"></td>
			</tr>
		</table>
	</form>
	</body>
</html>