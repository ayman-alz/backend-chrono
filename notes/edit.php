<?php

include "../connection.php" ; 

$note_id = filterRequest("id"); 
$title = filterRequest("title"); 
$content  = filterRequest("content"); 



header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$stmt = $connection->prepare("UPDATE `notes` 
SET `note_title`= ?, `note_content`= ?  WHERE `note_id` = ? ");
$stmt->execute([$title, $content, $note_id]);
$count = $stmt-> rowCount();

if($count > 0 ) {

         echo json_encode(array("status" => "success")); 
}
 else {
        echo json_encode(array("status" => "failed"));     
    }
    ?>