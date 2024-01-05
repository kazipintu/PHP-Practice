<?php 

  // echo "edit table file";

  $id = $_POST['id'];
  include 'ecommerce_db_config.php';

  $cat_delete_sql = "DELETE FROM category_table WHERE id='$id'";
  $cat_delete_query = mysqli_query($ecom_connect, $cat_delete_sql);

  if($cat_delete_query){
    $cat_delete_sql = "SELECT * FROM category_table";
    $cat_delete_query = mysqli_query($ecom_connect, $cat_delete_sql);
    
    if(mysqli_num_rows($cat_delete_query)>0){
      $category_data = [];
      
      while($category_table_row = mysqli_fetch_assoc($cat_delete_query)) {
        $category_data[] = $category_table_row;
  
      }
        $json_category_data = json_encode($category_data);
        echo $json_category_data;
    }
  
    else {
      echo "No data available";
    }
  }
  else {
    echo "failed to insert data";
  }

?>