<?php

include "../connection.php";

// Set Access-Control-Allow-Origin header
header("Access-Control-Allow-Origin: *");

// Check if 'email' and 'password' parameters are set
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = filterRequest("email");
    $password = filterRequest("password");

    // Set Content-Type header for JSON response
    header("Content-Type: application/json; charset=UTF-8");

    $stmt = $connection->prepare("SELECT email , id FROM users WHERE `password` = ? AND `email` = ?");
    $stmt->execute(array($password , $email));

    $data = $stmt -> fetch(PDO::FETCH_ASSOC) ; 

    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "success" , "data" => $data));
    } else {
        echo json_encode(array("status" => "failed"));
    }
} else {
    // Return an error response if 'email' or 'password' is not set
    echo json_encode(array("error" => "Missing required parameters"));
}
?>