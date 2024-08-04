


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
            <title>Terms and Conditions</title>
<meta name="description" content="These terms and conditions outline the rules and regulations for using the FlexiSports website!">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- About Content -->
    <section class="about-us mt-10px">
        <div class="container  mt-5" style="font-size: 19px;">

<h2 class="text-center">
        Terms & Conditions
        </h2> <br> <br>
<strong class="text-center">
Welcome to SportiFlex!</strong> <br> <br>

These terms and conditions outline the rules and regulations for using the FlexiSports website. By accessing this website, you agree to comply with these terms and conditions. If you do not agree with any part of these terms, please refrain from using our website.
<br> <br>
<h4 style="text-align:left;">
License:</h4>
<p >
Unless otherwise stated, all materials on FlexiSports are the property of FlexiSports and its licensors. Intellectual property rights are protected. You may download materials from SportiFlex for personal use only, subject to the limitations set out in these terms and conditions.
</p>
<br> <br>
<h4 style="text-align:left;">
You are not permitted to:
</h4>
<p >
Republish content from FlexiSports.
Sell, rent, or sublicense FlexiSports's intellectual property.
Replicate, duplicate, or copy material from FlexiSports.
Redistribute content from FlexiSports.
</p>
<br> <br>
<h4 style="text-align:left;">
Comments and User Content:
</h4>
<p >
SportiFlex reserves the right to review and delete any comments or user-generated content that is illegal, abusive, or offensive.
</p>
<br> <br>
<h4 style="text-align:left;">
By posting comments or user content on our website, you warrant that:
</h4>
<p >

You have the necessary permissions and consents to publish the content.
The content does not infringe on any third-party intellectual property rights.
The content is not abusive, vulgar, or illegal, and does not violate privacy rights.
</p>
<br> <br>
<h4 style="text-align:left;">
Cookies:
</h4>
<p >
FlexiSports utilizes cookie technology. By using FlexiSports, you agree to handle cookies in accordance with the FlexiSports Privacy Policy. Most web browsers use cookies to enhance the user experience and store session data. Our site uses cookies to enable the functionality of various features and may be used by our affiliate companies.

</p>
<br> <br>
<h4 style="text-align:left;">
    Copyright:
</h4>
<p >
    All content, text, and images on the FlexiSports website are owned by FlexiSports or used with permission. You may not use them for any purpose without the consent of the respective owner. FlexiSports allows customers to print and save these terms and conditions for future reference, but no permission is granted to use them in any other capacity without explicit authorization.
    
</p>
<br> <br>
<h4 style="text-align:left;">
    Intellectual Property Rights:
</h4>
<p >
    The content and materials on this website are provided for educational purposes only. All copyright and other intellectual property rights belong to FlexiSports or are used with permission from the copyright owner.
</p>
<br> <br>
<h4 style="text-align:left;">
    
Payment and Invoice:
</h4>
<p>
    When making a purchase on FlexiSports, please ensure that all provided information is accurate and complete. If your contact information changes or you wish to be removed from our database, please notify us as soon as possible. Please double-check the details, especially the postcode, to ensure smooth processing of your order.
</p>
<br> <br>
<h4 style="text-align:left;">
    

Termination of Account:
</h4>
<p >
FlexiSports reserves the right to cancel or suspend your account and deny access to the service without prior notice or liability, for any reason and without limitation. If you wish to terminate your account, please discontinue using the service.
</p>
<br> <br>
<h4 style="text-align:left;">
    
Disclaimer:
    </h4>
<p >
The content on the FlexiSports website is provided in good faith and for general informational purposes only. FlexiSports makes no representations or warranties regarding the completeness, accuracy, or reliability of this information. Any action taken based on the information provided is at your own risk. FlexiSports shall not be held liable for any damages or losses resulting from the use of our website.
</p>
<br> <br>
<h4 style="text-align:left;">
    
Governing Law and Jurisdiction:
</h4>
<p >
These Terms and Conditions are governed by the laws of Pakistan, and any disputes arising out of or in connection with these terms shall be subject to the exclusive jurisdiction of the courts of Sialkot, Pakistan.
</p>
<br> <br>
<h4 style="text-align:left;">
    
Reservation of Rights:
</h4>
<p >
FlexiSports reserves the right to request the removal of any links from our website. You agree to promptly remove all links to our website upon request. We also reserve the right to modify these terms and conditions at any time. By continuing to link to our website, you agree to be bound by and comply with these linking terms and conditions.
</p>
<br> <br>
<h4 style="text-align:left;">
    
Content Liability:
</h4>
<p >
FlexiSports shall not be held responsible for any content on your website. You agree to defend and indemnify us against any claims arising from your website. Any links that may be deemed inappropriate, obscene, or illegal should be removed from any website.
</p>
<br> <br>
<h4 style="text-align:left;">
    
Removal of Links from Our Website:
</h4>
<p >
If you find any objectionable links on our website, please contact us. Although we strive to respond to removal requests, we are not obligated to do so or to provide a personal response.

<br> <br>
We make no guarantee that the information on this website is accurate, complete, or up to date. We do not warrant that the website will be available or that the content will be regularly updated.
<br> <br>
<strong>
Please note that this is a general template and may require further customization to fit the specific needs and requirements of your website and jurisdiction. It is advisable to consult with a legal professional to ensure compliance with applicable laws and regulations.

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














































