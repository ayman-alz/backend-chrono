<?php

include "../connection.php" ; 


$noteid = filterRequest("id"); 

$imagename = filterRequest("imagename") ; 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$stmt = $connection->prepare("DELETE FROM notes WHERE note_id = ? ");
$stmt-> execute(array( $noteid)); 
$count = $stmt-> rowCount();

if($count > 0 ) {
        deleteFile("../upload", $imagename);
         echo json_encode(array("status" => "success")); 
}
 else {
        echo json_encode(array("status" => "failed"));     
    }
    ?>
    