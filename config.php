<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */


/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'phpmyadmin');
define('DB_NAME', 'phpmyadmin');
*/



define('DB_SERVER', 'phpmyadmin.caaagnp7urmo.us-east-1.rds.amazonaws.com');
define('DB_USERNAME', 'phpMyAdmin');
define('DB_PASSWORD', 'phpMyAdmin');
define('DB_NAME', 'register');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
/* $link = mysqli_connect(phpmyadmin.caaagnp7urmo.us-east-1.rds.amazonaws.com, phpMyAdmin, phpMyAdmin,register);*/ 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
