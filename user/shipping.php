<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../index';</script>";
  exit;
}

include('../connection/connect.php');
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
    <link rel="stylesheet" href="../style.css" />
    <!-- Bootstrap CSS link -->
    <style>
        body{
            background-color: #f8f8f8;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
            <title>Shipping Address</title>
<meta name="description" content="Shipping address of the user.">
</head>
<body>

<?php
include('../header.php');

?>


<!-- user Dashboard Section -->

<div class="dashboard-items row">
<?php
include('./side.php');
?>


    <div class="dashboard-item col-md-8 " style="padding: 0px 70px;">
        <h2 class="text-center" style="margin-top: 35px;">Edit Shipping Address</h2>


        <form action="" method = "post">

        <?php
                        $check_update_query = 343;
                        $customer_id = $_SESSION['userID'];
                        $select_query = "SELECT   a.street_address as address, a.city as city, a.postal_code as postcode, c.country_id, c.country_name as country FROM customers cu, countries c, address a WHERE cu.customer_id = a.customer_id AND a.country_id = c.country_id AND a.status = 0  AND a.customer_id = $customer_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $rows_count = mysqli_num_rows($result);
                        if ($rows_count >0){
                          $check_update_query = 1;
                        $row= mysqli_fetch_assoc($result);
                        $address = $row['address'];
                        $city = $row['city'];
                        $postcode = $row['postcode'];
                        $country = $row['country'];
                        $country_id = $row['country_id'];
                        $username = $_SESSION['user'];
           echo"                    
           <div id='form-1' class=''>
           <div class='row'>
             <div class='col-12'>
               <div class='form-input'>
                 <input
                   placeholder='Name'
                   type='text'
                   name='name'
                   value = '$username'
                   id='check-form-input'
                 />
                 <label
                   id='check-form-label'
                   class='form-label'
                   for='check-form-input'
                   >Name</label
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
                   name='address'
                   value = '$address'
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
                   name='city'
                   value = '$city'
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
                   placeholder='Postal Code'
                   type='text'
                   name='postcode'
                   value = '$postcode'
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
           </div>";}
                    else{
                      $check_update_query = 0;
                      echo "                    
                      <div id='form-1' class=''>
                      <div class='row'>
                        <div class='col-12'>
                          <div class='form-input'>
                            <input
                              placeholder='Name'
                              type='text'
                              name='name'
                              id='check-form-input'
                            />
                            <label
                              id='check-form-label'
                              class='form-label'
                              for='check-form-input'
                              >Name</label
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
                              placeholder='Postal Code'
                              type='text'
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

";
                    }

                  
          ?>
              <button type = "submit" name="change_address" class='btn btn-danger'>Save Change</button>
              </div>
              </form>
</div>



<?php include("../footer.php");  ?>
<?php include("../form.php");  ?>



   
   <!-- Form Setup -->
    <!-- Modal HTML -->










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
if (isset($_POST['change_address'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    

    $postcode = $_POST['postcode'];
    // Check for update query
    if ($check_update_query == 1){
          // Update customer query
          $update_customer_query = "UPDATE customers
          SET `username` = '$name'
          WHERE customer_id = $customer_id";

          // Update address query
          $update_address_query = "UPDATE address
          SET `street_address` = '$address', `city` = '$city', `postal_code` = '$postcode'
          WHERE customer_id = $customer_id AND status = 0";

          // Execute the update queries separately
          mysqli_query($con, $update_customer_query);
          mysqli_query($con, $update_address_query);
          
                if (!$update_customer_query){
                  die('Error: ' . mysqli_error($con));
                }
                if (!$update_address_query){
                  die('Error: ' . mysqli_error($con));
                }
                echo "<script>alert('Updated Successfully')</script>";
   }
   
   else{
     
     $country_query = "SELECT c.country_id FROM countries c, address a Where c.country_id = a.country_id AND a.customer_id = $customer_id";
     $result = mysqli_query($con, $country_query);
     if (!$result){
      die('Error: ' . mysqli_error($con));
    }
     $row= mysqli_fetch_assoc($result);
     $country_id = $row['country_id'];
    $inser_query = "INSERT INTO address (customer_id, street_address, city, postal_code, country_id, status)
    VALUES ($customer_id, '$address', '$city', '$postcode', $country_id, 0);";
    $result = mysqli_query($con, $inser_query);
    if (!$result){
     die('Error: ' . mysqli_error($con));
   }
   }

}
?>




