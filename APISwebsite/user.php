<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "user";
  
    // object properties - Table columns
    public $firstname;
    public $lastname;
    public $email;
    public $message;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = "SELECT * FROM ". $this->table_name;
        
         // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

public function read1($email) {
    
       $query = "SELECT * FROM `user` WHERE `Email` LIKE  '$email' ";
        
         // prepare query statement

        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    function create(){
  
        // query to insert record

        $query = "INSERT INTO user
                    SET
                    FirstName=:firstnameplaceholder, 
                    LastName=:lastnamesplaceholder,  
                    Email=:emailplaceholder,
                    Message=:messagesplaceholder";
        
        // prepare query
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->message=htmlspecialchars(strip_tags($this->message));
        
      
        // bind values
        $stmt->bindParam(":firstnameplaceholder", $this->firstname);
        $stmt->bindParam(":lastnamesplaceholder", $this->lastname);
        $stmt->bindParam(":emailplaceholder", $this->email);
        $stmt->bindParam(":messagesplaceholder", $this->message);
        
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }
    
}
?>