
<?php
include('./connection/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="" method="POST">
        <input type="password" name="new_password" placeholder="Enter new password" required>
        <button type="submit">Reset</button>
    </form>
</body>
</html>

<?php
// Get the token from the URL parameter
$token = $_GET["token"];
$customer_id = $_GET["id"];
$currentTime = time();

$select_query = "SELECT customer_id FROM  `tokens` WHERE (token_expiry > $currentTime) AND (token = '$token');";
$result = mysqli_query($con, $select_query);
$num_rows = mysqli_num_rows($result);



// Token is valid, display the password reset form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the new password from the form
    $newPassword = $_POST["new_password"];

    // Update the user's password in your user database (Assuming you have a users table)


    // Update the password for the user
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    if ($num_rows > 0){
    // Your update query here to update the password for the user with the retrieved email
        $update_query = "UPDATE `customers` set password = '$hashedPassword' where  customer_id = '$customer_id'";
        $result = mysqli_query($con, $update_query);
        echo "<script>alert('Password Changed')</script>";
        // Redirect the user to a success page or login pagse
        header("Location: login");
        exit();
    }
    else{
        echo "<script>alert('Invalid Inputs') </script>";
    }
}
?>