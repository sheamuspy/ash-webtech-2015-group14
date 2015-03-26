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
		break;
		
	case 2:
		$id=$_REQUEST['id'];
		include("transaction.php");
		$obj= new transaction();
		$obj->connect();
		$obj->get_transaction($id);
		
		$transaction=$obj->fetch();
		$response = "<table>";
		$response = $response."<tr><td>Person that completed the transaction</td><td>{$transaction['user_name']}</td></tr>";
		$response = $response."<tr><td>Equipment that was blah blah</td><td>{$transaction['equipment_name']}</td></tr>";
		$response = $response."<tr><td>date of blah blah</td><td>{$transaction['transaction_date']}</td></tr>";
		$response = $response."<tr><td>What was done</td><td>{$transaction['purpose']}</td></tr>";
		$response = $response."</table>";
		echo $response;
		break;
		
	case 3:
	
		$search_by = $_REQUEST['sb'] ;
		$search_txt = $_REQUEST['st'];
		include("transaction.php");
	
		$obj = new transaction();
		$obj->connect();
		switch($search_by){
			case 0:
				$obj->select_transactions_by_date($search_txt);
				break;
			case 1:
				$obj->select_transactions_by_equipment($search_txt);
				break;
			case 2:
				$obj->select_transactions_by_name($search_txt);
				break;
			default:
		
		}
		
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
		
		
	default:
	
	
	}
?>