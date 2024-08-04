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

// Get the tag ID from the AJAX request
$categoryId = $_POST['category_id'];

// Delete the tag from the database
$sql = "UPDATE `category` SET status = 'no' WHERE `category_id` = '$categoryId'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

// Return a success message
echo "Tag deleted successfully";
?>
