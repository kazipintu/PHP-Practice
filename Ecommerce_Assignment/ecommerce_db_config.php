

<?php

  $hostname = "localhost";  // Replace with your database host
  $userid = "root";  // Replace with your database username
  $passkey = ""; // Replace with your database password
  $database = "ecommerce_db";  // Replace with your database name

  // Create a new MySQLi connection
  $ecom_connect = mysqli_connect($hostname, $userid, $passkey, $database);
  // $mysqli = new mysqli($host, $username, $password, $dbname);
  
  // if($connect) {
  //   echo "Success";
  // }
  // else {
  //   echo "Failed";
  // }

?>