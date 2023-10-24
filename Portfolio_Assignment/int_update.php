<?php

  include 'folio_db_config.php';
  
  if(isset($_POST['submit'])) {
    $id = $_GET['id'];
    $interest = $_POST['interest'];

    $int_sql = "UPDATE int_table SET interest = '$interest', WHERE id = '$id'";
    $int_query = mysqli_query($connect, $int_sql);

    if ($int_query){
      header("location:int_admin.php");
    }
  }

  if(isset($_GET['id'])){
    // echo $_GET['id'];
    $id = $_GET['id'];
  
    $int_sql = "SELECT * FROM int_table WHERE id = '$id'";
    $int_query = mysqli_query($connect, $int_sql);
  
    $int_rows = mysqli_fetch_assoc($int_query);
    echo $int_rows['id']; 
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Interests Admin</title>
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
                <span><?= $int_status; ?></span>
                <div class="card-body">
                  <h4 class="card-title">My Hobbies and Interests</h4>
                  <form class="forms-sample" method="POST" action="int_admin.php"      enctype="multipart/form-data">
                    <!-- <div class="form-group">
                      <label for="exampleInputName">interest</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="interest" name="interest">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputAddress">interest</label>
                      <input type="text" class="form-control" id="exampleInputAddress" placeholder="interest" name="interest">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputContact">Contact Number</label>
                      <input type="number" class="form-control" id="exampleInputContact" placeholder="Contact" name="contact">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email address" name="email">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputDescription">Description</label>
                      <input type="text" class="form-control" id="exampleInputDescription" placeholder="Description" name="description">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputLinkedin">Linkedin</label>
                      <input type="text" class="form-control" id="exampleInputLinkedin" placeholder="Linkedin" name="linkedin">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputGitHub">GitHub</label>
                      <input type="text" class="form-control" id="exampleInputGitHub" placeholder="GitHub" name="git">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputFacebook">Facebook</label>
                      <input type="text" class="form-control" id="exampleInputFacebook" placeholder="Facebook" name="faceb">
                    </div> -->
                    <div class="form-group">
                      <!-- <label>Upload Image</label>
                      <input type="file" name="img[]" class="file-upload-default"> -->
                      <div class="input-group col-xs-12">
                        <!-- <input type="file" name="image" class="form-control file-upload-info"> -->
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
