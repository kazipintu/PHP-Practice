<?php 

  // echo "edit table file";

  $id = $_POST['id'];
  $cat_name = $_POST['category'];
  include 'ecommerce_db_config.php';

  $cat_edit_sql = "UPDATE category_table SET category='$cat_name' WHERE id='$id'";
  $cat_edit_query = mysqli_query($ecom_connect, $cat_edit_sql);

  if($cat_edit_query){
    $cat_edit_sql = "SELECT * FROM category_table";
    $cat_edit_query = mysqli_query($ecom_connect, $cat_edit_sql);
    
    if(mysqli_num_rows($cat_edit_query)>0){
      $category_data = [];
      
      while($category_table_row = mysqli_fetch_assoc($cat_edit_query)) {
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