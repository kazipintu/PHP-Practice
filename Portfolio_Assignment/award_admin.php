<?php

  $count = 1;
  include 'folio_db_config.php';
  $award_status = '';
  
  $award_sql = "SELECT * FROM award_table";
  $award_result = mysqli_query($connect, $award_sql);
  $award_query = mysqli_query($connect, $award_sql);
  $award_rows = mysqli_num_rows($award_result);

  if(isset($_POST['submit'])) {
    $award = $_POST['award'];
    $description = $_POST['description'];
   
    if($award_rows > 15){
      $award_status = "data already available in your database";  
    } 
    
    else {
      $award_sql = "INSERT INTO award_table (award, description) VALUES ('$award', '$description')";
      $award_query = mysqli_query($connect, $award_sql);

      if($award_query){
        $award_status = "inserted successfully";
      }
      
      else{
        $award_status = "failed to insert";
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
  <title>Awards Admin</title>
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
                <span><?= $award_status; ?></span>
                <div class="card-body">
                  <h4 class="card-title">Awards and Achievements</h4>
                  <form class="forms-sample" method="POST" action="award_admin.php"      enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName">award</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="award" name="award">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress">description</label>
                      <input type="text" class="form-control" id="exampleInputAddress" placeholder="description" name="description">
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
            <h6> AWARDS & ACHIEVEMENTS</h6>
            <table>
              <tr>
                <th> Sl </th>
                <th> Award </th>
                <th> Description </th>
                <th> Action </th>
              </tr>
              <?PHP
                while($award_rows = mysqli_fetch_assoc($award_query)){
              ?>
               <tr>
                <td> <?= $count ?> </td>
                <td> <?= $award_rows['award'] ?> </td>
                <td> <?= $award_rows['description'] ?> </td>
                <td> <a href="update.php?id=<?php echo $award_rows['id'] ?>" target = " "> edit</a>&nbsp;<a href="erase.php?id=<?php echo $award_rows['id'] ?>" target = " ">delete </a> </td>;
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
