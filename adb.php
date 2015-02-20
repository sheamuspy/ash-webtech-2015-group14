<?php
	class adb{
		var $server = "localhost";
		var $database = "webtech";
		var $user = "root";
		var $password = "";
		var $link = false;
		var$result = false;

		function adb(){}

		function connect(){


			$this->link = mysql_connect($this->server,$this->user,$this->password);
			if($this->link ==false){
				return false;
			}
			if(!mysql_select_db($this->database,$this->link)){
				return false;
			}
			return true;
		}

		function query($str_query){
			return mysql_query($str_query);

		}

		function fetch($result){
			return mysql_fetch_assoc($this->result);
		}

		function close(){
			mysql_close($this->link);
		}

	}
?>