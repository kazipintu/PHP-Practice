<?php

  $count = 1;
  include 'folio_db_config.php';
  $status = '';
  
  $select_sql = "SELECT * FROM about_table";
  $result = mysqli_query($connect, $select_sql);
  $num_rows = mysqli_num_rows($result);

  // var_dump($num_rows);
  // die();

  if(isset($_POST['submit'])) {
    // echo "submit";
    var_dump($_POST);
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $description=$_POST['description'];
    $linkedin=$_POST['linkedin'];
    $git=$_POST['git'];
    $faceb=$_POST['faceb'];
    echo $_FILES['imagery'];
    $image_data = $_FILES["image"]["tmp_name"];
    $imageDataEncoded = base64_encode($row['image_data']);
    // die();
    $image_name = mysqli_real_escape_string($connect, $_FILES["image"]["name"]);
    // var_dump($image_name);

    if($name && $address &&  $contact && $email){
      $sql = "INSERT INTO about_table (name, address, contact, email, description, linkedin, github, faceb, image, image_data) VALUES ('$name', '$address', '$contact', '$email', '$description', '$linkedin', '$git', '$faceb', '$image_name', '$image_data')";
      $query = mysqli_query($connect, $sql);


      if($query){
      $status = "inserted successfully";

      }
      else{
      $status = "failed to insert";
      }

    }

    else {
      $status = "missing field data";
    }

  }

  $sql = "SELECT * FROM about_table";
  $query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="design_admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="design_admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="design_admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="design_admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include 'nav_header.php';?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'nav_sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <span><?= $status; ?></span>
                <div class="card-body">
                  <h4 class="card-title">About Myself</h4>
                  <form class="forms-sample" method="POST" action="about_admin.php"  enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName">Name</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress">Address</label>
                      <input type="text" class="form-control" id="exampleInputAddress" placeholder="Address" name="address">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputContact">Contact Number</label>
                      <input type="number" class="form-control" id="exampleInputContact" placeholder="Contact" name="contact">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email address" name="email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDescription">Description</label>
                      <input type="text" class="form-control" id="exampleInputDescription" placeholder="Description" name="description">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLinkedin">Linkedin</label>
                      <input type="text" class="form-control" id="exampleInputLinkedin" placeholder="Linkedin" name="linkedin">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputGitHub">GitHub</label>
                      <input type="text" class="form-control" id="exampleInputGitHub" placeholder="GitHub" name="git">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFacebook">Facebook</label>
                      <input type="text" class="form-control" id="exampleInputFacebook" placeholder="Facebook" name="faceb">
                    </div>
                    <div class="form-group">
                      <label>Upload Image</label>
                      <!-- <input type="file" name="img[]" class="file-upload-default"> -->
                      <div class="input-group col-xs-12">
                        <input type="file" name="image">
                        <span class="input-group-append">
                          <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <h6> RETRIEVED TABLE</h6>
            <table>
              <tr>
                <th> Serial </th>
                <th> Photo </th>
                <th> Name </th>
                <th> Address </th>
                <th> Contact Number </th>
                <th> Email id </th>
              </tr>
              <?php
                 while($row = mysqli_fetch_assoc($query)){
                  // echo $row['id']."<br>";
                  // echo $row['image_data']."<br>";
                  // echo $row['name']."<br>";
                  // echo $row['address']."<br>";
                  // echo $row['contact']."<br>";
                  // echo $row['email']."<br>";
                 
              ?>
              <tr>
                <td> <?= $count ?> </td>
                <td> 
                  <img 
                    src= "data:image/jpeg;base64,' . $imageDataEncoded . '" 
                  >  
                </td>
                <td> <?= $row['name'] ?> </td>
                <td> <?= $row['address'] ?> </td> 
                <td> <?= $row['contact'] ?> </td> 
                <td> <?= $row['email'] ?> </td> 
              </tr>
              <?php
              
                  $count = $count + 1;
                }
            
              ?>
            </table>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="design_admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="design_admin/js/off-canvas.js"></script>
  <script src="design_admin/js/hoverable-collapse.js"></script>
  <script src="design_admin/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="design_admin/js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
