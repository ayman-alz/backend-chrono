<?php

include "connection.php" ; 

$stmt = $connection->prepare("SELECT * FROM users") ; 
$stmt-> execute(); 
$users = $stmt-> fetchAll (PDO::FETCH_ASSOC);

print_R($users);