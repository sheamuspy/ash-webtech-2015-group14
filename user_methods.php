<?php
	$cmd = $_REQUEST['cmd'];
	include("users");
	switch(cmd){
		case 1:
		include("users.php");
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$obj= new user();
		$obj->connect();
		$obj->user_password_validation();
		
		if($row=$obj->fetch()){
			echo'{"status":1, "message":"User found"}';
		}else{
			echo'{"status":0, "message":"User not found"}';
		}
		default:
	
	}
	
?>