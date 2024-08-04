


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
            <title>Privacy Policy</title>
<meta name="description" content="This Privacy Policy outlines how we collect, use, disclose, and store the information gathered through our website.">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- About Content -->
    <section class="about-us mt-10px">
        <div class="container  mt-5" style="font-size: 19px;">


<h2 class="text-center">Privacy Policy</h2>

<p>
  At FlexiSports, we value the privacy of our users and are committed to protecting their personal information. This Privacy Policy outlines how we collect, use, disclose, and store the information gathered through our website. By using our website, you consent to the practices described in this policy.
</p>

<h3>Information Collection and Use:</h3>

<p>
  <strong>Personal Information:</strong><br>
  We may collect personal information such as your name, email address, contact number, and shipping address when you place an order or voluntarily provide it through our contact forms. This information is used solely for the purpose of processing your orders, responding to your inquiries, and providing you with a personalized shopping experience.
</p>

<p>
  <strong>Payment Information:</strong><br>
  When making a purchase, your payment details, such as credit card information or bank account details, are securely processed through our trusted third-party payment processors. SportiFlex does not store or have access to your payment information.
</p>

<p>
  <strong>Log Files and Analytics:</strong><br>
  Like many websites, we gather certain information automatically and store it in log files. This information may include your IP address, browser type, operating system, referring/exit pages, and date/time stamps. We use this information to analyze trends, administer the site, track user activity, and gather demographic information for aggregate use. This helps us improve our website's functionality and tailor our content to better serve our users.
</p>

<p>
  <strong>Cookies:</strong><br>
  FlexiSports uses cookies, which are small text files stored on your device, to enhance your browsing experience. Cookies allow us to remember your preferences, track your interactions with our website, and provide personalized content and advertisements. You have the option to disable cookies through your browser settings, but please note that certain features of our website may not function properly without cookies.
</p>

<h3>Information Sharing and Disclosure:</h3>

<p>
  <strong>Third-Party Service Providers:</strong><br>
  We may engage trusted third-party service providers to assist us in operating our website and conducting our business. These service providers have access to your personal information only to perform specific tasks on our behalf and are obligated not to disclose or use it for any other purpose.
</p>

<p>
  <strong>Legal Compliance:</strong><br>
  FlexiSports may disclose your personal information if required to do so by law or in response to valid requests by public authorities (e.g., a court or government agency).
</p>

<h3>Data Security:</h3>

<p>
  We implement industry-standard security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, please note that no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.
</p>

<h3>Links to External Sites:</h3>

<p>
  Our website may contain links to external sites that are not operated by SportiFlex. We have no control over the content and practices of these sites and are not responsible for their privacy policies. We encourage you to review the privacy policies of any third-party sites you visit.
</p>

<h3>Children's Privacy:</h3>

<p>
  FlexiSports does not knowingly collect personal information from individuals under the age of 18. If you are a parent or guardian and believe that your child has provided us with personal information, please contact us, and we will promptly remove such information from our records.
</p>

<h3>Changes to this Privacy Policy:</h3>

<p>
  FlexiSports reserves the right to update or modify this Privacy Policy at any time. Any changes will be reflected on this page with a revised effective date. We encourage you to review this policy periodically to stay informed about how we collect, use, and protect your information.
</p>

<h3>Contact Us:</h3>

<p>
  If you have any questions or concerns about this Privacy Policy or the practices of SportiFlex, please contact us at <a href="mailto:info@sportiflex.com">info@sportiflex.com</a>.
</p>

<p>
  Please note that this is a general template and may require further customization to fit the specific needs and requirements of your website and jurisdiction. It is advisable to consult with a legal professional to ensure compliance with applicable laws and regulations.
</p>


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


