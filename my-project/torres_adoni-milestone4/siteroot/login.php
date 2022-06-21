<?php
require('config.php');
require_once('includes/functions.php');

$logged_in_user = check_login();

// require('includes/parse-logout.php');
require('includes/parse-login.php');

//doctype 
require('includes/header.php'); 
?>

  <main class="dlogin">
    <h2>Let&rsquo;s Play!</h2>

		<?php show_feedback( $feedback, $feedback_class, $errors ); ?>

    <p>Log into Let's Play!</p>
    <form class="login" method="post" action="login.php">
      <div>
      <label for="username">Username</label>
      <input type="text" placeholder="Username">
    </div>
      <div>
      <label for="password">Password</label>
      <input type="password" placeholder="Password">
    </div>    
    <div>
      <label for="login">Login</label>
      <input type="submit" value="Login">
      <input type="hidden" name="did_login" value="true">
    </div>
    <a href="javascript:;">Forgot Password?</a>
    </form>
    <div class="flex">
      <p>Not Registered?&nbsp;</p>
      <a href="register.php">&nbsp;Create an Account</a>
    </div>
  </main>

<?php include('includes/footer.php'); ?>