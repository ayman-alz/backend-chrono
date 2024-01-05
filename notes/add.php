<?php

include "../connection.php";

$title = filterRequest("title");
$content = filterRequest("content");
$userid = filterRequest("id");


$imagename = imageUpload("file") ; 

if ($imagename != 'fail') {


    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    $stmt = $connection->prepare("INSERT INTO `notes` (`note_title`, `note_content` , `note_user` , `note_image`) 
    VALUES (?, ? , ?, ?)");
    $stmt->execute([$title, $content , $userid , $imagename]);
    $count = $stmt->rowCount();
    
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failed"));
    }

}
else {
    echo json_encode(array("status" => "failed"));

}


?>