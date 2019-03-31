<?php 
    $username = "root"; 
    $password = ""; 
    $host = "localhost"; 
    $dbname = "db"; 
     
    try 
    { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password); 
    } 
    catch(PDOException $err) 
    { 
        die("Failed to establish a database connection: " . $err->getMessage()); 
    } 
     
    header('Content-Type: text/html; charset=utf-8');  
    session_start(); 
	
	require_once 'functions/sanitize.php';