<?php 
//check login keys
$logged_in_user = check_login(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Let&rsquo;s Play! &dash; Home</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/ddbddb4870.js" crossorigin="anonymous"></script>
</head>
<body class="dhome">
  <header class="flex">
    <a class="hamburger" href="javascript:;">
      <div class="hamburger">
        <ul>
          <li class="top"></li>
          <li class="middle"></li>
          <li class="bottom"></li>
        </ul>
      </div>
    </a>

    <?php
    //if( $logged_in_user ){
    ?>
      <!-- <a href="login.php?action=logout">Log Out</a> -->
    <?php //}else{ ?>
      <!-- <a href="register.php">Create an Account</a> -->
    <?php //} ?>

    <nav class="topnav flex">
      <a href="" class="logo-sm"></a>
      <h1>Let&rsquo;s Play!</h1>
      <ul id="mainMenu" class="flex hidden">
        <li class="dhome"><a href="index.php">Home</a></li>
        <li class="dlogin"><a href="login.php">Login/Register</a></li>
        <li class="dbrowse"><a href="index.php#browse">Browse Games/GMs</a></li>
        <li class="dabout"><a href="index.php#about">About</a></li>
        <li class="dcontact"><a href="index.php#contact">Contact Us</a></li>
      </ul>
    </nav>
  </header>