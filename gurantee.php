


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
        <title>Gurantee</title>
<meta name="description" content="FlexiSports provid you with 30 days Money Back Gurantee!">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- About Content -->
    <section class="about-us mt-10px">
        <div class="container  mt-5" style="font-size: 19px;">
<strong  class="text-center">
        30 Days Money Back Guarantee</strong>
        <br> <br>

At FlexiSports, we are committed to ensuring your complete satisfaction with every purchase. We firmly believe in the quality of our offerings and want you to have the utmost confidence when shopping with us. That is why we proudly offer a special 30-Day Money-Back Guarantee on all of our goods. <br> <br>

Here's how our Money-Back Guarantee works: <br> <br>

<ol style="text-align:left;">
    <li>
Place your order: Simply visit our website to explore our extensive range of sports products. Please note that we do not sell to retailers or other online stores, so our website is the only place where you can find our authentic SportiFlex products.
</li> <br> <br>
<li>
Quick shipping: Once you've placed your order, our dedicated team will swiftly process and ship your chosen product to your location. Our efficient shipping process ensures that you receive your order within 3-5 working days, allowing you to start enjoying your sports gear as soon as possible.
</li> <br> <br>
<li>
Test and try for 30 days: We want you to feel confident in your purchase, which is why we give you a generous 30-day window to test and try your product. Take your time to use it in your sporting activities, ensuring it meets your expectations and enhances your performance.
</li> <br> <br>
<li>
Not completely satisfied? If, for any reason, you are not 100% satisfied with your SportiFlex product within the 30-day period, we encourage you to get in touch with us. We provide a hassle-free return process for customers All Over the UK. Simply contact our customer support team, and we will provide you with a return label free of charge.
</li> <br> <br>
<li>
Refund process: Once we receive your returned item, our team will promptly inspect it to ensure it meets our return policy guidelines. Upon verification, we will initiate a full refund of the purchase price back to your original payment method. Please note that if your product was engraved, we will refund the product purchase price, excluding the engraving price. For detailed information about our product return process, please refer to our dedicated product returns page.
</li> <br> <br>
</ol>

We want you to be completely satisfied with your FlexiSports purchase, and our Money-Back Guarantee is a testament to our commitment to your happiness. Shop with confidence, knowing that if for any reason you're not satisfied, we've got you covered.
<br> <br>
If you have any further questions or require assistance, our friendly customer support team is always ready to help. Your satisfaction is our priority, and we look forward to serving you with excellence.
<br> <br>
<strong>
Thank you for choosing SportiFlex as your trusted source for premium sports products. <br> <br>

Play hard, play smart, play with SportiFlex! <br> <br>


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



















