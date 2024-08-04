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
            <title>Admin Categories</title>
<meta name="description" content="Admin can add or remove categories in this page.">
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
        <button class="btn" style="background-color: #212529; color: #fff;"> <a href="#myModal" onclick="hideDiv()";   data-toggle="modal" class="nav-link me-3 " style="color: #fff;" href="#">Insert Category</a></button>
        <div class="products-table p-5">
          <table class="table">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Category Title</th>
                <th>Description</th>
                <!-- <th>Ratting</th> -->
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

            <?php  
                // Tag Display

      $select_query = "select * from `category` WHERE status = 'yes'";
      $result = mysqli_query($con, $select_query);
      while ($row= mysqli_fetch_assoc($result)){
        $category_id = $row['category_id'];
        $category_name = $row['title'];
        $category_description = $row['description'];
          echo "<tr>
                <td >
                  $category_id
                </td>
                <td >
                  $category_name
                </td>
                <td >
                  $category_description
                </td>
                <td >
                  <a  href=''><i class='fas fa-solid fa-trash-can delete_category' data-category-id = '$category_id' style='color: #212529;'></i></a>
                </td>
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

                    <h4 id="register-title" class="modal-title">Insert Category</h4>
            <button  type="button" class="close"><a href="admincategories"><i class="fas fa-thin fa-square-xmark fa-2xl"></i></a></button>
                </div>
                <div class="modal-body">

    
    
                    <form id="login-form" action="" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="category_title" placeholder="Category Title" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="category_description" placeholder="Category Description" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <button  name="submit_category" type="submit" class="btn btn-primary btn-block btn-lg ">Submit</button>
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






      $(document).on('click', '.delete_category', function() {
    var categoryId = $(this).data('category-id');
    $.ajax({
        url: 'delete-category', // Changed URL to point to delete_tag
        type: 'POST',
        data: { category_id: categoryId },
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
if (isset($_POST['submit_category'])){
  $category_title = $_POST['category_title'];
  $category_description = $_POST['category_description'];
  // Select Query
  $select_query = "SELECT * FROM `category` WHERE title = '$category_title'";
  $result = mysqli_query($con, $select_query);
  if (!$result) {
      die('Error: ' . mysqli_error($con));
  }
  $rows_count = mysqli_num_rows($result);
  if ($rows_count > 0){
      echo "<script> alert('Data Already Available') </script>";
  }
  else{
      // Insert Query
      $insert_query = "INSERT INTO `category` (`title`, `description`) VALUES ('$category_title', '$category_description')";
      $sql_execute = mysqli_query($con, $insert_query);
      if (!$sql_execute) {
          die('Error: ' . mysqli_error($con));
      }
      else{
          echo "<script>alert('Data Inserted Successfully')</script>";
      }
  }
}

?>