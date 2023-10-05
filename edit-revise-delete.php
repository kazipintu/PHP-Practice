<?php
  include 'formlesson_db.php';

  if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $name = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE formlearndb_table SET name = '$name', email = '$email' WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);
    if ($query){
      header("location:formlessonSQL.php");
    }

  }

  if(isset($_GET['id'])){
    // echo $_GET['id'];
    $id = $_GET['id'];

    $sql = "SELECT * FROM formlearndb_table WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($query);
    echo $row['id'];

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
   
    <label for=""> Username </label><br>
    <input type="username" name="username" id="" value = "<?php echo $row['name']; ?>" > <br><br>

    <label for=""> Email </label><br>
    <input type="email" name="email" id="" value = "<?php echo $row['email']; ?>"><br><br>

    <input type="submit" value="edit" name="submit">
   
  </form>
<?php

  }

?>

</body>

</html>