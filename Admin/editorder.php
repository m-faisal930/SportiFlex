<?php
session_start();

// Check if the user is not logged in
if ($_SESSION['adminLoggedIn'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../faisal';</script>";
  exit;
}
?>

<?php
include('../connection/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
            <title>Edit Order</title>
<meta name="description" content="Admin can edit the status of any order using this page.">
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
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="styleindex.css">
    <!-- <link rel="stylesheet" href="./styleindex.css" /> -->
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
    <div class="order-detail-top ">
      <button class="button outlined btn-sm" style="border: none; margin-top: 50px; margin-left: 50px; font-weight: bold;">
          <!-- <div class="link-wrapper"> -->
          <a class="link hover-1" href="vieworders.html"
            ><i class="fas fa-light fa-arrow-left"></i>Back To Orders</a
          >
        </button>
    <h2 class="text-center mb-4">You Can Take Actions</h2>
</div>
    <div class="order-detail_items d-flex justify-content-center align-items-center flex-wrap">
        <div class="order-detail-item mr-4 text-center" style="background-color: #f2f2f2; color: #000;" >
            <h4 class="text-center">Order Detail(<?php echo $_GET['order_id'];  ?>)</h4>
            <table class="table">
                <tbody style="font-size: 18px;">
                    <tr>
                        <td>Order Date</td>
                        <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT order_date FROM orders WHERE order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        $row= mysqli_fetch_assoc($result);
                        $order_date = $row['order_date'];

                        echo"<td>$order_date</td>
                      </tr>
";
                      ?>
                </tbody>
              </table>
        </div>
        <div class="order-detail-item mr-4 text-center" style="background-color: #f2f2f2; color: #000;" >
            <h4 class="text-center">Customer Details</h4>
            <table class="table">
                <tbody style="font-size: 18px;">
                    <tr>
                      
                    <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT  c.username as name, c.email_address as email, c.phone_number as phone FROM orders o, customers c WHERE o.customer_id = c.customer_id AND order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $row= mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        echo "  <td>Customer Name</td>
                       <td>$name</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>$phone</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>$email</td>
                    </tr>";
?>
                </tbody>
              </table>
        </div>
        <div class="order-detail-item mr-4 text-center" style="background-color: #f2f2f2; color: #000;" >
            <h4 class="text-center">More Detail</h4>
            <table class="table">
                <tbody style="font-size: 18px;">
                    <tr>
                    <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT order_status, total_amount FROM orders WHERE order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $row= mysqli_fetch_assoc($result);
                        $order_status = $row['order_status'];
                        $total_amount = $row['total_amount'];
                       echo" <td>Order Status</td>
                        <td>$order_status</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>$total_amount</td>
                    </tr>";
                    ?>
                </tbody>
              </table>
        </div>
    </div>

    <div style="margin-top: 30px;" class="container order-editor">
        <form action="" method = 'post'>
            <div class="form-group">
                <div class="input-group">

                <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT order_status FROM orders WHERE order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $row= mysqli_fetch_assoc($result);
                        $order_status = $row['order_status'];
                        if ($order_status == 'completed'){
                          echo "
                          <label class='form-control' for='status'> Change Status</label>
                          <select class='form-control' name='order_status' id='status' disabled>
                              <option value='completed'>Completed</option>";
                        }
                        else{
                          echo "
                    <label class='form-control' for='status'> Change Status</label>
                    <select class='form-control' name='order_status' id='status'>
                        <option value='completed'>Completed</option>
                        <option value='delivered'>Delivered</option>
                        <option value='shipped'>Shipped</option>
                        <option value='processing'>Processing</option>
                        <option value='canceled'>Canceled</option>
                    </select> 
                    ";}
                    ?>
                </div>
            </div>
            <button type = 'submit' class="btn btn-danger btn-large " name ="submit_status">Submit</button>
        </form>
    </div>







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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script src="admincode.js"></script>
  </body>
</html>


<?php
if (isset($_POST['submit_status'])){
  $new_status = $_POST['order_status'];
  $update_query = "UPDATE orders set orders.order_status = '$new_status' WHERE order_id = $order_id;";
  $result = mysqli_query($con, $update_query);
  if (!$result){
    die('Error: ' . mysqli_error($con));
  }
  echo "<script>alert('Data Updated Successfully')</script>";
}
?>