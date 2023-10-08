<!-- DMBS = RDBMS/ NoSQL DBMS/ NewSQL DBMS/ Object Oriented DBMS -->
<!-- Fisrt "connect" with Database, then "command" to store data -->

<!-- How to connect/ command Database ? -->
<!-- 1. Configure a database file e.g. "formlessonConfig_DB.php"-->
<!-- 2. Go to XAMPP control panel MySQL admin -->
<!-- 3. Create Database table in phpMyAdmin -->
<!-- 4. Configure the Database with $hostname, $usrname, $password, $database -->
<!-- // Database connection parameters
$host = "localhost";  // Replace with your database host
$dbname = "your_database";  // Replace with your database name
$username = "your_username";  // Replace with your database username
$password = "your_password";  // Replace with your database password -->



<?php

  $host = "localhost";  // Replace with your database host
  $username = "root";  // Replace with your database username
  $password = ""; // Replace with your database password
  $dbname = "formlearndb";  // Replace with your database name

  // Create a new MySQLi connection
  $connect = mysqli_connect($host, $username, $password, $dbname);
  // $mysqli = new mysqli($host, $username, $password, $dbname);
  
  // if($connect) {
  //   echo "Success";
  // }
  // else {
  //   echo "Failed";
  // }

?>