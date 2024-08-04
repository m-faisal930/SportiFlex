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
    <title>Sidebar 01</title>
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
    <h2 class="text-center mb-4">Order Details</h2>
</div>
    <div class="order-detail_items d-flex justify-content-center align-items-center flex-wrap">
        <div class="order-detail-item mr-4 text-center" style="background-color: #f2f2f2; color: #000;" >
            <h4 class="text-center">Order Detail(<?php  echo $_GET['order_id']; ?>)</h4>
            <table class="table">
                <tbody style="font-size: 18px;">
                    <tr>
                        <td>Order Date</td>
                        <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT order_date, order_status FROM orders WHERE order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        $row= mysqli_fetch_assoc($result);
                        $order_date = $row['order_date'];
                        $status = $row['order_status'];
                        echo"<td>$order_date</td>
                      </tr>
";
if ($status != 'processing'){

  
$select_query = "SELECT file FROM `invoices` WHERE order_id = $order_id;";
  $result = mysqli_query($con, $select_query);
  $row= mysqli_fetch_assoc($result);
  $file_name = $row['file'];
$file_path = '../images/'.$file_name;  // Replace with the actual file path on the server

  // Check if the file exists
  if (file_exists($file_path)) {
      echo '<a style="color: black;" class="btn btn-danger" href="download.php?file='.$file_path.'" download>Download Invoice Now</a>';
  } else {
      echo 'File not found.';
  }
  





}
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

    <div class="addresses d-flex justify-content-center">
        <div class="address p-4 mt-5 mr-4" style="background-color:#f2f2f2; color: #000; width: 40%; height: 250px; border-radius: 3px;">
            <h3>Billing Address</h3>
            
            <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT  a.street_address as address, a.city as city, a.postal_code as postcode, c.country_name as country FROM orders o, countries c, address a WHERE o.customer_id = a.customer_id AND a.country_id = c.country_id AND a.status = 1  AND o.order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $rows_count = mysqli_num_rows($result);
                        if ($rows_count >0){
                        $row= mysqli_fetch_assoc($result);
                        $address = $row['address'];
                        $city = $row['city'];
                        $postcode = $row['postcode'];
                        $country = $row['country'];
           echo" <p>$address</p>
            <p>$postcode</p>
                <p>$city</p>
                    <p>$country</p>";}
                    else{
                      echo "<p>No Address Found</p>";
                    }
                    ?>
        </div>
        <div class="address p-4 mt-5 mr-4" style="background-color:#f2f2f2; color: #000; width: 40%; height: 250px; border-radius: 3px;">
            <h3>Shipping Address</h3>
            <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT  a.street_address as address, a.city as city, a.postal_code as postcode, c.country_name as country FROM orders o, countries c, address a WHERE o.customer_id = a.customer_id AND a.country_id = c.country_id AND a.status = 0  AND o.order_id = $order_id;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $rows_count = mysqli_num_rows($result);
                        if ($rows_count >0){
                        $row= mysqli_fetch_assoc($result);
                        $address = $row['address'];
                        $city = $row['city'];
                        $postcode = $row['postcode'];
                        $country = $row['country'];
           echo" <p>$address</p>
            <p>$postcode</p>
                <p>$city</p>
                    <p>$country</p>";}
                    else{
                      echo "<p>No Address Found</p>";
                    }
                    ?>
        </div>
    </div>

    <div style="margin-top: 50px;" class=" container order-detail-table">
    <table class="table">
        <thead>

            <tr>
              <th>
                Product
              </th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
            </tr>
        </thead>
        <tbody>

        <?php
                        $order_id = $_GET['order_id'];
                        $select_query = "SELECT p.img1 as img, p.product_name as product_name, p.price as price, ol.quantity as quantity, (p.price * ol.quantity) as total_price
                        FROM products p, order_line ol
                        WHERE ol.product_id = p.product_id AND ol.order_id = 1;";
                        $result = mysqli_query($con, $select_query);
                        if (!$result){
                          die('Error: ' . mysqli_error($con));
                        }
                        $rows_count = mysqli_num_rows($result);
                        $total = 0;
                        if ($rows_count >0){
                          while ($row= mysqli_fetch_assoc($result)){
                                $img = $row['img'];
                                $product_name = $row['product_name'];
                                $price = $row['price'];
                                $totalprice = $row['total_price'];
                                $quantity = $row['quantity'];

                                echo "<tr>

                                <td>
                                  <img style='width: 70px; height: 70px;' class='img-thumbnail mr-3' src='../images/$img' alt='' />
                                  $product_name
                                </td>
                                <td>$quantity</td>
                                <td>$price</td>
                                <td>$totalprice</td>
                              </tr>";
                    $total = $total + $totalprice;
                      
                        }
                      }

?>







          <tr style="font-size: 18px; font-weight: bold;">
            <td>

            </td>
            <td></td>
            <td>Sub Total</td>
         <?php   echo "<td>$total     </td>"; ?>
          </tr>
          <tr style="font-size: 18px; ">
            <td>

            </td>
            <td></td>
            <td>Shipping Fee</td>
            <td>$ 3</td>
          </tr>
          <tr style="font-size: 18px; font-weight: bolder;">
            <td>

            </td>
            <td></td>
            <td>Grand Total</td>
            <td><strong>$ 2353</strong></td>
          </tr>
        </tbody>
      </table>
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
