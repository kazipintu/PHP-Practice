
<?php

  include 'formlesson_db.php';

  if(isset($_POST["submit"])) {   
    $name = $_POST["username"];
    $email = $_POST["email"];
    $name_size = strlen($name);
    $email_size = strlen($email);

    if($name_size == 0 || $email_size == 0) {
      echo "Field data missing";
    }

    else {
      $sql = "INSERT INTO formlearndb_table (name, email) VALUES ('$name', '$email')";
      // $sql is called sql command.
      $query = mysqli_query ($connect, $sql);

      if($query) {
        echo "Ok";
      }
      else {
        echo "Missing information";
      }
    
    // echo $name."<br>";
    // echo $email."<br>";

    }

      
      
      // ID number or index number is taken automatically in the DB table
      
    


  }

  $sql = "SELECT * FROM formlearndb_table";
  $query = mysqli_query($connect, $sql);

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
  <form action="" method="post">
    <!-- action: to which link will the data go -->
    <!-- method: here it is "post" directly to php not by "get" though URL -->

    <label for=""> Username </label><br>
    <input type="username" name="username" id=""><br><br>

    <label for=""> Email </label><br>
    <input type="email" name="email" id=""><br><br>

    <!-- <label for=""> Submit </label><br> -->
    <input type="submit" value="Add" name="submit">
   
  </form>

  <h1> User Data</h1>
  <table>
    <tr>
      <th> Index </th>
      <th> Name </th>
      <th> Email </th>
      <th> Action </th>
    </tr>

      <?php
        while($row = mysqli_fetch_assoc($query)){
          // echo $row['id']."<br>";
          // echo $row['name']."<br>";
          // echo $row['email']."<br>";
        

      ?>

    <tr>
      <td> <?php echo $row['id'] ?> </td>
      <td> <?php echo $row['name'] ?> </td>
      <td> <?= $row['email'] ?> </td> 
      <td> <a href="edit-revise-delete.php?id=<?php echo $row['id'] ?>" target = "_blank"> edit. </a><a href="http://"> .delete </a></td>
    </tr>
    
    <?php

        }

    ?>

  </table>
  
</body>

</html>