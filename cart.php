<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = './index';</script>";
  exit;
}
else{
  $customer_id = $_SESSION['userID'];
}
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
    <!-- Bootstrap CSS link -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>


function popUpSearch() {
        showSearchForm();
        var div = document.getElementById("nav-container");
        div.style.display = "none";
        var div = document.getElementById("mySearch");
        div.style.display = "block";

      }

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
        <title>Cart</title>
<meta name="description" content="A list of the products that have been added to the cart, including the product name, price, and quantity.">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- Cart Section -->

    <section id="cart-section" class="cart container" style="color: #686868">
      <h2 class="text-center">Cart</h2>
      <div class="row shopping-cart-content">
        <div class="col-lg-7 col-xl-8 table-responsive">
          <table class="table">
            <tbody>


            <?php
                              // Tag Display
                          $subtotal = 0;
                          $select_query = "SELECT product_name, description, price, img1, c.quantity as qnty, s.cart_id as cart_id
                          FROM products p, shopping_cart s, cart_items c
                          WHERE p.product_id = c.product_id AND s.cart_id = c.cart_id AND s.customer_id = $customer_id AND s.ordered = 'no';
                          ";
                          $result = mysqli_query($con, $select_query);
                          $row_count = mysqli_num_rows($result);
                          if ($row_count >0){
                          while ($row= mysqli_fetch_assoc($result)){
                            $name = $row['product_name'];
                            $unitPrice = $row['price'];
                            $img = $row['img1'];
                            $quantity = $row['qnty'];
                            $itemPrice = $unitPrice * $quantity;
                            $subtotal +=$itemPrice;
                            $cart_id = $row['cart_id'];
                            $emptyCart = FALSE;
                            

echo "
              <tr>
                <td>
                  <img class='img-thumbnail' src='./images/$img' alt='' />
                </td>
                <td class='cart-data'>
                  <div class='row'>
                    <div
                      class='col-md-6 col-sm-12 product-name'
                      data-title='Product'
                    >
                      <a class='pro-title' href=''
                        >$name</a
                      >
                      <div class='product-price' data-title='Price'>
                        <span class='woocommerce-Price-amount amount'
                          ><bdi
                            ><span class='woocommerce-Price-currencySymbol'
                              >£</span
                            >$unitPrice</bdi
                          ></span
                        >
                      </div>
                    </div>
                    <div
                      class='product-quantity col-md-3 col-6'
                      data-title='Quantity'
                    >
                      <div class='quantity'>
                        <span id = 'minus' class='minus'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-minus'>
                            <line x1='5' y1='12' x2='19' y2='12'></line>
                          </svg>
                        </span>
                        <input type='number' class='input-text qty text text-center' step='1' min='1' name='quantity' value='$quantity' title='Qty' placeholder='' inputmode='numeric' />
                        <span id = 'plus' class='plus'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather  feather-plus'>
                            <line x1='12' y1='5' x2='12' y2='19'></line>
                            <line x1='5' y1='12' x2='19' y2='12'></line>
                          </svg>
                        </span>
                      </div>



                    </div>
                    <div
                      class='product-subtotal col-md-3 col-6'
                      data-title='Subtotal'
                    >
                      <span class='woocommerce-Price-amount amount'
                        ><bdi
                          ><span class='woocommerce-Price-currencySymbol'
                            >$</span
                          >$itemPrice</bdi
                        ></span
                      >
                    </div>
                    <div class='product-actions col-12'>
                      <a
                      name = ''
                      href='./delete-cart?id=$cart_id'
                      class='remove link hover-1 delete-cart'
                      data-cart-id = '$cart_id'
                      >×</a
                      >
                    </div>
                  </div>
                </td>
              </tr>";
                          }
                        }
            else{
              echo "<p> No Item To Show</>";
              $emptyCart = TRUE;
            }
            ?>

            </tbody>
          </table>
        </div>
        <div class="payment-table p-3 col table-responsive">
            <table class="table">
                <tbody>
                  <tr>
                      <th>
                          Cart Totals
                      </th>
                  </tr>
                <tr>
                    <th class="text-uppercase">Subtotals</th>
                    <td>$<?php echo $subtotal;   ?></td>
                  </tr>
                <tr>
                    <td>
                        <h5 class="text-uppercase">Shipping</h5>
                        
                        <p>Shipping options will be updated during checkout.</p>
                    </td>
                    <tr>
                        <th class="text-uppercase">Totals</th>
                        <td>$<?php echo $subtotal;   ?></td>
                      </tr>
                    <tr>
                  </tr>
                </tbody>
              </table>
              <?php 
                if ($emptyCart == FALSE){
               echo "<a class='checkout_id' data-cart-id='$cart_id' style='text-decoration: none; background-color: black; color:#fff;' href='./checkout?id=$cart_id&total=$subtotal'>Checkout</a>";
                }
                else{
               echo "<a class='checkout_id'  style='text-decoration: none; background-color: black; color:#fff;' href='#'>Checkout</a>";
               echo "<script> alert('please add some items')</script>";
                }
              ?>
        </div>
      </div>
    </section>

    <!-- End Cart Section -->

    <!-- End Testimonial Section -->

    <?php include("./footer.php");  ?>
<?php include("./form.php");  ?>
<?php include("./search.php");  ?>



   
<?php  include("./connection/connect.php"); ?>
   <!-- Form Setup -->
    <!-- Modal HTML -->










    <script>
      function showSearchForm() {
        var div = document.getElementById("mySearch");
        div.style.display = "block";
      }

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

<!-- Plus Minus Button Logic -->
<script>

  document.addEventListener("DOMContentLoaded", function() {
    const minusButton = document.querySelector(".minus");
    const plusButton = document.querySelector(".plus");
    const quantityInput = document.querySelector(".qty");

    minusButton.addEventListener("click", function() {
      const currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    });

    plusButton.addEventListener("click", function() {
      const currentValue = parseInt(quantityInput.value);
      quantityInput.value = currentValue + 1;
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

    <script src="main.js"></script>
  </body>
</html>




