<?php


//Database Configuration
$host = 'localhost';
$port = 3306;
$dbName = 'blog';
$username = 'root';
$password = '';

//Connection Sting
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";

try{
    //Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);

    //Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //echo 'Database Connected...';
} catch (PDOException $e) {
    //Handle connection errors
    echo "Database connection failed: " . $e->getMessage();

}


?>