<?php

	$cmd = $_REQUEST['cmd'];
	
	switch($cmd){
	case 1:
		include("transaction.php");
	
		$obj = new transaction();
		$obj->connect();
		$obj->select_transactions();
		echo "<tr class='header'>
						<td>column1</td>
						<td>column2</td>
						<td>column3</td>
						<td>column4</td>
					</tr>";
		$row;
		$count = 0;
		while($row = $obj->fetch()){
			
			if($count==0){
				$class = "row1";
				$count = 1;
			}else{
				$class = "row2";
				$count = 0;
			}
			echo "<tr class=$class onclick='veiwTransaction({$row['transaction_id']})'>";
			echo "<td>{$row['user_name']}</td><td>{$row['equipment_name']}</td><td>{$row['transaction_date']}</td><td>{$row['purpose']}</td>";
			echo "</tr>";
		}
		
	case 2:
		$id=$_REQUEST['id'];
		include("transaction.php");
		$obj= new transaction();
		$obj->connect();
		$obj->get_transaction($id);
		
		$transaction=$obj->fetch();
		echo "<table>";
		echo "<tr><td>Person that completed the transaction</td><td>{$transaction['user_name']}</td></tr>";
		echo "<tr><td>Equipment that was blah blah</td><td>{$transaction['equipment_name']}</td></tr>";
		echo "<tr><td>date of blah blah</td><td>{$transaction['transaction_date']}</td></tr>";
		echo "<tr><td>What was done</td><td>{$transaction['purpose']}</td></tr>";
		echo "</table>";
		
		
	default:
	
	
	}
?>