<?php 
session_start(); 

$heading = "Welcome, {$_SESSION['username']}"; 


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = []; 

    $name = $_POST["name"]; 
    $age = $_POST["age"]; 
    $gender = $_POST["gender"];
    $height = $_POST["height"];
    $weight = $_POST["weight"]; 
 


    if($height <= 0 || $weight <= 0 || $age <=0) {
        $errors['body'] = "Height, Weight or Age must be greater than 0"; 
        return require "views/index.view.php"; 
    }

    if(empty($errors)) {
        $heightInMeters = $height / 100;
        $bmi = $weight / ($heightInMeters * $heightInMeters);

        $category = ""; 

        if($bmi < 18.5) {
            $category = "Underweight";
        } else if ($bmi >= 18.5 && $bmi < 24.9) {
            $category = "Normal Weight";
        } else if ($bmi >= 25 && $bmi < 29.9) {
            $category = "Overweight";
        } else if ($bmi >= 30 && $bmi < 34.9) {
            $category = "Obese (Class I)";
        } else if ($bmi >= 35 && $bmi < 39.9) {
            $category = "Obese (Class II)";
        } else {
            $category = "Obese (Class III)";
        }

        $db = new Database(["host"=> "localhost", "port" => 3306, "dbname"=>"BMI_PHP_APP"]); 

        $query = "INSERT INTO BMIUsers (Name, Age, Gender) VALUES ( ?, ? , ?);"; 
        $stmt = $db->query($query, [$name, $age, $gender]); 

        $bmiUserId = $db->connection->lastInsertId();  

        $query = "INSERT INTO BMIRecords (BMIUserID, Height, Weight, BMI) VALUES (?, ?, ?, ?)"; 
        $stmt = $db->query($query, [$bmiUserId, $height, $weight, $bmi]); 


        


        require "views/result.view.php"; 
        die(); 
    }

    
}

require "views/index.view.php"; 