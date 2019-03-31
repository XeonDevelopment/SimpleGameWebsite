<?php 
    require("inc/connect.php"); 
    if(!empty($_POST)) 
    { 
        if(empty($_POST['username'])) 
        { 
            die("You did not input a username."); 
        } 
         
        if(empty($_POST['password'])) 
        { 
            die("You did not enter a password."); 
        } 
         
        $selecteroo = "SELECT 1 FROM users WHERE username = :username"; 
        $query_params = array(':username' => $_POST['username']); 
        try 
        { 
            $stmt = $db->prepare($selecteroo); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $err) 
        { 
            die("Query failed to execute: " . $err->getMessage()); 
        }  
        $row = $stmt->fetch();
        if($row) 
        { 
            die("Username taken."); 
        }  
         
        try 
        { 
            $stmt = $db->prepare($selecteroo); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $err) 
        { 
            die("Query failed to execute: " . $err->getMessage()); 
        } 
        $row = $stmt->fetch(); 
        $selecteroo = "INSERT INTO users (username, password, salt) VALUES (:username, :password, :salt)"; 
         
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $_POST['password'] . $salt);
        for($round = 0; $round < 65536; $round++)
        { 
            $password = hash('sha256', $password . $salt);
        }
         
        $query_params = array(':username' => $_POST['username'], ':password' => $password, ':salt' => $salt); 
         
        try 
        { 
            $stmt = $db->prepare($selecteroo); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $err) 
        { 
            die("Query failed to execute: " . $err->getMessage()); 
        } 
         
        header("Location: login.php");  
        die("Redirecting to login.php"); 
    }  
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/favicon.ico">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Link Font Awesome for Icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>Game Website</title>

</head>


<body>

  <section header>
    <header>
      <div class="container">
        <img src="img/logo.png" class="logo" >

        <nav>
          <ul>
            <li><a href="./">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>
  </section>

  <section hero>

    <div class="abouthead">
      <h1>Register</h1>
    </div>

  </section>
<center>
<form action="register.php" method="post"> 
    <span style="color: #55d6aa;"><font face="verdana">Username:</span></font><br /> 
    <input type="text" style="border-color:#55d6aa; color: #FFFFFF; background-color: #242424; border-radius: 10px;" name="username" value="" /> 
    <br /><br />
    <span style="color: #55d6aa;"><font face="verdana">Password:</span></font><br /> 
    <input type="password" style="border-color:#55d6aa; color: #FFFFFF; background-color: #242424; border-radius: 10px;" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Register" /> 
    <style>
        input[type="submit"]{
        background-color: #242424;
        color: #ffffff;
        border-radius: 10px; border-color: #55d6aa;
}
</style>
</form>
</center>
