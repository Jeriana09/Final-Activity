<?php

$host = 'localhost';
$user = 'Jeric';
$pass = '';
$db = 'final_activity';
$table = 'table_activity';
try {
   $pdo = new PDO("mysql:host=$host", $user, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`");
   $pdo->exec("USE `$db`");
   
   $sql = "CREATE TABLE IF NOT EXISTS $table (id INT AUTO_INCREMENT PRIMARY KEY, task VARCHAR(100) NOT NULL, date VARCHAR(10) NOT NULL)";
   $pdo->exec($sql);
   
   //echo "Database and Table Created";
   
} catch (PDOException $e){
    echo "Connection failed" .$e->getMessage();
    
}

?>