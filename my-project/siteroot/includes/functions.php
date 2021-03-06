<?php 
/**
 * Get a human-friendly version of a datestamp
 * @param  string $date any date string
 * @return string       nice-looking date
 */
function convert_date( $date = 'today' ){
	$output = new DateTime( $date );
	return $output->format( 'F jS' );
}

/**
 * convert a date into the "time ago"
 * @param  string  $datetime 
 * @param  boolean $full     whether to break down the hours, minutes, seconds
 * @link https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
 */
function time_ago($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hour',
    'i' => 'minute',
    's' => 'second',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/**
 * Count approved comments on any post
 * @param  int $id any post id
 * @return int     number of comments
 */
function count_comments( $id ){
  //use the existing DB connection
  global $DB;
  $result = $DB->prepare('SELECT COUNT(*) AS total
                          FROM comments
                          WHERE post_id = ?
                          AND is_approved = 1');
  //run it and bind the data to the placeholders
  $result->execute(array($id));
  //check it
  if($result->rowCount()){
    //loop it
    while( $row = $result->fetch() ){
      return $row['total'];
    }
  }
}

/**
 * Display the feedback after a typical form submission
 * @param string $message The feedback message for the user
 * @param string $class The CSS class for the feedback div - use 'error' or 'success'
 * @param array $list   The list of error issues
 * @return mixed HTML output
 */
function show_feedback( &$message, &$class = 'error', $list = array() ){
  if( isset( $message ) ){ ?>
    <div class="feedback <?php echo $class; ?>">
      <h4><?php echo $message; ?></h4>
      <?php 
      if( ! empty($list) ){ 
        echo '<ul>';
        foreach ( $list AS $item ) {
          echo "<li>$item</li>";
        }
        echo '</ul>';
      }
      ?>
    </div>
  <?php }
}

/**
 * sanitize a string input by removing all tags and trimming leftover white space
 * @param  string $dirty the untrusted data
 * @return string        the sanitized string
 */
function clean_string( $dirty ){
  return trim( strip_tags( $dirty ) );
}

function clean_int( $dirty ){
	return filter_var( $dirty, FILTER_SANITIZE_NUMBER_INT );
}

function clean_boolean( $dirty ){
	if( $dirty ){
		return 1;
	}else{
		return 0;
	}
}

/**
* displays sql query information including the computed parameters.
* Silent unless DEBUG MODE is set to 1 in config.php
* @param [statement handler] $sth -  any PDO statement handler that needs troubleshooting
*/
function debug_statement($sth){
  if( DEBUG_MODE ){
    echo '<pre>';
    $info = debug_backtrace();
    echo '<b>Debugger ran from ' . $info[0]['file'] . ' on line ' . $info[0]['line'] . '</b><br><br>';
    $sth->debugDumpParams();
    echo '</pre>';
  }
}
/**
 * Helper function to make <select> dropdowns sticky
 * @param  mixed $thing1 
 * @param  mixed $thing2 
 * @return string         the 'selected' attribute for HTML
 */
function selected( $thing1, $thing2 ){
  if( $thing1 == $thing2 ){
    echo 'selected';
  }
}

/**
 * Helper function to make input checkboxes "sticky"
 * @param  mixed $thing1 
 * @param  mixed $thing2 
 * @return string         the 'checked' attribute for HTML
 */
function checked( $thing1, $thing2 ){
  if( $thing1 == $thing2 ){
    echo 'checked';
  }
}

/**
 * Output a class on a form input that triggered an error
 * @param  string $field the name of the field we're checking
 * @param  array  $list  the list of all errors on the form
 * @return string        css class 'field-error'
 */
function field_error( $field, $list = array() ){
  if( isset( $list[$field] ) ){
    echo 'field-error';
  }
}

/**
 * check to see if the viewer is logged in
 * @return array|bool false if not logged in, array of all user data if they are logged in
 */

function check_login(){
  global $DB;
  //if the cookie is valid, turn it into session data
  if(isset($_COOKIE['access_token']) AND isset($_COOKIE['user_id'])){
    $_SESSION['access_token'] = $_COOKIE['access_token'];
    $_SESSION['user_id'] = $_COOKIE['user_id'];
  }

  //if the session is valid, check their credentials
  if( isset($_SESSION['access_token']) AND isset($_SESSION['user_id']) ){
    //check to see if these keys match the DB     

    $data = array(
    'access_token' =>$_SESSION['access_token'],
    );

    $result = $DB->prepare( "SELECT * FROM users
                              WHERE  access_token = :access_token
                              LIMIT 1");
    $result->execute( $data );
    
    if($result->rowCount() > 0){
      //token found. confirm the user_id
      $row = $result->fetch();
      if( password_verify( $row['user_id'], $_SESSION['user_id'] ) ){
        //success! return all the info about the logged in user
        return $row;
      }else{
        return false;
      }
      
    }else{
      return false;
    }
  }else{
    //not logged in
    return false;
  }
}

function show_profile_pic( $src, $alt = "Profile Picture", $size = 50 ){
  //check if src is blank
  if( '' == $src ){
    $src = ROOT_URL . '/images/default_user.png';
  }
  ?>
  <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" width="<?php echo $size; ?>" height="<?php echo $size; ?>">
  <?php
}

/**
 * Displays an HTML dropdown input of all game types in alphabetical order
 * @return mixed HTML = the <select> populated with <option>s
 */
function type_dropdown( $default = 0 ){
	global $DB;
	$result = $DB->prepare( 'SELECT * FROM game_type ORDER BY name ASC' );
	$result->execute();
	if( $result->rowCount() ){
		echo '<select name="type_id">';
		echo '<option>Choose a Game Type</option>';
		while( $row = $result->fetch() ){
			extract( $row );
			if( $default == $type_id ){
				$atts = 'selected';
			}else{
				$atts = '';
			}
			echo "<option value='$type_id' $atts>$name</option>";
		}
		echo '</select>';
	}
}

/**
 * Display any post's image at any known size
 * @param string $unique	= the unique string identifier of the image, stored as an "image" in the DB
 * @param string $size		= small, medium (default), or large
 * @param string $alt			= alt text
 * @return mixed					= HTML <img> tag
 */
function show_post_image( $unique, $size = 'medium', $alt = '' ){
	$url = "uploads/$unique" . '_' . "$size.jpg";
	echo "<img src='$url' alt='$alt' class='post-image is-$size'>";
}

/**
 * Display an edit post button if yo uare the author of the post
 * @param integer $post_id = the post ID you want to edit
 * @param integer $post_author = the post author's user_id
 * @return mixed = HTML output
 */
function edit_post_button( $post_id = 0, $post_author = 0 ){
	global $logged_in_user;
	//if the logged in user is the author, show the edit button
	if( $logged_in_user AND $logged_in_user['user_id'] == $post_author ){
		echo "<a href='edit-post.php?post_id=$post_id' class='button button-outline float-right'>Edit</a>";
	}
}