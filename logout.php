<?php 
    require("inc/connect.php"); 
    unset($_SESSION['thesesh']); 
    header("Location: index.php"); 
    die("Redirecting...");
