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
    <title>Admin Dashboard</title>
<meta name="description" content="FlexiSports Admin Dashboard provide an interface to manage all the admin activities..">
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

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>

    <div class="wrapper d-flex align-items-stretch">

    <?php
    include('./sidebar.php');
    ?>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
<?php include('./nav.php');   ?>
        <div
          class="dashborad-buttons d-flex flex-wrap justify-content-center align-items-center"
        >
          <div
            class="dashboard-button-item text-center"
            style="background-color: #1d1919"
          >

          <?php
                  // Insert Query

        $select_query = "SELECT *  FROM orders;";
        $sql_execute = mysqli_query($con, $select_query);
        $rows = mysqli_num_rows($sql_execute);
            ?>


            <p style="font-weight: bold; font-size: 24px"><?php  echo $rows;  ?></p>
            <p>Total Orders</p>
          </div>
          <div
            class="dashboard-button-item text-center"
            style="background-color: rgb(235 165 29)"
          >
          <?php
                  // Insert Query

        $select_query = "SELECT SUM(total_amount) as sum FROM orders;";
        $sql_execute = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($sql_execute);
        $sum = $row['sum'];
            ?>
            <p style="font-weight: bold; font-size: 24px">$  <?php   echo $sum;     ?></p>
            <p>Total Erning</p>
          </div>

          <div
            class="dashboard-button-item text-center"
            style="background-color: #1d1919"
          >
          <?php
                  // Insert Query

        $select_query = "SELECT avg(quantity) as avg FROM order_line GROUP BY order_id;";
        $sql_execute = mysqli_query($con, $select_query);
        $myTotalValue = 0;
        while ($row_data = mysqli_fetch_assoc($sql_execute)){
          $myTotalValue+=$row_data['avg'];
        }
        $row = mysqli_num_rows($sql_execute);
            ?>
            <p style="font-weight: bold; font-size: 24px"><?php echo $myTotalValue;  ?></p>
            <p>Avg.Order Size</p>
          </div>
        </div>
        <div class="products-table p-5">
          <table class="table">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Product Title</th>
                <th>Items Sold</th>
                <th>Total Earning (in $)</th>
                <th>Ratting</th>
              </tr>
            </thead>
            <tbody>


            <?php
$select_query = "SELECT p.product_name as product_name, SUM(o.quantity) as product_quantity, (o.quantity * p.price) as total_price, AVG(r.rating) as product_ratting
FROM order_line o, products p, reviews r
WHERE p.product_id = o.product_id AND p.product_id = r.product_id
GROUP BY o.product_id;";
$result = mysqli_query($con, $select_query);
$i = 1;
while ($row= mysqli_fetch_assoc($result)){
  $product_name = $row['product_name'];
  $quantity = $row['product_quantity'];
  $total_price = $row['total_price'];
  $ratting = $row['product_ratting'];
          echo "  
              <tr>
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
                  $total_price
                </td>
                <td >
                  $ratting
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

    <!-- <script src="main.js"></script> -->
  </body>
</html>

<!-- SELECT p.product_name as "Product Title", SUM(o.quantity) as "Quantity", (o.quantity * p.price) AS "Total Price", AVG(r.rating) as "Ratting"
FROM order_line o, products p, reviews r
WHERE p.product_id = o.product_id AND p.product_id = r.product_id
GROUP BY o.product_id; -->