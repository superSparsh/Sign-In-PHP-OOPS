<?php
class signin{
	private $servername = "localhost";
	private $username = "testing";
	private $password = "";
	private $dbname = "testdb";
	private $mysqli;
	
	function __construct(){
		$this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($this->mysqli->connect_error){
			echo "Failed to connect to Mysql:".$this->mysql->connect_error;
		}
	}
	function tableExists($tableName){
			$sql = "SHOW TABLES FROM $this->dbname LIKE '$tableName'";
			$run = $this->mysqli->query($sql);
			if($run->num_rows == 1){
				echo "Table Exists";
			}else{
				echo $this->mysqli->error;
			}
		}
	function userAvailabilty($tableName,$email){
		$sql = "SELECT `email` FROM `$tableName` WHERE email = '$email'";
		$run = $this->mysqli->query($sql);
		if($run->num_rows >= 1){
			return $run;
		}else{
			echo $this->mysqli->error;
		}	
	}
	function sign($tableName,$fname,$lname,$email,$password){
		if(!$this->userAvailabilty($tableName,$email)){	
			$sql = "INSERT INTO `$tableName`(`fname`, `lname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')";
			$run = $this->mysqli->query($sql);
			return $run;
		}else{
			echo $this->mysqli->error; 
		}
	}
}
?>
