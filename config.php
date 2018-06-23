<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr10_toymurad_almamedov_biglibrary');
// Create connection
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

define('ROOT_URL', 'http://localhost/php_exercises/CodeReview10/');
// Check connection
if ( !$conn ) {
    die("Connection failed : " . mysqli_error());
   } 
?>

