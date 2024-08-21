<?php
include_once('classes.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
  
    $email = $_POST['email'];
    // echo $email;

    $dbConnection = new DbManager();

    $user= $dbConnection->get_user_by_email($email);

    // print_r($user);

}


?>