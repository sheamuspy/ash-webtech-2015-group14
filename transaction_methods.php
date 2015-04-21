<?php
	if(!isset($_REQUEST['cmd'])){
		include("transaction.php");
	
		$obj = new transaction();
		$obj->connect();
		$obj->select_transactions();
		$table_row="<tr class='header'><td>Name</td><td>Equipment</td><td>Date of transaction</td><td>Purpose</td></tr>";
		$row;
		$row_indicator = 0;
		$count=0;
		while($row = $obj->fetch()){
			
			if($row_indicator==0){
				$class = 'row1';
				$row_indicator = 1;
			}else{
				$class = 'row2';
				$row_indicator = 0;
			}
			$table_row=$table_row."<tr class=$class onclick='veiwTransaction({$row['transaction_id']})'>";
			$table_row=$table_row."<td>{$row['user_name']}</td><td>{$row['equipment_name']}</td><td>{$row['transaction_date']}</td><td>{$row['purpose']}</td>";
			$table_row=$table_row."</tr>";
			$count++;
		}
		echo $table_row;
		exit();
	}

	$cmd = $_REQUEST['cmd'];
	
	switch($cmd){
	case 1:
		include("transaction.php");
	
		$obj = new transaction();
		$obj->connect();
		$obj->select_transactions();
		$table_row="<tr class='header'><td>Name</td><td>Equipment</td><td>Date of transaction</td><td>Purpose</td></tr>";
		$row;
		$row_indicator = 0;
		$count=0;
		while($row = $obj->fetch()){
			
			if($row_indicator==0){
				$class = 'row1';
				$row_indicator = 1;
			}else{
				$class = 'row2';
				$row_indicator = 0;
			}
			$table_row=$table_row."<tr class=$class onclick='veiwTransaction({$row['transaction_id']})'>";
			$table_row=$table_row."<td>{$row['user_name']}</td><td>{$row['equipment_name']}</td><td>{$row['transaction_date']}</td><td>{$row['purpose']}</td>";
			$table_row=$table_row."</tr>";
			$count++;
		}
		echo '{"status":1, "numRows":'.$count.', "message":"'.$count.' results found","tabrow":"'.$table_row.'"}';
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
				
			case 1:
				$obj->select_transactions_by_equipment($search_txt);
				break;
			case 2:
				$obj->select_transactions_by_date($search_txt);
				break;
			case 3:
				$obj->select_transactions_by_name($search_txt);
				break;
			default:
		
		}
		
		$table_row="<tr class='header'><td>Name</td><td>Equipment</td><td>Date of transaction</td><td>Purpose</td></tr>";
		$row;
		$row_indicator = 0;
		$count=0;
		while($row = $obj->fetch()){
			
			if($row_indicator==0){
				$class = 'row1';
				$row_indicator = 1;
			}else{
				$class = 'row2';
				$row_indicator = 0;
			}
			$table_row=$table_row."<tr class=$class onclick='veiwTransaction({$row['transaction_id']})'>";
			$table_row=$table_row."<td>{$row['user_name']}</td><td>{$row['equipment_name']}</td><td>{$row['transaction_date']}</td><td>{$row['purpose']}</td>";
			$table_row=$table_row."</tr>";
			$count++;
		}
		echo '{"status":1, "numRows":'.$count.', "message":"'.$count.' results found with \"'.$search_txt.'\"","tabrow":"'.$table_row.'"}';
		break;
		
		
	default:
	
	
	}
?>