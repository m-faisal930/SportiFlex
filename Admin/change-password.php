<?php

session_start();

// Check if the user is not logged in
if ($_SESSION['adminLoggedIn'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../faisal';</script>";
  exit;
}

include('../connection/connect.php');

$sql = "select * FROM admin";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);

$admin_email = $row['email'];
$admin_password = $row['password'];



?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
        <!-- Latest compiled and minified CSS -->
        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    

</head>
<body>
    <div class="form-container">
        <h2 style="text-align:center;">Admin Login</h2>
        <!-- <form method="post">
            <input type="password" name = "old_password" placeholder="Old Password" required>
            <input type="password" name ="new_password" placeholder="Type New Password" required>
            <input type="password" name ="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" name = "submitButton">
        </form> -->
    <!-- </div> -->




        <form method="post" id="myForm">
    <input type="password" name="old_password" placeholder="Old Password" required>
    <input type="password" name="new_password" placeholder="Type New Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button type="button"  onclick="togglePasswordVisibility()" >show/Hide Password</button>
    <!-- <label for="showPasswordCheckbox">Show Password</label> -->
    <br>
    <button type="submit" class="btn-btn-danger" style="    margin-left: 86px; margin-top: 19px; background: brown;" name="submitButton">Submit</button>
</form>
    </div>
<script>
    function togglePasswordVisibility() {
        var form = document.getElementById('myForm');
        var password_inputs = form.getElementsByTagName('input');

            if (password_inputs[0].type === 'text') {
                for (var i = 0; i < password_inputs.length; i++) {
                    password_inputs[i].type = 'password';
                }

            }
            else{
                for (var i = 0; i < password_inputs.length; i++) {
                    password_inputs[i].type = 'text';
                }
            }
    }
    //     var passwordInputs = document.querySelectorAll('input[type="password"]');
    //     // var passwordInputs = document.querySelectorAll('input[type="text"]');
    //     var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

    //     for (var i = 0; i < passwordInputs.length; i++) {
    //         passwordInputs[i].type = showPasswordCheckbox.checked ? 'text' : 'password';
    //     }
    // }
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
</body>
</html>
<?php
if (isset($_POST['submitButton'])){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if (password_verify($old_password, $admin_password)){
        // Redirect to a different page
                    if ($new_password == $confirm_password){
                        $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
                        $sql = "UPDATE `admin` SET password = '$hash_password';";
                        $result = mysqli_query($con, $sql);
                        if (!$result) {
                            die('Error: ' . mysqli_error($con));
                        }
                        echo "<script> window.location.href = 'http://localhost/SportiFlex%20Store/faisal'</script>";
                        // Redirect to a different page
                        // header("Location: .\indexadmin");   
                    }
                    else{
                        echo "<script>alert('password now Match')</script>";
                    }
    }
    else{
        echo "<script>alert('Wrong Password')</script>";
    }
}
?>