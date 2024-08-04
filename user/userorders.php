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
            <title>User Orders</title>
<meta name="description" content="Show the orders with their status, total price etc.">
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
        <h2 class="text-center" style="margin-top: 35px;">My Orders</h2>
        <a href="../index">  <button  class="btn btn-dark">Browse Products </button></a>
        <table class="table" style="margin-top: 6px;">
            <thead>
              <tr>
                <th>Order Number</th>
                <th>Total Payment</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Date</th>
                <th>Invoice</th>
              </tr>
            </thead>
            <tbody>



            <?php  
                // Tag Display

                $customer_id = $_SESSION['userID'];
      $select_query = "select o.order_id as order_id, o.order_date as order_date,  o.order_status as status, o.total_amount as amount, SUM(r.quantity) as quantity FROM orders o, order_line r
      WHERE o.order_id = r.order_id AND  o.customer_id = $customer_id   GROUP BY o.order_id;
      ";
      $result = mysqli_query($con, $select_query);
      while ($row= mysqli_fetch_assoc($result)){
        $order_id= $row['order_id'];
        $order_status = $row['status'];
        $order_date = $row['order_date'];
        $total_amount = $row['amount'];
        $quantity = $row['quantity'];
        
echo "

              <tr>
                <td >
                  $order_id
                </td>
                <td >
                  $total_amount
                </td>
                <td >
                  $quantity
                </td>
                <td >
                  $order_status
                </td>
                <td >
                  $order_date
                </td>";
                if ($order_status == 'processing'){
                  echo "<td >
                  <form method='post' enctype='multipart/form-data'>
                  <input type='file' name='invoice' required>
                  <input type='hidden' name='order_id' value='$order_id'>
                  <button class='btn btn-primary btn-small' name='submitInvoice' style='display: inline;' type='submit'>Button</button>
                  </form>
                </td>";
                }
                else{
                  echo "<td >
                  Uploaded
                </td>";
                }
                echo"
              </tr>";
      }
      ?>

            </tbody>
          </table>
    </div>
</div>


    <!-- End Testimonial Section -->

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
if(isset($_POST['submitInvoice'])){
       // Getting Images names
       $invoice_name = $_FILES['invoice']['name'];
       // Getting Images temp names
         $temp_invoice = $_FILES['invoice']['tmp_name'];
       // Uploading location set
         move_uploaded_file($temp_invoice, "../images/$invoice_name");
         $order_id = $_POST['order_id'];
          
      // Insert Query
      $insert_query = "INSERT INTO `invoices` (`order_id`, `file`) VALUES ('$order_id','$invoice_name')";
      $sql_execute = mysqli_query($con, $insert_query);
      if (!$sql_execute) {
          die('Error: ' . mysqli_error($con));
      }
      // Insert Query
      $update_query = "UPDATE `orders` SET order_status = 'complete' where order_id = $order_id;";
      $sql_execute = mysqli_query($con, $update_query);
      if (!$sql_execute) {
          die('Error: ' . mysqli_error($con));
      }

      
$update_query = "INSERT into `notifications` (`message`, `status`) values('Already present Order has been completed!', 'unread');";
$result = mysqli_query($con, $update_query);


}
?>

