<?php

include_once('classes.php');


$db_connection = new DbManager();

$user = $db_connection->get_user_by_email($_POST['email']);

if (isset($_POST['email']) && isset($_POST['name']) ) {
    
    $db_connection->update_user_name($_POST['email'], $_POST['name']);
}
if (isset($_FILES['profile-picture'])) {
    if (!empty($_FILES['profile-picture']['name'])) {
        // check if the file is an image
        $validatePhoto = new Validator($_FILES['profile-picture']);
        // validate and save to folder
        $validatePhoto->validateProfilePicture();
   
        $db_connection->update_user_image($_POST['email'], $_FILES['profile-picture']['name']);
    }else{
        $db_connection->update_user_image($_POST['email'], $user['imagename']);
    }
}


header('Location: ../home.php');
