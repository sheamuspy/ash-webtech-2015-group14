<?php

	if(!isset($_REQUEST['cmd'])){
		exit();
	}
	$cmd=$_REQUEST['cmd'];
	
	switch($cmd){
	
		case 1:
			add_equipment();
			break;
		case 2:
			edit_equipment();
			break;
		case 3:
			delete_equipment();
			break;
		default:
			break;
	
	}
	
	
	function add_equipment(){
	if(isset($_REQUEST['en'])){
			include_once("equipment.php");
			$obj = new equipment();
			if(!$obj->connect()){
				echo '{"result":0,"message":"Sorry we could not connect to the database."}';
			}
			$name=$_REQUEST['en'];
            $serial_number=$_REQUEST['sn'];
            $inventory_number=$_REQUEST['in'];
			$lab_id=$_REQUEST['lid'];
			$date_purchased=$_REQUEST['dp'];
			$supplier_id=$_REQUEST['sid'];
			$description=$_REQUEST['ed'];
		
			if(!$obj->add_equipment($serial_number, $inventory_number, $name, $lab_id, $date_purchased, $supplier_id, $description)) {
				echo '{"result":0,"message":"Sorry we could not execute the query."}';
                
			}else{
				echo '{"result":1,"message":"New equipment successfully added."}';
			}	
		}
		
	}
	function edit_equipment(){
		if(isset($_REQUEST['en'])){
			include_once("equipment.php");
			$obj = new equipment();
			if(!$obj->connect()){
				echo '{"result":0,"message":"Sorry we could not connect to the database."}';
			}
			$eid =$_REQUEST['eid'];
			$name=$_REQUEST['en'];
            $serial_number=$_REQUEST['sn'];
            $inventory_number=$_REQUEST['in'];
			$lab_id=$_REQUEST['lid'];
			$date_purchased=$_REQUEST['dp'];
			$supplier_id=$_REQUEST['sid'];
			$description=$_REQUEST['ed'];
		
			if(!$obj->edit_equipment($eid,$serial_number, $inventory_number, $name, $lab_id, $date_purchased, $supplier_id, $description)) {
				echo '{"result":0,"message":"Sorry we could not execute the query."}';
                
			}else{
				echo '{"result":1,"message":"Equipment successfully edited."}';
			}	
		}
		
	}
	
	function delete_equipment(){
		include_once("equipment.php");
			$obj = new equipment();
			if(!$obj->connect()){
				echo '{"result":0,"message":"Sorry we could not connect to the database."}';
			}
			$eid =$_REQUEST['eid'];
			if(!$obj->delete_equipment($eid)) {
				echo '{"result":0,"message":"Sorry we could not execute the query."}';
                
			}else{
				echo '{"result":1,"message":"Equipment successfully deleted."}';
			}
	}
	
?>