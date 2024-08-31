<?php 

$heading = "BMI Records"; 

$db = new Database(["host"=> "localhost", "port" => 3306, "dbname"=>"BMI_PHP_APP"]); 

$query = "SELECT u.Name, u.Age, u.Gender, r.Height, r.Weight, r.BMI, r.RecordedAt
From BMIUsers u 
JOIN BMIRecords r ON u.BMIUserID = r.BMIUserID";

$stmt  = $db->query($query, []); 
$users = $stmt->fetchAll(); 

require "views/records.view.php";