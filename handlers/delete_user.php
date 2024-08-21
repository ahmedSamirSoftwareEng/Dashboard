<?php

include_once('classes.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) ) {

    $email = trim($_POST['email']);

    try {
        $dbConnection = new DbManager();
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    

    $dbConnection->delete_user_image($email);

   $dbConnection->delete_user($email);

    header('Location: ../home.php');
}

?>