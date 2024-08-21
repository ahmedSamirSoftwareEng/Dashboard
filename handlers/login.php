<?php

include_once('classes.php');


$errors=[];





if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

        try {
            $dbConnection= new DbManager();
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        if($dbConnection->login($email, $password)){
            
            header('Location: home.php');
        }else{
            $errors['emailOrPass'] = "Invalid email or password";
        }
        
}


?>