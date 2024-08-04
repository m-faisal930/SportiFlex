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

function popUpSearch() {
        showSearchForm();
        var div = document.getElementById("nav-container");
        div.style.display = "none";
        var div = document.getElementById("mySearch");
        div.style.display = "block";

      }
</script>
            <title>User Dashboard</title>
<meta name="description" content="User can move to see orders and can also manage his/her account.">
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
        <h2 class="text-center" style="margin-top: 35px;">My Account</h2>
        <?php
         echo "<p>Hello $username (not $username? <a href='#' style='text-decoration: none; color: #0a0a0a;'> <a href = '../logout'> Log Out </a>)</a></p>"
        ?>
        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
    </div>
</div>


    <!-- End Testimonial Section -->

    <?php include("../footer.php");  ?>
<?php include("../form.php");  ?>
<?php include("../search.php");  ?>






   
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



