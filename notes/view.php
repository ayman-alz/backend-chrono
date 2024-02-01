<?php

include "../connection.php";

// Set Access-Control-Allow-Origin header
header("Access-Control-Allow-Origin: *");


    $userid = filterRequest("id");

    // Set Content-Type header for JSON response
    header("Content-Type: application/json; charset=UTF-8");

    $stmt = $connection->prepare("SELECT * FROM notes WHERE note_user = ? ");
    $stmt->execute(array($userid));

    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC) ; 

    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "success" , "data" => $data));
    } else {
        echo json_encode(array("status" => "failed"));
    }

?>