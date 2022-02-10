<?php
// include database and object files
include_once 'connection.php'; //Connect to Database
include_once 'user.php'; //Connect to Table
include_once 'header.php'; //Connects to header.php 
  
// instantiate database and contactus
$database = new Database(); // 1. Connect to database

$db = $database->getConnection();
  
// initialize object
$user = new User($db); // 2. Connect to table





// read user will be here

 /* try{
    $stmt = $user->read();  // 3. Read the table rows
    $num = $stmt->rowCount(); // 4. Count number of rows in table
  }catch(Exception $exception){
    echo $exception->getMessage();
}*/     


 $stmt = $user->read();      // 3. Read the table rows

$num = $stmt->rowCount();    // 4. Count number of rows in table

//echo "Number of rows:". $num;

// check if more than 0 record found

if($num > 0){ //Number of rows in table > 0
  
    // users array
    $user_arr=array();
    //$user_arr["users"]=array();
  
    $number = 1;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // extract row
        // this will make $row['name'] to
        // just $name only

        extract($row);

        $user_item=array(
            "firstName" => $row['First Name'],
            "lastName" =>  $row['Last Name'],
            "email" => $row['Email'],
            "message" => $row['Message'],
            "srno" => $number++
            //"image" => $row['image'],
        );
  
        array_push($user_arr, $user_item);
    }
  

    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($user_arr);


}else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No users found.")
    );
}
  
// no products found will be here
?>