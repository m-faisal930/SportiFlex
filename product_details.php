<?php
session_start();
// include("./functions/common_functions");
include("./connection/connect.php");
// <!-- include("./Admin_area/functions/common_functions"); -->

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <!-- Font Awesome Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- css file -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="product_details.css" />
    <!-- Bootstrap CSS link -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      function hideDiv() {
        showDiv();
        var div = document.getElementById("nav-container");
        div.style.display = "none";
        var div = document.getElementById("myModal");
        div.style.display = "block";

        $("#register-title").hide();
        $("#change-title").hide();
        $(document).ready(function () {
          $("#register-button").click(function () {
            $("#login-form").hide();
            $("#login-title").hide();
            $("#register-form").show();
            $("#register-title").show();
          });
        });
        $(document).ready(function () {
          $("#change-password-button").click(function () {
            $("#login-form").hide();
            $("#login-title").hide();
            $("#change-password").show();
            $("#change-title").show();
          });
        });
      }
    </script>
            <title>Product Details</title>
<meta name="description" content="This page give the description of each product with images.">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- Products Detail -->
<?php
$product_id = $_GET['id'];
$select_query = "SELECT * FROM products WHERE product_id = $product_id;";
$result = mysqli_query($con, $select_query);
$row= mysqli_fetch_assoc($result);
$product_name = $row['product_name'];
$description = $row['description'];
$img1 = $row['img1'];
$img2 = $row['img3'];
$img3 = $row['img2'];
$price = $row['price'];
$product_id = $row['product_id'];

?>
    <section class="product_details">
      <h2 class="text-center mt-3">Product Details</h2>

      <div class="container my-5">
        <div class="row">
          <div class="col-md-6">
            <div
              id="productCarousel"
              class="carousel slide"
              data-ride="carousel"
            >
              <ol class="carousel-indicators">
                <li
                  data-target="#productCarousel"
                  data-slide-to="0"
                  class="active"
                ></li>
                <li data-target="#productCarousel" data-slide-to="1"></li>
                <li data-target="#productCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    class="d-block w-100"
                    src="./images/<?php echo"$img1";   ?>"
                    alt="<?php echo '$product_name'   ?>"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="./images/<?php echo"$img2";   ?>"
                    alt="<?php echo '$product_name'   ?>"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="./images/<?php echo"$img3";   ?>"
                    alt="<?php echo '$product_name'   ?>"
                  />
                </div>
              </div>
              <a
                class="carousel-control-prev"
                href="#productCarousel"
                role="button"
                data-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Previous</span>
              </a>
              <a
                class="carousel-control-next"
                href="#productCarousel"
                role="button"
                data-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="">Product Title</h2>
            <h3><span class="badge" style="margin-top:3px;">20% Off</span></h3>
            <h3>$ <?php echo $price;   ?></h3>
            <hr />
            <form method = "post" action="product_details?id=<?php echo $product_id; ?>">
              <input type='hidden' name = 'productID' value ="<?php echo'$product_id';?>" >
            <div class="sizes">
              <p class="">Size</p>
       

              <div style="margin-left: 37px" class="">
              <?php
                $select_query = "SELECT size
                FROM product_size c, products p WHERE c.product_id = p.product_id AND c.product_id = $product_id;";
                
                $result = mysqli_query($con, $select_query);
        
                $num_rows = mysqli_num_rows($result);
                      while ($row= mysqli_fetch_assoc($result)){
                        $size = $row['size'];
                      
                        echo "
                        <label>
                        <input type='radio' name='selectedsize' value='$size' required> $size
                      </label>";
                      
                      }

            ?>
              </div>
            </div>
            <div class="colors">
              <p class="">Color</p>


              
            <div style='margin-left: 37px' class=''>
            <?php
                $select_query = "SELECT color
                FROM product_color c, products p WHERE c.product_id = p.product_id AND c.product_id = $product_id;";
                
                $result = mysqli_query($con, $select_query);
        
                $num_rows = mysqli_num_rows($result);
                      while ($row= mysqli_fetch_assoc($result)){
                        $color = $row['color'];

                        echo "
                        <label>
                        <input type='radio' name='selectedcolor' value='$color' required> $color
                      </label>";
                      
                      
                      }
                      


            ?>      
              </div>
            </div>

            <hr />
            <div class="pro-detail">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input
                  type="number"
                  class="form-control"
                  id="quantity"
                  name = "quantity"
                  value="1"
                  min="1"
                />
              </div>
              <!-- <button name="add_to_cart" type="submit" class="btn">Add to Cart</button> -->
              <button name ="submitCart"  type = "submit" style="padding: 5px 10px; font-size: 12px;">Add To Cart</button>
              <!-- <button name ="submitWishlist"  type = "submit" style="padding: 5px 10px; font-size: 12px;">Add To Wishlist <i class="far fa-heart" style="color:white;"></i
              ></button> -->
              
              
            </div>
          </form>
        <div>
          <form method = "post">
            <button name ="submitWishlist"  type = "submit" style="padding: 5px 10px; font-size: 12px; margin-top:5px;">Add To Wishlist <i class="far fa-heart" style="color:black;"></i></button>
          </form>
        </div>
            <div class="share-icons">
              <hr />
              <p style="display: inline-block">Share</p>
              <i
                style="margin-left: 4px; cursor: pointer"
                class="fab fa-instagram"
              >
              </i
              ><i
                style="margin-left: 4px; cursor: pointer"
                class="fab fa-twitter"
              ></i
              ><i
                style="margin-left: 4px; cursor: pointer"
                class="fab fa-facebook-f"
              ></i>
            </div>
          </div>

          <div class="product-description" style="margin-top:3px;">
            <h2>Tags</h2>
<?php
                $select_query = "SELECT `tag_name` FROM tag t, product_tag p
                WHERE t.tag_id = p.tag_id AND t.status = 'yes' AND p.product_id = $product_id;";
                
                $result = mysqli_query($con, $select_query);

                while ($row= mysqli_fetch_assoc($result)){
                  echo "<span>" . $row['tag_name']    . " | </span>";
                }
?>

          </div>
          <div class="product-description" style="margin-top:3px;">
            <h2>Description</h2>
              <?php
                echo "$description";
              ?>
          </div>
          <div class="product-reviews" style="margin-top:3px;">
            <h2>Reviews</h2>
            <?php
                $select_query = "SELECT message, username 
                FROM reviews r, customers c WHERE c.customer_id = r.customer_id AND product_id = $product_id;";
                
                $result = mysqli_query($con, $select_query);
        
                $num_rows = mysqli_num_rows($result);
                if ($num_rows >0){
                      while ($row= mysqli_fetch_assoc($result)){
                        $name = $row['username'];
                        $message = $row['message'];
                        echo"
                        <p style='margin-left:100px; text-align:center;'>
                        <strong>$name</strong>:  $message
                                    </p>";
                      }
              }
              else{
                echo"
                <p style='margin-left:100px; text-align:center;'>
                There are no reviews yet
                            </p>
                ";
              }
            ?>

            <p style="margin-left:100px; text-align:center;">
              Only logged in customers who have purchased this product may leave a review.
            </p>
          </div>
        </div>
      </div>
    </section>


<?php
include('./footer.php');
include('./form.php');
?>





<script>
      function showDiv() {
        var div = document.getElementById("myModal");
        div.style.display = "block";
      }



      function show_login() {
        $("#register-form").hide();
        $("#register-title").hide();
        $("#change-password").hide();
        $("#change-title").hide();
        $("#login-form").show();
        $("#login-title").show();
      }
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

    <script src="main.js"></script>
  </body>
</html>


<?php




if (isset($_POST['submitCart'])){
  // Check if the user is not logged in
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
    echo "<script>alert('Please Login First'); </script>";
  }
  
  else{
  $customer_id = $_SESSION['userID'];
  $size = $_POST['selectedsize'];
  $color = $_POST['selectedcolor'];
  $quantity = $_POST['quantity'];
  $productID = $_GET['id'];
  $found = FALSE;

  $select_query = "SELECT * FROM `shopping_cart` Where `customer_id` = $customer_id AND `ordered` = 'no';";
 $result = mysqli_query($con, $select_query);
 if (!$result) {
  die('Query Error: ' . mysqli_error($con));
}
  while($row_data = mysqli_fetch_assoc($result)){
    $cart_id = $row_data['cart_id'];
    $select_query1 = "SELECT product_id FROM `cart_items` WHere cart_id = $cart_id;";
    $result1 = mysqli_query($con, $select_query1);
    
    // print_r($result1);
    while($rows = mysqli_fetch_assoc($result1)){
                                      $id = $rows['product_id'];
                                      if ($id == $productID){
                                        $found = TRUE;
                                        // echo "<script>alert('thshdt')</script>";
                                      
                                    }
                                  }
}



          if ($found == FALSE){
              $insert_query = "INSERT INTO `shopping_cart` (`customer_id`, `ordered`)
              VALUES ($customer_id,'no');";
              $result = mysqli_query($con, $insert_query);
              if ($result) {
                $cart_id = mysqli_insert_id($con);
                
              }


                $insert_query = "INSERT INTO `cart_items` (`cart_id`, `product_id`, `color`, `size`, `quantity`)
                VALUES ('$cart_id', '$product_id', '$color', '$size', '$quantity');";
                
                $result = mysqli_query($con, $insert_query);
                      
                  if (!$result) {
                    die('Error: ' . mysqli_error($con));
                    
                  }

          }




  else{
    echo "<script> alert('Product already present')</script>";
  }





  }

  




}



if (isset($_POST['submitWishlist'])){
  // Check if the user is not logged in
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
    echo "<script>alert('Please Login First'); </script>";
  }
  
  else{
            $customer_id = $_SESSION['userID'];
            $productID = $_GET['id'];
            $select_query = "SELECT * FROM `wishlist` Where `customer_id` = $customer_id AND `product_id` = '$product_id';";
            $result = mysqli_query($con, $select_query);
            if (!$result) {
              echo "<script>alert('Already added please visit Wishlist page')</script>";
              die('Query Error: ' . mysqli_error($con));
            }
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0){
              echo "<script>alert('Already added please visit Wishlist page')</script>";
            }
            else{
              $add_query = "INSERT INTO `wishlist` (`customer_id`,`product_id`) VALUES('$customer_id', '$product_id');";
              $result = mysqli_query($con, $add_query);

              if (!$result) {
              die('Query Error: ' . mysqli_error($con));
            }
            echo "<script> alert('Item Added Successfuly')</script>";
            }
  }}
?>