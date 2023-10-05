<?php

    if(isset($_POST["submit"])) {
      
      $name = $_POST["username"];
      $email = $_POST["email"];
      echo $name."<br>";
      echo $email."<br>";
      
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


</head>

<body>

  <br><br>
  <form action="#" method="post">
    <!-- action: to which link will the data go -->
    <!-- method: here it is "post" directly to php not by "get" though URL -->

    <label for=""> Username </label><br>
    <input type="username" name="username" id=""><br><br>

    <label for=""> Email </label><br>
    <input type="email" name="email" id=""><br><br>

    <!-- <label for=""> Submit </label><br> -->
    <input type="submit" value="Add" name="submit">
   
  </form>
  
</body>

</html>