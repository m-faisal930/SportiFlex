<?php

session_start();

// Check if the user is not logged in
if ($_SESSION['adminLoggedIn'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../faisal';</script>";
  exit;
}

include("../connection/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
                <title>Admin Banners</title>
<meta name="description" content="Admin can add or remove the dicount/promotion banners.">
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Font Awesome Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900"
      rel="stylesheet"
    />

    <!-- Font Awesome Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./styleindex.css" />
    <link rel="stylesheet" href="../style.css">
    <style>
	    .dropdown {
	      position: relative;
	      display: inline-block;
	    }
	    
	    .dropdown-content {
	      display: none;
	      position: absolute;
	      z-index: 1;
	    }
	    
	    .dropdown-content a {
	      display: block;
	      padding: 10px;
	      text-decoration: none;
	      color: #000;
	    }
	    
	    .dropdown:hover .dropdown-content {
	      display: block;
	    }
	    
	    .selected-items {
	      margin-top: 10px;
	    }
    </style>

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="adminproducts" class="wrapper d-flex align-items-stretch">
    <?php
    include('./sidebar.php');
    ?>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
<?php include('./nav.php');   ?>
        <button class="btn" style="background-color: #212529; color: #fff;"> <a href="#myModal" onclick="hideDiv()";   data-toggle="modal" class="nav-link me-3 " style="color: #fff;" href="#">Insert Banners</a></button>
        <p><strong>Must be 1536px X 768px</strong></p>

        <div class="products-table p-5">
          <table class="table">
            <thead>
              <tr>
                <th>Banner Id</th>
                <th>Banner Image</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

       <?php  
                // Tag Display

      $select_query = "select * from `banners`";
      $result = mysqli_query($con, $select_query);
      $count = mysqli_num_rows($result);
      while ($row= mysqli_fetch_assoc($result)){
        $banner_id = $row['banner_id'];
        $banner_img = $row['banner_img'];
          echo "<tr>
                <td >
                  $banner_id
                </td>
                <td >
                  $banner_img
                </td>";

              if ($count >2){
                echo "
                <td >
                  <a  href=''><i class='fas fa-solid fa-trash-can delete-icon' data-banner-id = '$banner_id' style='color: #212529;'></i></a>
                </td>";
              }
              else{
                echo "
                <td>
                <button style='pointer-events: none; background-color: #212529 ; color: white; padding: 10px;' disabled>Disabled</button>
                </td>
                ";
              }

                echo "
              </tr>";
      }
            ?>



            </tbody>
          </table>
        </div>

      </div>
    </div>


    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">				

                    <h4 id="register-title" class="modal-title">Insert Banners</h4>
            <button  type="button" class="close"><a href="adminbanner"><i class="fas fa-thin fa-square-xmark fa-2xl"></i></a></button>
           
                </div>


                <div class="modal-body">

    
    
                    <form id="banner-form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control" name="Banner_image" placeholder="Add Banners" required="required">
                            </div>
                        </div>


                        <div class="form-group">
                            <button  type="submit" name = "submit_banner" class="btn btn-primary btn-block btn-lg">Submit</button>
                        </div>



                    </form>
    
                </div>
            </div>
        </div>
    </div>  





      	
  	<script>

    </script>
    <script>
      (function ($) {
        "use strict";

        var fullHeight = function () {
          $(".js-fullheight").css("height", $(window).height());
          $(window).resize(function () {
            $(".js-fullheight").css("height", $(window).height());
          });
        };
        fullHeight();

        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").toggleClass("active");
        });
      })(jQuery);


      $(document).on('click', '.delete-icon', function() {
    var bannerId = $(this).data('banner-id');
    $.ajax({
        url: 'delete-banner', // Changed URL to point to delete_tag
        type: 'POST',
        data: { banner_id: bannerId },
        success: function(response) {
            // Reload page or update tag list on front-end
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});






    </script>
    <!-- Bootstrap JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="admincode.js"></script>
  </body>
</html>















<?php
if (isset($_POST['submit_banner'])){
      // Getting Images names
  $banner_image = $_FILES['Banner_image']['name'];
// Getting Images temp names
  $temp_image = $_FILES['Banner_image']['tmp_name'];
// Uploading location set
  move_uploaded_file($temp_image, "../images/$banner_image");

      // Insert Query
      $insert_query = "INSERT INTO `banners` (`banner_img`) VALUES ('$banner_image')";
      $sql_execute = mysqli_query($con, $insert_query);
      if (!$sql_execute) {
          die('Error: ' . mysqli_error($con));
      }
      else{
          echo "<script>alert('Data Inserted Successfully')</script>";
      }
    }

?>
