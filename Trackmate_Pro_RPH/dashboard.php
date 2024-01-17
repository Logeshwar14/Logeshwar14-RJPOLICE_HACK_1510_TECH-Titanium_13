<!-- <?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location: login.php");
}else{
    echo "Hello broskii <b>{$_SESSION['user']['name']}</b>, Welcome to our website<br>";
    
    echo "<a href='logout.php'>Log out</a>";
} 
?> -->

<?php 

if (!isset($_SESSION['user'])) {
    header("location: login.php");
}else{

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>WELCOME</title>

    <link rel="stylesheet" type="text/css" href="dashstyle.css">

</head>
<header>
    <div class="container">
      <h1 class="logo"><img src="track2.png" style="float:left; height:30px"></h1>

      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="#">History</a></li>
          <li><a href="evereg.php">Create event</a></li>
          <li><a href="delreg.php">Delete event</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
     <h1 style="color:#55d6aa">Hello, <?php echo $_SESSION['user']['name']; ?></h1>
     <div class="box" style="float:left">
		<p>Current event: SVCE HIGHWAYS</p>
		<p>No of officers: 3</p>
		<p>Event duration: 2 hours</p>
          <p><a href="track.php">view event</a></p>
     </div>



</body>

</html>

<?php 

}

 ?>