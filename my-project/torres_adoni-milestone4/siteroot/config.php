<?php 
/**
 *  configure error display (production vs development)
 */

/* ------------------configure these variables----------------- */


define('DEBUG_MODE', true);
define('ROOT_DIR', 'C:\xampp\htdocs\adoni\lets-play' ); // for the server
define('ROOT_URL', 'http://localhost/adoni/lets-play/' );  // for the browser

define( 'USERNAME_MIN', 3 );
define( 'USERNAME_MAX', 30 );

define( 'PASSWORD_MIN', 8 );

//Database Configuration
$database_name = 'lets_play';
$database_user = 'lets-play';
$database_password = '$2y$10$Y64KcY7kqGr7qlSBnRvVW.x3dBpm6B7gNWLUvYSWSbuV3pwVzY/yO';
$host = 'localhost';


/* -------------------------stop editing------------------------ */


/* DISPLAY ERRORS
On a development server
	error_reporting should be set to E_ALL value;
	display_errors should be set to 1
	log_errors could be set to 1

On a production server
	error_reporting should be set to E_ALL value;
	display_errors should be set to 0
	log_errors should be set to 1
*/
if(DEBUG_MODE){
	//development
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
}else{
	//production
	ini_set('display_errors', 0);
	ini_set('log_errors', 1);
}

/**
 * Connect to our Database
 * @link https://phpbestpractices.org/#mysql
 */
$DB = new PDO( "mysql:host=$host;dbname=$database_name;charset=utf8mb4",
								$database_user,
								$database_password,
								array(
									PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
									PDO::ATTR_PERSISTENT => false
								)
              );