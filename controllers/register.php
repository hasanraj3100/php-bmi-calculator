<?php 

$db = new Database(["host"=> "localhost", "port" => 3306, "dbname"=>"BMI_PHP_APP"]); 


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = []; 

    $username = $_POST['username']; 
    $password = $_POST['password']; 


    if(empty($username) || empty($password)) {
        $errors['body'] = "Username or password can not be empty"; 
        return require "views/register.view.php"; 
    }

    $query = "SELECT COUNT(*) FROM AppUsers WHERE Username = ? ;";
    $stmt = $db->query($query, [$username]); 
    $userexists = $stmt->fetchColumn(); 

    if($userexists) {
        $errors['body'] = "Username already exists. Please choose another one";
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT); 

        $query = "INSERT INTO AppUsers (Username, Password) VALUES(?, ?);";
        $stmt = $db->query($query, [$username, $password]);
        header('Location: /');
    }

    

}


require "views/register.view.php"; 