<?php

  $count = 1;
  include 'folio_db_config.php';
  $exp_status = '';
  
  $exp_sql = "SELECT * FROM exp_table";
  $exp_result = mysqli_query($connect, $exp_sql); 
  $exp_query = mysqli_query($connect, $exp_sql);
  $exp_rows = mysqli_fetch_assoc($exp_result);
  

  if(isset($_POST['submit'])) {
    $designation=$_POST['designation'];
    $company=$_POST['company'];
    $period=$_POST['period'];
    $role=$_POST['role'];

    $exp_sql = "INSERT INTO exp_table (designation, company, period, role) VALUES ('$designation', '$company', '$period', '$role')";
    $exp_query = mysqli_query($connect, $exp_sql);

    if($exp_query){
      $exp_status = "inserted successfully";
    }

    else{
      $exp_status = "failed to insert";
    }  
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Experience Admin</title>
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
                <span><?= $exp_status; ?></span>
                <div class="card-body">
                  <h4 class="card-title">My Experience</h4>
                  <form class="forms-sample" method="POST" action="exp_admin.php"      enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName">designation</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="designation" name="designation">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress">company</label>
                      <input type="text" class="form-control" id="exampleInputAddress" placeholder="company" name="company">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputContact">period</label>
                      <input type="text" class="form-control" id="exampleInputContact" placeholder="period" name="period">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDescription">role</label>
                      <input type="text" class="form-control" id="exampleInputDescription" placeholder="role" name="role">
                    </div>
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
            <h6> EXPERIENCE </h6>
            <table>
              <tr>
                <th> Sl </th>
                <th> Position </th>
                <th> Company </th>
                <th> Period </th>
                <th> Role </th>
                <th> Action </th>
              </tr>
              <?PHP
                while($exp_rows = mysqli_fetch_assoc($exp_query)){
              ?>
              <tr>
                <td> <?= $count ?> </td>
                <td> <?= $exp_rows['designation'] ?> </td>
                <td> <?= $exp_rows['company'] ?> </td>
                <td> <?= $exp_rows['period'] ?> </td>
                <td> <?= $exp_rows['role'] ?> </td>
                <td> <a href="update.php?id=<?php echo $exp_rows['id'] ?>" target = " "> edit</a>&nbsp;<a href="erase.php?id=<?php echo $exp_rows['id'] ?>" target = " ">delete </a> </td>;
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
