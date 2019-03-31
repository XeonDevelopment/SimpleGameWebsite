<?php
    require("inc/connect.php"); 
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
				  <li>
				  <?php 
				  if(isset($_SESSION['thesesh'])) {
				  echo "Welcome, ". escape($_SESSION['thesesh']['username'])."";
				}
				?>
				  </li>
                  <li><a href="./">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Contact</a></li>
				  <li>
<?php
if(!isset($_SESSION['thesesh']) && empty($_SESSION['thesesh'])) {
     header("Location: index.php");
}
else {
     echo  '<a href="logout.php"><b>Log Out</b></a>';
}
?>
</li>
                </ul>
                </nav>
            </div>
        </header>
    </section>

<section hero>

    <div class="mainhead">
      <h1>Welcome to .....</h1>
      <p>Feel Free to sign up to take part in multiplayer</p>
      <button type="button" class="buttoncta">PLAY GAME</button>
  </div>

</section>

<section reasons>
    <div class="contentboxes">
        <h1>REASONS TO PLAY GAMES WITH US</h1>
        <p><b><i>As if you need a reason for games</i></b></p>
        <div class="grid-container">
          <div class="grid-item">
            <i class="fa fa-trophy" style="font-size:50px"></i>
            <h3>Leaderboards</h3>
            <p>Enjoy competing against others who play the games, with public leaderboards</p>
        </div>
        <div class="grid-item">

            <i class="fa fa-clock-o" style="font-size:50px"></i>
            <h3>Passing Time</h3>
            <p>We understand how <b>boring</b> sitting in class it, so we aimed to make every game as fun as possible.</p>


        </div>
        <div class="grid-item">

            <i class="fa fa-coffee" style="font-size:50px"></i>
            <h3>Supporting us.</h3>
            <p>After all the hours spent making the games for you, each time you play you get us closer to our next cup of coffee.</p>

        </div>  
    </div>
</div>
</section>


<section calltoaction>

    <div align="center" class="ctasignup">
        <h1>What are you waiting for?</h1>
        <a href="register.php"><button type="button" class="buttonsgn">SIGN UP</button></a>
    </div>
</section>

<footer>
  <p><b>Nahill Dawood © 2018</b></p>
</footer>

</body>
</html>
