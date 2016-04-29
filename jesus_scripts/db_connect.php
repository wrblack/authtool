<?php
class DB_CONNECT{
	//constructor
	function __construct(){
		//connect to database
		$this->connect();
	}
	//destructor
	function __destruct(){
		//close db connection
		$this->close();
	}
	/*
	* Functions to connnect to database
	*/
	function connect(){
		//import database connection variables
		require_once __DIR__ . '/db_config.php';

		//connect to mysql databse
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());

		//select databse
		$db=mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());

		//return connection cursor
		return $con;
	}

	function close(){
		mysql_close();
	}


}
?>
