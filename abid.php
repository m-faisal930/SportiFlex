<?php
include('./connection/connect.php');

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
    <title>FlexiSports - Admin Panel</title>
<meta name="description" content="This is the admin page of FlexiSports Where admin can manage different things.">
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

        .form-container input[type="email"],
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
</head>
<body>
    <div class="form-container">
        <h2 style="text-align:center;">Admin Login</h2>
        <form method="post">
            <input type="email" name = "email" placeholder="Email" required>
            <input type="password" name ="password" placeholder="Password" required>
            <input type="submit" name = "submitButton" value="Login">
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submitButton'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (($email == $admin_email) and (password_verify($password, $admin_password))){
        session_start();
        $_SESSION['adminLoggedIn'] = TRUE;
        // Redirect to a different page
        header("Location: Admin\indexadmin");
        exit; // Make sure to include the exit statement after the redirect
    }
    else {
        echo "<script> alert('some problem')</script>";
    }
}
?>