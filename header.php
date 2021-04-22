<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="jqueryUI/jquery-ui.css" />
    <link rel="stylesheet" href="jqueryUI/jquery-ui.structure.css" />
    <link rel="stylesheet" href="jqueryUI/jquery-ui.theme.css" />
    <link
      rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"
    />
    <script src="js/script.js" defer></script>
    

    <title>Welcome to Rick's Cafe</title>
  </head>
  <body>
  <nav>
    
<img src="images/hamburger-image.png" class="navbar-logo-img hamburger" id="hamburger">
   <div><a href="index.php"><img src="images/ricks-cafe-cups.png" class="navbar-logo-img" alt=""></a></div>

   
    
    <ul class="nav-ul" id="nav-ul">
        <li><a href="index.php" >Home</a></li>
        <li><a href="reservation.php">Reserve a Table</a></li>
        <li><a href="review.php">View or Change Reservation</a></li>
        <li><a href="cancel.step1.php">Cancel</a></li>
    </ul>
</nav>
<div id="mySidenav" class="sidenav">
  <img src="images/hamburger-x.png" class="navbar-logo-img closebtn" id="hamburger-x">
  <a href="index.php">Home</a>
  <a href="reservation.php">Reserve a Table</a>
  <a href="review.php">View or Change Reservation</a>
  <a href="cancel.step1.php">Cancel</a>
</div>
