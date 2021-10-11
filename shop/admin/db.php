<?php 
include "db_const.php";

class Database{
    
    public $conn;
    
    public function __construct(){
        
        $this->openDbConnection();
    }
    
    public function openDbConnection(){
        $this->conn= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
        if($this->conn->connect_errno){
            die("Database connection failed! " . $this->conn->connect_error);
            
        }
    }
    
    public function make_query($sql){
        $result=$this->conn->query($sql);
        return $result;
        
    }
    
	public function last_insert_id(){

		
		return $this->conn->insert_id;

    }
    
} //End of class Database


$database= new Database();






?>
    
    





