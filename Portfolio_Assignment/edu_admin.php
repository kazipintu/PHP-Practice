<?php

  include 'folio_db_config.php';
  $edu_status = '';
  
  $edu_sql = "SELECT * FROM edu_table";
  $edu_result = mysqli_query($connect, $edu_sql);
  $edu_rows = mysqli_num_rows($edu_result);

  // var_dump($num_rows);
  // die();

  if(isset($_POST['submit'])) {
    // echo "submit";
    // var_dump($_POST);
    $college=$_POST['college'];
    $degree=$_POST['degree'];
    $score=$_POST['score'];
    $period=$_POST['period'];
    $major=$_POST['major'];

    if( $edu_rows > 12){
      $edu_status = "data already available in your database";  
    } 
    
    else {
      $edu_sql = "INSERT INTO edu_table (college, degree, score, period, major) VALUES ('$college', '$degree', '$score', '$period', '$major')";
      $edu_query = mysqli_query($connect, $edu_sql);

      if($edu_query){
        $edu_status = "inserted successfully";
      }
      
      else{
        $edu_status = "failed to insert";
      }
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Education Admin</title>
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
                <span><?= $edu_status; ?></span>
                <div class="card-body">
                  <h4 class="card-title">My Education</h4>
                  <form class="forms-sample" method="POST" action="edu_admin.php"      enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName">college</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="college" name="college">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress">degree</label>
                      <input type="text" class="form-control" id="exampleInputAddress" placeholder="degree" name="degree">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputContact">score</label>
                      <input type="text" class="form-control" id="exampleInputContact" placeholder="score" name="score">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail">period</label>
                      <input type="email" class="form-control" id="exampleInputEmail" placeholder="period" name="period">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputDescription">period</label>
                      <input type="text" class="form-control" id="exampleInputDescription" placeholder="period" name="period">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLinkedin">major</label>
                      <input type="text" class="form-control" id="exampleInputLinkedin" placeholder="major" name="major">
                    </div>
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
</body>

</html>
