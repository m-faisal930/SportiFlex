<?php
session_start();
$cart_id = $_GET['id'];
$total = $_GET['total'];
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../index';</script>";
  exit;
}
else{
  $customer_id = $_SESSION['userID'];
}

$cart_id = $_GET['id'];

$_SESSION['cart_id'] = $cart_id;
$_SESSION['customer_id'] = $customer_id;

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



    </script>
        <title>Checkout</title>
<meta name="description" content="Leading page towards the finalization of order.">
  </head>
  <body>

 <?php include("./header.php"); ?>

  <body>
    <form method = 'post' class="mt-5 container" action="">
      <div class="row checkout">
        <div class="col-lg-7 p-4">
          <div class="d-flex justify-content-between">



            <h3>Shipping Details</h3>

          </div>

          
          <?php
                        $customer_id = $_SESSION['userID'];
                        $select_query = "SELECT   a.street_address as address, a.city as city, a.postal_code as postcode, c.country_id, c.country_name as country, cu.name as name, cu.phone_number as phone, cu.email_address as email FROM customers cu, countries c, address a WHERE cu.customer_id = a.customer_id AND a.country_id = c.country_id AND a.status = 1  AND a.customer_id = $customer_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $rows_count = mysqli_num_rows($result);
                        $row= mysqli_fetch_assoc($result);
                        $address = $row['address'];
                        $city = $row['city'];
                        $postcode = $row['postcode'];
                        $country = $row['country'];
                        $country_id = $row['country_id'];
                        $username = $_SESSION['user'];
                        $name = $row['name'];
                        $phone = $row['phone'];
                      
echo "

<div id='form-1' class=''>
  <div class='row'>
    <div class='col-12'>
      <div class='form-input'>
        <input
          placeholder='Full Name'
          value = '$name'
          type='text'
          name='fullname'
          id='check-form-input'
        />
        <label
          id='check-form-label'
          class='form-label'
          for='check-form-input'
        >Full Name</label
        >
      </div>
    </div>
  </div>

  <div class='row'>
    <div class='col-12'>
      <div class='form-input'>
        <input
          placeholder='Street Address'
          type='text'
          value ='$address'
          name='address'
          id='check-form-input'
        />
        <label
          id='check-form-label'
          class='form-label'
          for='check-form-input'
        >Street Address</label
        >
      </div>
    </div>
  </div>

  <div class='row'>
    <div class='col-12'>
      <div class='form-input'>
        <input
          placeholder='Town/City'
          type='text'
          value ='$city'
          name='city'
          id='check-form-input'
        />
        <label
          id='check-form-label'
          class='form-label'
          for='check-form-input'
        >Town/City</label
        >
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='col-12'>
      <div class='form-input'>
        <input
          placeholder='Country'
          type='text'
          value = '$country'
          name='country'
          id='check-form-input'
        />
        <label
          id='check-form-label'
          class='form-label'
          for='check-form-input'
        >Country</label
        >
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='col-12'>
      <div class='form-input'>
        <input
          placeholder='Postal Code'
          type='text'
          value='$postcode'
          name='postcode'
          id='check-form-input'
        />
        <label
          id='check-form-label'
          class='form-label'
          for='check-form-input'
        >Postal Code</label
        >
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='col-12'>
      <div class='form-input'>
        <input
          placeholder='Phone'
          type='text'
          value = '$phone'
          name='phone'
          id='check-form-input'
        />
        <label
          id='check-form-label'
          class='form-label'
          for='check-form-input'
        >Phone</label
        >
      </div>
    </div>
  </div>
</div>
<button type='submit' name ='submit_details' class='btn btn-primary btn-sml' style='margin-bottom:5px;'>Save Details</button>";
?>

          <div>
            <div class="form-input">
              <input
                placeholder="Additional Notes (Optional)"
                type="text"
                name="name"
                id="check-form-input"
              />
              <label
                id="check-form-label"
                class="form-label"
                for="check-form-input"
                >Additional Notes (Optional)</label
              >
            </div>
            <span class="d-flex check-for-change-address">
              <input type="checkbox" />
              <p class="mt-3 ml-8">
                Yes, I'm ok with you sending me additional newsletter and email
                content (optional)
              </p>
            </span>
          </div>
        </div>
                      <!-- </div> -->
                      </form>
        <div class="proceed-to-checkout col table-responsive">
          <table class="table">
            <tbody>

              <tr>
                    <th>Subtotals</th>
                    <td>$<?php echo $_GET['total'];   ?></td>
              </tr>
              <tr>
                <td>Shipping Fee</td>
                <td>$234</td>
              </tr>
              <tr>
                    <th>Totals</th>
                    <td>$333</td>
              </tr>
              

            </tbody>
          </table>











          <p class="p-4">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
          <span class="p-4 d-flex check-for-change-address">
            <input type="checkbox" />
            <p class="mt-3 ml-8">
              Yes, I'm ok with you sending me additional newsletter and email
              content (optional)
            </p>
          </span>



          <form action="generate_invoice" method="POST">
        <!-- Include your checkout form fields here -->

        <div class="p-4 d-grid gap-2">
        <button id="myOrder"  name="invoice" class="btn btn-danger" type="submit">Generate Invoice</button>
        </div>
    </form>


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




<?php

// Sinpu Logic
if (isset($_POST['submit_details'])){
  $address = $_POST['address'];
    $name = $_POST['fullname'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];

    // Insert Query

    $insert_query = "UPDATE customers
    SET name = '$name', phone_number = '$phone'
    WHERE customer_id = $customer_id;";
    $sql_execute = mysqli_query($con, $insert_query);
    if (!$sql_execute){
      echo"<script>alert('There is an Error')</script>";
    }

    $insert_query1 = "UPDATE address
    SET street_address = '$address', city = '$city' , postal_code = '$postcode'
    WHERE customer_id = $customer_id AND status = 1;";

    $sql_execute1 = mysqli_query($con, $insert_query1);
    if (!$sql_execute1){
      echo"<script>alert('There is an Error')</script>";
    }
    echo "<script>alert('Data Inserted Successfuly')</script>";

}














?>

