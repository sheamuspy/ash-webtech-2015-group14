<?php
include_once("adb.php");

class labs extends adb{

	function labs(){}
	
	function get_labs(){
		$str_query="SELECT * FROM webtech_project_labs";
		
		return $this->query($str_query);
	}

}

?>