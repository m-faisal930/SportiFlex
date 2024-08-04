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
            <title>Notification</title>
<meta name="description" content="Here we show all the notifications related to new order etc.">
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
    <link rel="stylesheet" href="../style.css" />
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
<h2 class="text-center">Messages For You</h2>
        <div class="products-table p-5">
          <table class="table">
            <thead>
              <tr>
                <th>Ser No</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>


            <?php  
                // Tag Display
$ser_no = 1;
      $select_query = "SELECT * from notifications;
      ";
      $result = mysqli_query($con, $select_query);
      while ($row= mysqli_fetch_assoc($result)){
        $message = $row['message'];

echo "
              <tr>
              <td>
              $ser_no
              </td>
                <td >
                  $message
                </td>

              </tr>";
              $ser_no+=1;
      }
      ?>

        

            </tbody>
          </table>
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
        // Insert Query
        $insert_query = "UPDATE notifications SET status = 'read' where status = 'unread';";
        $sql_execute = mysqli_query($con, $insert_query);
?>