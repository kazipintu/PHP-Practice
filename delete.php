<?php
include 'formlesson_db.php';

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $sql = "DELETE FROM formlearndb_table WHERE id = '$id'";
  $query = mysqli_query($connect, $sql);

  if ($query){
    header("location:formlessonSQL.php");
  }

}

?>
