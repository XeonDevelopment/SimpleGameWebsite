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
     echo '<a href="login.php"><b>Log In</b></a>';
}
else {
     echo  '<a href="logout.php"><b>Log Out</b></a>';
}
?>
</li>
                </ul>
          </ul>
        </nav>
      </div>
    </header>
  </section>

  <section hero>

    <div class="scorehead">
      <h1><?php
if(!isset($_SESSION['thesesh']) && empty($_SESSION['thesesh'])) {
     echo 'Welcome Guest.';
}
else {
     echo "Welcome, ". escape($_SESSION['thesesh']['username']).".";
}
?></h1>
      <p>
	  <?php
if(!isset($_SESSION['thesesh']) && empty($_SESSION['thesesh'])) {
     echo 'This is where you can keep track of your ranking and work your way up. You must be signed in to use this feature.';
}
else {
     echo "This is where you can keep track of your ranking and work your way up.";
}
?></p>
    </div>

  </section>

  


  <section scoreboard>

<?php
$query = $db->prepare('SELECT * FROM users ORDER BY users.score DESC');
$query->execute();

$result = $query -> fetchAll();

foreach( $result as $row ) {
    echo escape($row['username']);
	echo " ";
    echo escape($row['score']);
	echo "</br>";
}

?>
  
  
    <div align="center" class="gamescore">
      <h1>Top Players</h1>
      <p>Sign up to take part</p>
      <table>
        <tr>
          <th>Position</th>
          <th>User</th>
          <th>Score</th>
        </tr>
        <tr>
          <td>Alfreds Futterkiste</td>
          <td>Maria Anders</td>
          <td>Germany</td>
        </tr>
        <tr>
          <td>Centro comercial Moctezuma</td>
          <td>Francisco Chang</td>
          <td>Mexico</td>
        </tr>
        <tr>
          <td>Ernst Handel</td>
          <td>Roland Mendel</td>
          <td>Austria</td>
        </tr>
        <tr>
          <td>Island Trading</td>
          <td>Helen Bennett</td>
          <td>UK</td>
        </tr>
        <tr>
          <td>Laughing Bacchus Winecellars</td>
          <td>Yoshi Tannamuri</td>
          <td>Canada</td>
        </tr>
        <tr>
          <td>Magazzini Alimentari Riuniti</td>
          <td>Giovanni Rovelli</td>
          <td>Italy</td>
        </tr>
      </table>
    </div>
  </section>




  <footer>
    <p>Nahill Dawood © 2018</p>
  </footer>

</body>
</html>
