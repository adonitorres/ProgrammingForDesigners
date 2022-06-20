<?php include('includes/contact-parse_new.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lightslider.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/lightslider.js"></script>
  <script src="js/jquery.validate_t.js"></script>
   <script src="js/validTests.js"></script>
  <title>Queen Nation - Home</title>
</head>
<body class="dhome">
  <header>
    <h1><a href="index.html">
      <div>Q</div>
      <div>N</div></a>
    </h1>
    <a class="menu" href="javascript:;">
      <div class="hamburger">
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
      </div>
    </a>
    <nav>
      <ul class="global">
        <li class="nhome"><a href="index.html">Home</a></li>
        <li class="nlineup"><a href="lineup.html">Line-Up</a></li>
        <li>&nbsp;</li>
        <li class="ngallery"><a href="gallery.html">Gallery</a></li>
        <li class="ncontact"><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div>
      <h2>Join Queen Nation on March 6th for a truly awesome experience!</h2>
      <a href="#"><div>TICKETS</div></a>
    </div>
    <section>
      <ul>
        <li>
          <div>
            <p>Mar</p>
            <p>06</p>
            <p>7:00PM</p>
          </div>
          <div>
            <p>The Magnolia</p>
            <p>El Cajon, CA</p>
          </div>
        </li>
        <li>
          <div>
            <p>Mar</p>
            <p>11</p>
            <p>7:00PM</p>
          </div>
          <div>
            <p>Grand Theater for the Arts</p>
            <p>Tracy, CA</p>
          </div>
        </li>
        <li>
          <div>
            <p>Mar</p>
            <p>12</p>
            <p>7:00PM</p>
          </div>
          <div>
            <p>Bourbon Room</p>
            <p>Los Angeles, CA</p>
          </div>
        </li>
        <li>
          <div>
            <p>Mar</p>
            <p>18</p>
            <p>9:00PM</p>
          </div>
          <div>
            <p>37 Main-A Rock Cafe-Buford</p>
            <p>Buford, GA</p>
          </div>
        </li>
        <li>
          <div>
            <p>Mar</p>
            <p>19</p>
            <p>10:00PM</p>
          </div>
          <div>
            <p>Venice Performing Arts Center</p>
            <p>Venice, FL</p>
          </div>
        </li>
      </ul>
      <div>&nbsp;</div>
    </section>
    <div>
      <div>&nbsp;</div>
      <p>BIG THANKS to the good folks of Las Vegas who rocked out with us at the Green Valley Ranch last night! We hope you had as much fun as we did!</p>
      <div>&nbsp;</div>
      <p>Packed house last night at the Canyon Club in Agoura last night! Thanks to everyone who came out to our big homecoming dance!</p>
      <div>&nbsp;</div>
      <p>We did it again! For the second time, Queen Nation sold out 3 consecutive nights at the world famous Coach House in San Juan Capistrano!</p>
    </div>
    <div>
      <script>
        // this function tells the browser to create the DOM before executing this code
        $(document).ready(function(){
          $('.sHidden').lightSlider({
            // setting new values to default properties
            gallery:true,
            item:1,
            speed:500,
            auto:true,
            loop:true,
            // setting up an event
            onSliderLoad:function(){
              $('ul').removeClass('sHidden')
            } //closes on load event
          }); //closes lightSlider
        }); //closes doc ready
      </script>
      <ul class="sHidden">
        <li data-thumb="img/slider1_sm.jpg">
          <img src="img/slider1_sm.jpg" data-tile="guitar solo">
        </li>
        <li data-thumb="img/slider2_sm.jpg">
          <img src="img/slider2_sm.jpg" data-tile="butterfly">
        </li>
        <li data-thumb="img/slider3_sm.jpg">
          <img src="img/slider3_sm.jpg" data-tile="drums">
        </li>
        <li data-thumb="img/slider4_sm.jpg">
          <img src="img/slider4_sm.jpg" data-tile="singing">
        </li>
        <li data-thumb="img/slider5_sm.jpg">
          <img src="img/slider5_sm.jpg" data-tile="duet">
        </li>
      </ul>
    </div>
  </main>

  <footer>
    <p>Join our mailing list for the latest news, tour dates &amp; free tickets!</p>
    <div>
      <form name="newsletterform" id="newsletterform" method="post" action="newsletterform.php" autocomplete="true">
        <label for="fname" class="label">First Name</label>
        <input type="text" name="fname" id="fname" required placeholder="First Name">
        <label for="lname" class="label">Last Name</label>
        <input type="text" name="lname" id="lname" required placeholder="Last Name">
        <label for="email" class="label">Email</label>
        <input type="email" name="email" id="email" required placeholder="Email">
        <input type="submit" name="submit" id="submit" value="Submit">
        <input type="hidden" name="did_send" value="1">
      </form>
      <!-- set up the success message. it will create a div with class of either "success" or "notsent" -->
      <?php
        // if the variable in hidden field is true >>form has been sent and php processed it correctly
        if($_REQUEST['did_send']==1){
          // start typing an open div tage with the correct class
          echo '<div class="'.$status.'">';
          // display the correct message, using the variable you created in php file
          echo $display_msg;
        echo '</div>';
        }?>
        <!-- you will end up with a div displaying the right message
          <div class="success">your form was sent</div>  or
          <div class="notsent">sorry your form was not sent</div>
         -->
    </div>
    <ul>
      <li><a href="https://www.facebook.com/Queen-Nation-139068526304/" target="_blank"><p>Facebook</p></a></li>
      <li><a href="https://www.instagram.com/queennationband/" target="_blank"><p>Instagram</p></a></li>
      <li><a href="https://twitter.com/queennation2013" target="_blank"><p>Twitter</p></a></li>
      <li><a href="https://www.youtube.com/user/Wix" target="_blank"><p>YouTube</p></a></li>
    </ul>
    <div>
      <a href="https://www.privacypolicies.com/live/59a33f1e-d855-42be-812a-9ac5826e63c5" target="_blank">Privacy Policy</a>
      <p>&copy;Copyright 2022.</p>
      <p>All Rights Reserved.</p>
    </div>
  </footer>
  <script src="js/menu.js"></script>
</body>
</html>