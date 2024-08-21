<?php


class Validator {
    private $data;
    private $errors = [];

    public function __construct($post_data) {
        $this->data = $post_data;
    }

    public function validate() {
        $this->validateName();
        $this->validateEmail();
        $this->validatePassword();
        $this->validateConfirmPassword();
        $this->validateProfilePicture();


        return $this->errors;
    }

    private function validateName() {
        if (empty($this->data['name'])) {
            $this->errors['name'] = "Name is required";
        }
    }

    private function validateEmail() {
        $email = trim($this->data['email']);
        if (empty($email)) {
            $this->errors['email'] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email address";
        }
    }

    private function validatePassword() {
        if (empty($this->data['password'])) {
            $this->errors['password'] = "Password is required";
        } elseif (strlen($this->data['password']) < 8) {
            $this->errors['password'] = "Password must be at least 8 characters";
        }
    }

    private function validateConfirmPassword() {
        if (empty($this->data['confirmpassword'])) {
            $this->errors['confirmpassword'] = "Confirm password is required";
        } elseif ($this->data['password'] !== $this->data['confirmpassword']) {
            $this->errors['confirmpassword'] = "Passwords do not match";
        }
    }

    public function validateProfilePicture() {
        // check if a file was uploaded
        if (empty($_FILES['profilepicture']['name'])) {
            $this->errors['profilepicture'] = "Profile picture is required";
        }

        // check if the file is an image
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = pathinfo($_FILES['profilepicture']['name'], PATHINFO_EXTENSION);
        if (!in_array($fileExtension, $allowedExtensions)) {
            $this->errors['profilepicture'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        //save the file to the server
        if (empty($this->errors)) {
            // if folder does not exist, create it
            if (!is_dir('uploads')) {
                mkdir('uploads');
            }

            // save the file
            $destination = 'uploads/' . $_FILES['profilepicture']['name'];
            move_uploaded_file($_FILES['profilepicture']['tmp_name'], $destination);

            
        }
        
           

    }


  
}




class DbManager {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=PHP', 'root', 'Ahmed@123');
            // echo "Connected successfully";
        } catch (PDOException $e) {
            // echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getAllUsers() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    function insert_to_Db( $name, $email, $password, $imagename) {

        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password, imagename) VALUES (:name, :email, :password, :imagename)");
    
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':imagename', $imagename); 
        $stmt->execute();
        
    
    }

    function login( $email, $password) {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    function delete_user( $email) {

        $stmt = $this->pdo->prepare("DELETE FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    function delete_user_image( $email) {
        $stmt = $this->pdo->prepare("SELECT imagename FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $imageFilename = $stmt->fetchColumn();

        $imagePath = '../uploads/' . $imageFilename;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    function get_user_by_email($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    function update_user_name( $email, $name) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name WHERE email = :email");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
    function update_user_image( $email, $imagename) {
        $stmt = $this->pdo->prepare("UPDATE users SET imagename = :imagename WHERE email = :email");
        $stmt->bindParam(':imagename', $imagename);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}


?>