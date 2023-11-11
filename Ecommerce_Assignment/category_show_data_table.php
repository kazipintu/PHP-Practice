<?php

  // echo "hello";
  include 'ecommerce_db_config.php';

  $cat_show_data_table_sql = "SELECT * FROM category_table";
  $cat_show_data_table_query = mysqli_query($ecom_connect, $cat_show_data_table_sql);
  if(mysqli_num_rows($cat_show_data_table_query)>0){
    $category_data = [];
    while($category_table_row = mysqli_fetch_assoc($cat_show_data_table_query)) {
      $category_data[] = $category_table_row;

    }
      $json_category_data = json_encode($category_data);
      echo $json_category_data;
  }

  else {
    echo "No data available";
  }


?>