<?php
// localhost connection
// Create PHP constants for the database connection
// Here is an example
// define("DB_SERVER", "localhost");

define("DB_SERVER", "localhost");
define("DB_USER", "sally");
define("DB_PASS", "P@ssword1234");
define("DB_NAME", "salamanders");

// Webhost connection
// use this connection when you upload your files to the webhost
// comment them out when working locally

//define("DB_SERVER_WEB", "localhost"); // 'localhost' for SiteGround
//define("DB_USER_WEB", "uvno8ryczx7yo"); // SiteGround database username
//define("DB_PASS_WEB", "P@ssword1234-4321"); // SiteGround database password
//define("DB_NAME_WEB", "dbhrlcjzzx9bcg"); //  SiteGround database name

// Use this connection when working locally
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Uncomment the following lines when uploading your files to the webhost
// $connection = mysqli_connect(DB_SERVER_WEB, DB_USER_WEB, DB_PASS_WEB, DB_NAME_WEB);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
