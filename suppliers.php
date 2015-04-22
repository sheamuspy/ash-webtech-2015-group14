<?php
	include_once("adb.php");
	
	class suppliers extends adb{
		
		function suppliers(){}
		
		function get_suppliers(){
			$str_query="SELECT * FROM webtech_project_supplier";
			return $this->query($str_query);
		}
	
	}
	
?>