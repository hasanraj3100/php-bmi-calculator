<?php 

session_start();  

if(isset($_SESSION['username'])) {
    header('Location: /');
}

$db = new Database(["host"=> "localhost", "port" => 3306, "dbname"=>"BMI_PHP_APP"]); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = []; 

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        $errors['body'] = "Username or password cannot be empty"; 
        return require "views/login.view.php"; 
    }

    // Check user in the database
    $query = "SELECT * FROM AppUsers WHERE Username = ?;";
    $stmt = $db->query($query, [$username]); 
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['Password'])) {
      
        $_SESSION['username'] = $user['Username'];
        header('Location: /'); 
        exit();
    } else {
        $errors['body'] = "Invalid Username or Password"; 
    }
}

require "views/login.view.php"; 