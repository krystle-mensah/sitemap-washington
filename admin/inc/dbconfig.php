<?php

// database template
Class Database{
 // Here we have the database type and the host and the database name.
	private $server = "mysql:host=localhost;dbname=law";
	private $username = "root";
  private $password = "";
  // options on how I want to handle errors and fetch data.
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
  // then we have a protected connection property
  protected $connection;
 	//then we have a method
	public function open(){
 		try{
    //this code
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
    }
    // and catch if there is a problem with a message
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
  }
  // then close connection
	public function close(){
    //The var has not been initialized.
   	$this->conn = null;
 	}
}

// pdo is an instance of the database class
$pdo = new Database();

?>