


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
            <title>Contact Us</title>
<meta name="description" content="Contact us we are avaialble for your support for 24/7.">
  </head>
  <body>

 <?php include("./header.php"); ?>

    <!-- About Content -->
    <section class="about-us mt-10px">
        <div class="container text-center mt-5" style="font-size: 19px;">


        <div style="max-width: 500px; margin: 0 auto;">
        <div >
  <h2>Contact Us</h2>
  
  <form action="#" method="POST" style="margin-bottom: 20px;">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" style="width: 100%; padding: 10px;"><br><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" style="width: 100%; padding: 10px;"><br><br>
    
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="5" style="width: 100%; padding: 10px;"></textarea><br><br>
    
    <input type="submit" value="Submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
  </form>
  </div>
  <div>
  
  <div style="margin-bottom: 20px;">
    <h4>Address:</h4>
    <p>Lives in Sialkot, Punjab, Pakistan</p>
  </div>
  
  <div style="margin-bottom: 20px;">
    <h4>Phone Number:</h4>
    <p>+92 310 6931894</p>
  </div>
  
  <div>
    <h4>Email:</h4>
    <p>info@sportiflex.com</p>
  </div>
  </div>


</div>







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


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Check if the user is not logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo "<script>alert('Please Login First'); window.location.href = 'contact';</script>";
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $customer_id = $_SESSION['userID'];
    
        // Insert Query

        $insert_query = "INSERT INTO `messages` (`customer_id`, `name`, `email`, `message`, `status`) VALUES ('$customer_id', '$name', '$email', '$message', 'unread')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute){
            echo "<script>alert('Message sent successfuly')</script>";
        }
        else{
            echo "<script>alert('There is a problem!')</script>";
        }
    }
?>