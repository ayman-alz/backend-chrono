<?php

include "../connection.php" ; 

$username = filterRequest("username"); 
$email = filterRequest("email"); 
$password = filterRequest("password"); 

$hashed_password = password_hash($password , PASSWORD_BCRYPT );

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$stmt = $connection->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?)");
$stmt-> execute(array($username , $email , $hashed_password  )); 
$count = $stmt-> rowCount();

if($count > 0 ) {

         echo json_encode(array("status" => "success")); 
}
 else {
        echo json_encode(array("status" => "failed"));     
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    
    ?>

    