<?php
	
	include("adb.php");

	class users extends adb{

		function users(){}

		function add_user($name, $status, $contact){
			$str_query = "INSERT INTO webtech_project_users SET 
							user_name = '$name',
							user_status = '$status',
							user_contact = '$contact'";
			return $this->query($str_query);
		}

		function update_user($id, $name, $status, $contact){
			$str_query = "UPDATE webtech_project_users SET
							user_name = '$name',
							user_status = '$status',
							user_contact = '$contact',
							WHERE user_id = '$id'";
			return $this->query($str_query);
		}

		function delete_user(){

		}

		function select_user(){

		}

	}
?>