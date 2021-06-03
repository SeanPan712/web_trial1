<?php


class CreateContactTb{
    public $dbhost;
    public $dbuser;
    public $password;
    public $con;
    public $tablename;
    public $dbname;
    
    // class constructor
    public function __construct(
        $dbname = "shadowdb",
        $tablename = "contactUs",
        $dbhost = "localhost",
        $username = "root",
        $password = ""
        )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->dbhost = $dbhost;
        $this->username = $username;
        $this->password = $password;
        
        // create connection
        $this->con = mysqli_connect($dbhost, $username, $password);
        
        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }
        
        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        
        // execute query
        if(mysqli_query($this->con, $sql)){
            
            $this->con = mysqli_connect($dbhost, $username, $password, $dbname);
            
            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR (100) NOT NULL,
                             email VARCHAR (100) NOT NULL,
                             inquiry VARCHAR (500) NOT NULL);";
            
            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }
            
        }else{
            return false;
        }
    }
    
    // get product from the database
    
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";
        
        $result = mysqli_query($this->con, $sql);
        
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}          