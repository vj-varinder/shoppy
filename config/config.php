<?php
//DB_HOST,DB_USER,DB_PASS,DB_NAME are a constant and constants are always written in uppercase
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','varinder');
define('DB_NAME','deakin_shop_centre');

$site_description="this is an ecommerce website";
// if you want to print this on your website then
// in any location then you just have to write dwon
// following code in php tags to make the page dynamic:
// echo $site_description;
//

// server info
$server = 'localhost';
$user = 'root';
$pass = 'varinder';
$db = 'deakin_shop_centre';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);
?>
