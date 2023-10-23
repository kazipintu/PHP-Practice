<?php

  include 'folio_db_config.php';

  if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $description=$_POST['description'];
    $linkedin=$_POST['linkedin'];
    $git=$_POST['git'];
    $faceb=$_POST['faceb'];
    $designation=$_POST['designation'];
    $company=$_POST['company'];
    $period=$_POST['period'];
    $role=$_POST['role'];
    $college=$_POST['college'];
    $degree=$_POST['degree'];
    $score=$_POST['score'];
    $period=$_POST['period'];
    $major=$_POST['major'];
    $skill=$_POST['skill'];
    $interest = $_POST['interest'];
    $award = $_POST['award'];
    $description = $_POST['description'];


    $select_sql = "UPDATE about_table SET name = '$name', address = '$address', contact = '$contact', email = '$email', description = ' $description', linkedin = '  $linkedin', git = ' $git', faceb = '$faceb',  WHERE id = '$id'";
    $query = mysqli_query($connect, $select_sql );

    if ($query){
      header("location:about_admin.php");
    }
  }

  if(isset($_GET['id'])){
    // echo $_GET['id'];
    $id = $_GET['id'];

    $select_sql = "SELECT * FROM about_table WHERE id = '$id'";
    $query = mysqli_query($connect, $select_sql);

    $row = mysqli_fetch_assoc($query);
    echo $row['id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>About Admin</title>
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
                <!-- <span><?= $status; ?></span> -->
                <div class="card-body">
                  <h4 class="card-title">About Myself</h4>
                  <form class="forms-sample" method="POST" action="about_admin.php" enctype="multipart/form-data">
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
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="file" name="image" class="form-control file-upload-info">
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

<?php

  }

?>
</body>

</html>