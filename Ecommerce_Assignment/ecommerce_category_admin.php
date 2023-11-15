<?php

  include 'ecommerce_db_config.php';
  $status = '';
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ecommerce Category Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="design_admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="design_admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="design_admin/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.min.css"     integrity="sha512-P9pgMgcSNlLb4Z2WAB2sH5KBKGnBfyJnq+bhcfLCFusrRc4XdXrhfDluBl/usq75NF5gTDIMcwI1GaG5gju+Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <div class="col-12 grid-margin stretch-card" id="insert_category_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ecommerce Category Admin</h4>
                  <span id = "status"></span>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputCategory">Category Name</label>
                      <input type="text" class="form-control" id="category_name" placeholder="Category" name="category">
                    </div>
                   
                    <button type="submit" class="btn btn-primary me-2 category_btn" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin stretch-card" id="edit_category_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ecommerce Edit Category Admin</h4>
                  <span id = "status"></span>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputCategory">Edit Category Name</label>
                      <input type="text" class="form-control" id="edit_category_name" placeholder="Category" name="category">
                      <input type="hidden" class="form-control" id="edit_category_hidden_id" placeholder="Category" name="category">
                    </div>

                    <button type="submit" class="btn btn-primary me-2 back_category_btn" name="submit">Back</button>
                    <button type="submit" class="btn btn-primary me-2 edit_category_btn" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Sl. No.
                          </th>
                          <th>
                            Category Name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody id="category_show_data_table">
 
                      </tbody>
                    </table>
                  </div>
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

  <script>
    $(document).ready(function(){
      $('#edit_category_div').hide();
      $.ajax({
        type : "POST",
        url : 'category_show_data_table.php',
        success : function(response) {
          category_data = JSON.parse(response)
          // console.log(category_data.length)         
          // console.log(category_data[])
          // console.log(category_data[i].id)
          // console.log(category_data[i].category)
          for(i = 0; i < category_data.length; i = i+1){

            category_table_tr_data = '<tr> <td class="py-1" style="display:none">' + category_data[i].id + '</td> <td class="py-1">' + i + '</td> <td>' + category_data[i].category + '</td> <td class="py-1"> <a href = "#"> <i class="fa-sharp fa-solid fa-pen edit_tr_btn"></i> </a> &nbsp <a href = "#"><i class="fa-solid fa-trash"></i></a> </td> </tr>'
            
            console.log(category_table_tr_data)
            $('#category_show_data_table').append(category_table_tr_data)
            // console.log(category_data[i].category)
            
          }


          // alert(response)
          // $('#status').text(response)
          // alert (response),
          // Process the data and add rows to the table,
        }
      });

      $('.category_btn').click(function(page_loading){
        page_loading.preventDefault()
        category_name = $('#category_name').val()

        category_data = {
          category : category_name
        }
        $.ajax({
          type : "POST",
          url : 'category_data_entry.php',
          data : category_data,
          success : function(response) {
            
            category_data = JSON.parse(response)
            $('#category_show_data_table').empty()
            for(i = 0; i < category_data.length; i = i+1){

            category_table_tr_data = '<tr> <td class="py-1" style="display:none">' + category_data[i].id + '</td> <td class="py-1">' + i + '</td> <td>' + category_data[i].category + '</td> <td class="py-1"> <a href = "#"> <i class="fa-sharp fa-solid fa-pen edit_tr_btn"></i> </a> &nbsp <a href = "#"><i class="fa-solid fa-trash"></i></a> </td></tr>'
            
            console.log(category_table_tr_data)
              $('#category_show_data_table').append(category_table_tr_data)
            
           }
          }

        });

        // alert(category_name)

      });

      $('body').on('click', '.edit_tr_btn', function(server_loading) {
        server_loading.preventDefault()
        var tr = $(this).closest('tr');
        var td_category_name = tr.find("td").eq(2).text();
        var td_category_id = tr.find("td").eq(0).text();
        $('#edit_category_name').val(td_category_name)
        // alert(td)
        $('#edit_category_hidden_id').val(td_category_id)
        $('#edit_category_div').show();
        $('#insert_category_div').hide();

        // alert ('this is edit page')

      });

      $('.back_category_btn').click(function(server_loading){
        server_loading.preventDefault()
        $('#edit_category_div').hide();
        $('#insert_category_div').show();

      });

      $('.edit_category_btn').click(function(page_loading){
        page_loading.preventDefault()
        category_name = $('#edit_category_name').val()
        category_id = $('#edit_category_hidden_id').val()

        category_data = {
          category: category_name,
          id: category_id
        }
        $.ajax({
          type : "POST",
          url : 'category_edit_table.php',
          data : category_data,
          success : function(response) {
            alert(response)
            
            category_data = JSON.parse(response)
            $('#category_show_data_table').empty()
            for(i = 0; i < category_data.length; i = i+1){

            category_table_tr_data = '<tr> <td class="py-1" style="display:none">' + category_data[i].id + '</td> <td class="py-1">' + i + '</td> <td>' + category_data[i].category + '</td> <td class="py-1"> <a href = "#"> <i class="fa-sharp fa-solid fa-pen edit_tr_btn"></i> </a> &nbsp <a href = "#"><i class="fa-solid fa-trash"></i></a> </td> </tr>'
            
            console.log(category_table_tr_data)
              $('#category_show_data_table').append(category_table_tr_data)
            
           }
          }

        });

        // alert(category_name)

      });

    });

  </script>

</body>

</html>
