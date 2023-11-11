<?php
include 'folio_db_config.php';

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $about_sql = "DELETE FROM about_table WHERE id = '$id'";
  $about_query = mysqli_query($connect, $about_sql);

  if ($about_query){
    header("location:about_admin.php");
  }
}

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $exp_sql = "DELETE FROM exp_table WHERE id = '$id'";
  $exp_query = mysqli_query($connect, $exp_sql);

  if ($about_query){
    header("location:exp_admin.php");
  }
}

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $edu_sql = "DELETE FROM edu_table WHERE id = '$id'";
  $edu_query = mysqli_query($connect, $edu_sql);

  if ($edu_query){
    header("location:edu_admin.php");
  }
}

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $sk_sql = "DELETE FROM skill_table WHERE id = '$id'";
  $sk_query = mysqli_query($connect,  $sk_sql);

  if ($sk_query){
    header("location:skill_admin.php");
  }
}

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $int_sql = "DELETE FROM int_table WHERE id = '$id'";
  $int_query = mysqli_query($connect, $int_sql);

  if ($int_query){
    header("location:int_admin.php");
  }
}

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $award_sql = "DELETE FROM award_table WHERE id = '$id'";
  $award_query = mysqli_query($connect, $award_sql);

  if ($award_query){
    header("location:award_admin.php");
  }
}

?>