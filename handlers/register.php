<?php

include_once('classes.php');


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

    $validator = new Validator($_POST);
    $errors = $validator->validate();

    if (empty($errors)) {
       $db= new DbManager();

       $db->insert_to_Db($_POST['email'], $_POST['name'], $_POST['password'], $_FILES['profilepicture']['name']);

       header('Location: ../login.php');
       exit;
    }
        
    
}


?>