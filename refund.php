


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
            <title>Refund Policy</title>
<meta name="description" content="For any reason, you need to return a product or request a refund, this is refund policy page.">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- About Content -->
    <section class="about-us mt-10px">
        <div class="container  mt-5" style="font-size: 19px;">


<h2 class="text-center">
        Refund Policy
        </h2>

        <strong>
            <p style="text-align:left;">
At FlexiSports, we are committed to your satisfaction and want you to be completely happy with your purchase. If, for any reason, you need to return a product or request a refund, please review our guidelines below:  <br> <br>
</p></strong>
<ul  style="text-align:left;">
    <li>
Eligibility: To be eligible for a return or refund, the product must be unused, undamaged, and in its original packaging. Returns must be requested within 30 days of the purchase date.
</li> <br> <br>
<li>
Return Process: To initiate a return or refund, please contact our customer support team at support@flexisports.com. Provide your order details and the reason for the return. Our team will guide you through the return process and provide you with a return authorization if applicable.
</li> <br> <br>
<li>
Return Shipping: If your return is approved, we will provide you with a return shipping label free of charge. Please ensure the product is securely packaged to prevent any damage during transit.
</li> <br> <br>
<li>
Refund Processing: Once we receive the returned item and verify its condition, we will initiate the refund process. Refunds will be issued to your original payment method within a reasonable timeframe.
</li> <br> <br>
</ul>
Please note that personalized or engraved items, as well as certain products specified as non-refundable, may not be eligible for a refund. If you have any questions or concerns about our refund policy, please contact our customer support team.
<br> <br>
<strong>
We appreciate your trust in SportiFlex and strive to provide you with the best shopping experience possible.
<br> <br>
Play with passion, play with SportiFlex!
</strong>




    </div>
    </section>
    <?php include("./footer.php");  ?>
<?php include("./form.php");  ?>



   
<?php  include("./connection/connect.php"); ?>
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

































