<?php

include_once('classes.php');





$db_connection= new DbManager();


$users = $db_connection->getAllUsers();

// print_r($users);




?>