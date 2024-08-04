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
    <title>About Us</title>
<meta name="description" content="At FlexiSports, we take immense pride in being a leading e-commerce platform based in Sialkot, Pakistan, dedicated to bringing you top-quality sports products">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- About Content -->
    <section class="about-us mt-10px">
        <div class="container  mt-5" style="font-size: 19px;">
        <strong>
        Welcome to FlexiSports - Your Premier Destination for Sports Products from Pakistan! </strong>
        <br> <br>

At FlexiSports, we take immense pride in being a leading e-commerce platform based in Sialkot, Pakistan, dedicated to bringing you top-quality sports products from our region to sports enthusiasts all over the world. We understand the significance of sports in promoting a healthy and active lifestyle, and our mission is to provide you with the finest sporting goods that enhance your performance and passion for the game. <br> <br>

As a company rooted in Pakistan, we have the privilege of being part of a rich sporting heritage. Sialkot, our hometown, is renowned for its skilled craftsmen who have been producing exceptional sports equipment for decades. From cricket bats and soccer balls to tennis rackets and boxing gloves, our region has become synonymous with excellence in sports manufacturing.  <br> <br>

FlexiSports strives to showcase the best of what Pakistan has to offer in the realm of sports. We work closely with local artisans and manufacturers who have mastered the art of crafting top-notch sports gear. Our team meticulously selects products that embody the perfect blend of quality, durability, and performance, ensuring that each item surpasses your expectations. <br> <br>

Our commitment to providing a seamless online shopping experience is unwavering. With our user-friendly website, you can easily navigate through a vast array of sports products, meticulously categorized to help you find exactly what you need. Whether you're a professional athlete seeking high-performance gear or a recreational sports enthusiast looking to enhance your game, FlexiSports is here to cater to all your needs. <br> <br>

We understand the importance of reliability and trust when shopping online, which is why we prioritize customer satisfaction above all else. Our dedicated customer support team is available around the clock to assist you with any queries or concerns you may have. We strive to provide exceptional service from the moment you visit our website to the safe delivery of your order right to your doorstep. <br> <br>

FlexiSports not only aims to satisfy your sporting needs but also wants to contribute to the growth of sports in communities around the world. Through collaborations and sponsorships, we support various sporting events, clubs, and initiatives that promote inclusivity, diversity, and the spirit of sportsmanship. <br> <br>

Join us on this exciting journey as we bring the spirit of Pakistan's sporting excellence to your doorstep. Experience the joy of owning top-quality sports gear that empowers you to reach new heights and achieve your athletic goals. At SportiFlex, we are committed to providing you with nothing but the best. <br> <br>

<strong>
Thank you for choosing FlexiSports as your trusted partner in sports. Let's play and thrive together!

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

