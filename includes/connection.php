<?php 


$host = 'localhost'; // Hostname of the MySQL server
$database = 'to_do_list'; // Name of your MySQL database
$username = 'root'; // Username to connect to the database
$password = ''; // Password to connect to the database

// Test and establish the database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

