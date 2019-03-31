<?php 
    require("inc/connect.php");   
    if(!empty($_POST)) 
    { 
        $selecteroo = "SELECT id, username, password, salt FROM users WHERE username = :username";  
        $query_parameters = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($selecteroo); 
            $result = $stmt->execute($query_parameters); 
        } 
        catch(PDOException $err) 
        { 
            die("Query failed to execute: " . $err->getMessage()); 
        } 
         
        $login_ok = false; 
         
        $row = $stmt->fetch(); 
        if($row) 
        { 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                $login_ok = true; 
            } 
        } 
         
        if($login_ok) 
        { 
            unset($row['salt']); 
            unset($row['password']); 
             
            $_SESSION['thesesh'] = $row; 
             
            header("Location: index.php"); 
            die("Redirecting to: index.php"); 
        } 
        else 
        { 
            echo '<center><span style="color:#FFFFFF;">You have entered an invalid username or password.</span></center>';
        } 
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
      <h1>Login</h1>
    </div>

  </section>
  <center>
<form action="login.php" method="post"> 
    <span style="color: #55d6aa;"><font face="verdana">Username:</span></font><br />
    <input type="text" style="border-color:#55d6aa; color: #FFFFFF; background-color: #242424; border-radius: 10px;" name="username" value="" /> 
    <br /><br /> 
    <span style="color: #55d6aa;"><font face="verdana">Password:</span></font><br /> 
    <input type="password" style="border-color:#55d6aa; color: #FFFFFF; background-color: #242424; border-radius: 10px;" name="password" value="" />  
    <br /><br /> 
    <input type="submit" value="Login" />
    <style>
        input[type="submit"]{
        background-color: #242424;
        color: #ffffff;
        border-radius: 10px; border-color: #55d6aa;
}
</style> 
</form>
<u><font size="3"><a href="register.php"><font color="#55d6aa">Don't have an account? Sign up here!</font></a></u></center>
