<?php
	
	
	function add(){
	if(isset($_REQUEST['en'])){
			include("equipment.php");
			$obj = new equipment();
			$name=$_REQUEST['en'];
            $serial_number=$_REQUEST['sn'];
            $inventory_number=$_REQUEST['in'];
			$lab_id=$_REQUEST['lid'];
			$date_purchased=$_REQUEST['dp'];
			$supplier_id=$_REQUEST['sid'];
			$description=$_REQUEST['ed'];
		
			if(!$obj->add_equipment($serial_number, $inventory_number, $name, $lab_id, $date_purchased, $supplier_id, $description)) {
				echo mysql_error();
                echo "Error Inserting Equipment";
                
			}else{
				echo "$name successfully added to inventory";
			}	
		}
		
	}
?>