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
            <title>Admin Products</title>
<meta name="description" content="Admin can manage products present on the website. Add new product and delete an existing one.">
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





        <button class="btn" style="background-color: #212529; color: #fff;"> <a href="#myModal" onclick="hideDiv()";   data-toggle="modal" class="nav-link me-3 " style="color: #fff;" href="#">Insert Product</a></button>





        <div class="products-table p-5">
          <table class="table">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Product Title</th>
                <th>Items Sold</th>
                <th>Stock Available</th>
                <th>Ratting</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php

$select_query = "SELECT product_name, products.product_id FROM products Where products.status='yes';";
$result = mysqli_query($con, $select_query);
$i = 1;
while ($row= mysqli_fetch_assoc($result)){
  $product_id = $row['product_id'];
  $product_name = $row['product_name'];
  $select_query1 = "SELECT SUM(quantity) AS product_quantity FROM order_line WHERE order_line.product_id = $product_id;";
  $result1 = mysqli_query($con, $select_query1);
  
  if ($result1 && mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_assoc($result1);
      $quantity = $row1['product_quantity'];
  } else {
      $quantity = 0;
  }
  
  $select_query2 = "SELECT stock AS product_stock FROM stock WHERE stock.product_id = $product_id;";
  $result2 = mysqli_query($con, $select_query2);
  
  if ($result2 && mysqli_num_rows($result2) > 0) {
      $row2 = mysqli_fetch_assoc($result2);
      $stock = $row2['product_stock'];
  } else {
      $stock = 0;
  }
  
  $select_query3 = "SELECT AVG(rating) AS product_rating FROM reviews WHERE reviews.product_id = $product_id";
  $result3 = mysqli_query($con, $select_query3);
  
  if ($result3 && mysqli_num_rows($result3) > 0) {
      $row3 = mysqli_fetch_assoc($result3);
      $ratting = $row3['product_rating'];
  } else {
      $ratting = 0;
  }
  
echo " <tr>
                <td >
                  $i
                </td>
                <td >
                  $product_name
                </td>
                <td >
                  $quantity
                </td>
                <td >
                  $stock
                </td>
                <td >
                  $ratting
                </td>
                <td >
                  <a  href=''><i class='fas fa-solid fa-trash-can delete_product' data-product-id='$product_id' style='color: #212529;'></i></a>
                </td>
              </tr>";
              $i+=1;
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

                    <h4 id="register-title" class="modal-title">Insert Product</h4>
            <button  type="button" class="close"><a href="adminproducts"><i class="fas fa-thin fa-square-xmark fa-2xl"></i></a></button>
                </div>
                <div class="modal-body">

    
    
                    <form id="login-form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="product_title" placeholder="Product Title" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="product_description" placeholder="Product Description" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="product_price" placeholder="Product Price (Without $ Sign)" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="product_quantity" placeholder="Product Quantity( In Numbers)" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                        <input type="hidden" name="my-category-name" id="my-category-id"  value="">
                        <p>Selected Categories: <span id="selectedcategories"></span></p>
                        
                        
                        
                        <select id="categories" class="form-control" value="Click me" onchange="showSelectedCategories();">
                          
                        <?php  
                                          // Tag Display
                                          $select_query = "select * from `category` where status = 'yes'";
                                          $result = mysqli_query($con, $select_query);
                                          while ($row= mysqli_fetch_assoc($result)){
                                            $category_title = $row['title'];
                                            echo "<option value='$category_title'>$category_title</option>";
                                          }
                                          ?>
                            </select>
                            
                          </div>
                          
                          
                          <div class="form-group">
                          <input type="hidden" name="my-tag-name" id="my-tag-id"  value="">
                          <p>Selected Tags: <span id="selectedtags"></span></p>
                          <select id="tags" class="form-control" onchange="showSelectedTags();" >
                            
                          
                          
                          <?php  
                                          // // Tag Display
                                          $select_query = "select * from `tag` where status = 'yes'";
                                          $result = mysqli_query($con, $select_query);
                                          while ($row= mysqli_fetch_assoc($result)){
                                            $tag_title = $row['tag_name'];
                                            echo "<option value='$tag_title' >$tag_title</option>";
                                          }
                                          ?>
                            </select>
                          </div>
                          <div class="form-group">
                          <input type="hidden" name="my-size-name" id="my-size-id"  value="">
                          <p>Selected Sizes: <span id="selectedsizes"></span></p>
                          <select id="sizes" class="form-control" onchange="showSelectedSizes();">
                              <option value="small">small</option>
                              <option value="Medium">Medium</option>
                              <option value="Large">Large</option>
                              <option value="XL">XL</option>
                              <option value="XXL">XXL</option>
                            </select>
                          </div>
                          <div class="form-group">
                          <input type="hidden" name="my-color-name" id="my-color-id"  value="">
                            <p>Selected Colors: <span id="selectedcolors"></span></p>
                            <select id="colors" class="form-control" onchange="showSelectedColors();">
                              <option value="Black">Black</option>
                              <option value="Brown">Brown</option>
                              <option value="Green">Green</option>
                              <option value="Red">Red</option>
                              <option value="Blue">Blue</option>
                            </select>
                          </div>
                          
                        <div class="form-group">
                            <div class="input-group">
                                <label for="">Image 1</label>
                                <input type="file" name="product_image1"  required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="">Image 2</label>
                                <input type="file" name="product_image2" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="">Image 3</label>
                                <input type="file" name="product_image3"  required="required">
                            </div>
                        </div>


                        <div class="form-group">
                            <button name = "submit_product"  type="submit" id="submit_product" class="btn btn-primary btn-block btn-lg">Submit</button>
                        </div>



                    </form>
    
                </div>
            </div>
        </div>
    </div>  



<script>

    $(document).ready(function() {
  $('#submit_product').click(function() {
    var mySpanData1 = $('#selectedcategories').text();
    $('#my-category-id').val(mySpanData1); // set the value of the hidden input field
    var mySpanData2 = $('#selectedtags').text();
    $('#my-tag-id').val(mySpanData2); // set the value of the hidden input field
    var mySpanData3 = $('#selectedsizes').text();
    $('#my-size-id').val(mySpanData3); // set the value of the hidden input field
    var mySpanData4 = $('#selectedcolors').text();
    $('#my-color-id').val(mySpanData4); // set the value of the hidden input field
    $.ajax({
      url: '',
      type: 'POST',
      data: $('#login-form').serialize(),
      success: function(response) {
        console.log(response)
      }
    });
  });
});








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









      $(document).on('click', '.delete_product', function() {
    var productId = $(this).data('product-id');
    $.ajax({
        url: 'delete-product', // Changed URL to point to delete_tag
        type: 'POST',
        data: { product_id: productId },
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
if (isset($_POST['submit_product'])){
  $product_title = $_POST['product_title'];
  $product_description = $_POST['product_description'];
  $product_price = $_POST['product_price'];
  $product_quantity = $_POST['product_quantity'];

  $categoriesString = $_POST['my-category-name'];
  $tagsString = $_POST['my-tag-name'];
  $colorsString = $_POST['my-color-name'];
  $sizesString = $_POST['my-size-name'];

  $categoriesArray = explode(",", $categoriesString);
  // print_r($categoriesArray);
  $tagsArray = explode(",", $tagsString);
  $colorsArray = explode(",", $colorsString);
  $sizesArray = explode(",", $sizesString);


  // Getting Images names
  $product_image1 = $_FILES['product_image1']['name'];
  $product_image2 = $_FILES['product_image2']['name'];
  $product_image3 = $_FILES['product_image3']['name'];

// Getting Images temp names
  $temp_image1 = $_FILES['product_image1']['tmp_name'];
  $temp_image2 = $_FILES['product_image2']['tmp_name'];
  $temp_image3 = $_FILES['product_image3']['tmp_name'];


// Uploading location set
  move_uploaded_file($temp_image1, "../images/$product_image1");
  move_uploaded_file($temp_image2, "../images/$product_image2");
  move_uploaded_file($temp_image3, "../images/$product_image3");




    // Select Query
    $select_query = "SELECT `product_name` FROM `products` WHERE (product_name = '$product_title') AND (description = '$product_description') AND (price = '$product_price')";
    $result = mysqli_query($con, $select_query);
    if (!$result) {
      die('Error: ' . mysqli_error($con));
    }
    $rows_count = mysqli_num_rows($result);
        if ($rows_count == 0){
          //     // Insert Query
          $insert_query = "INSERT INTO `products` (`product_name`, `description`, `price`, `img1`, `img2`, `img3`, `status`) VALUES ('$product_title', '$product_description', '$product_price', '$product_image1', '$product_image2', '$product_image3', 'yes')";
          $sql_execute = mysqli_query($con, $insert_query);
            if ($sql_execute) {
              $select_query1 = "SELECT product_id FROM `products` WHERE (product_name = '$product_title')";
              $result1 = mysqli_query($con, $select_query1);
              $row1 = mysqli_fetch_assoc($result1);
              $product_id = $row1['product_id'];

              $insert_quantity = "INSERT INTO `stock` (`product_id`, `stock`) VALUES ('$product_id', '$product_quantity')";
              $result_qnty = mysqli_query($con, $insert_quantity);
              if (!$result_qnty){
                die('Error: ' . mysqli_error($con));
              }
              // echo "<script>console.log('the result is $categoryiesArray')</script>";
              
              // $product_id= mysqli_fetch_assoc($result1)[1];
              
              // Insert Categories
              foreach ($categoriesArray as $category) {
                $category = trim($category);
                // var_dump($category);
                $select_query1 = "SELECT * FROM `category` WHERE (title = '$category')";
                $result2 = mysqli_query($con, $select_query1);
                if(!$result2){
                  die('Error: ' . mysqli_error($con));
                }
                $row2 = mysqli_fetch_assoc($result2);
                $category_id = $row2['category_id'];
                // echo "<script>alert('the result is $category_id')</script>";
                          // Insert Query
                  $insert_query2 = "INSERT INTO `product_category` (`product_id`, `category_id`) VALUES ('$product_id', '$category_id')";
                  $sql_execute1 = mysqli_query($con, $insert_query2);
                  if (!$sql_execute1){
                    die('Error: ' . mysqli_error($con));

                  }
                }

                // Insert Tags
              foreach ($tagsArray as $tag) {
                $tag = trim($tag);
                // var_dump($tag);
                $select_query2 = "SELECT * FROM `tag` WHERE (tag_name = '$tag')";
                $result3 = mysqli_query($con, $select_query2);
                if(!$result3){
                  die('Error: ' . mysqli_error($con));
                }
                $row3 = mysqli_fetch_assoc($result3);
                $tag_id = $row3['tag_id'];
                // echo "<script>alert('the result is $category_id')</script>";
                          // Insert Query
                  $insert_query3 = "INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES ('$product_id', '$tag_id')";
                  $sql_execute2 = mysqli_query($con, $insert_query3);
                  if (!$sql_execute2){
                    die('Error: ' . mysqli_error($con));

                  }
                }

                // Insert colors
              foreach ($colorsArray as $color) {
                $color = trim($color);
                var_dump($color);
                // echo "<script>alert('the result is $category_id')</script>";
                          // Insert Query
                  $insert_query3 = "INSERT INTO `product_color` (`product_id`, `color`) VALUES ('$product_id', '$color')";
                  $sql_execute2 = mysqli_query($con, $insert_query3);
                  if (!$sql_execute2){
                    die('Error: ' . mysqli_error($con));

                  }
                }

                // Insert sizes
              foreach ($sizesArray as $size) {
                $size = trim($size);
                // var_dump($size);

                // echo "<script>alert('the result is $category_id')</script>";
                          // Insert Query
                  $insert_query3 = "INSERT INTO `product_size` (`product_id`, `size`) VALUES ('$product_id', '$size')";
                  $sql_execute2 = mysqli_query($con, $insert_query3);
                  if (!$sql_execute2){
                    die('Error: ' . mysqli_error($con));

                  }
                }
                  echo "<script>alert('Data Inserted Successfully')</script>";
                }
                else{
                  die('Error: ' . mysqli_error($con));

              }
                }
        else{
          echo "<script> alert('Data Already Available $product_title') </script>";
        }
  }
  





            
   
              // foreach ($tagsArray as $tag) {
              //   $select_query1 = "SELECT tag_id FROM `tag` WHERE (tag_name = '$tag')";
              //   $result1 = mysqli_query($con, $select_query1);
              //   $tag_id= mysqli_fetch_assoc($result1)[1];
              //           // Insert Query
              //   $insert_query = "INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES ('$product_id', '$tag_id')";
              //   $sql_execute = mysqli_query($con, $insert_query);
              // }
                // echo "<script>alert('Data Inserted Successfully')</script>";

?>

<?php






?>





















