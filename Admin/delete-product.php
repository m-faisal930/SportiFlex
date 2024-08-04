<?php
session_start();

// Check if the user is not logged in
if ($_SESSION['adminLoggedIn'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../faisal';</script>";
  exit;
}
?>




<?php
// Include database connection
include('../connection/connect.php');
// include(/)

// Get the tag ID from the AJAX request
$productId = $_POST['product_id'];



// Delete the tag from the database
$sql = "UPDATE `products` SET  `status` = 'no' WHERE `product_id` = '$productId';";
$result = mysqli_query($con, $sql);

if (!$result) {

    echo "<script>alert('Product deleted sully')</script>";
    die('Error: ' . mysqli_error($con));
}

// Return a success message
echo "<script>alert('Product deleted successfully')</script>";
?>

