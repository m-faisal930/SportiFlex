<?php
// Include database connection
include('./connection/connect.php');

// Get the tag ID from the AJAX request
$cart_Id = $_GET['id'];
// // Delete the tag from the database
$sql = "DELETE FROM `shopping_cart` WHERE `cart_id` = '$cart_Id'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

// Return a success message
echo "<script>alert('Item removed Successfuly ')</script>";
// Redirect to a relative URL
header("Location: ./cart");
?>
