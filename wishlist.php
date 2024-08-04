t

<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = './index';</script>";
  exit;
}

include('./connection/connect.php');
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <title>Wishlist</title>
<meta name="description" content="All the items which are your favourite can be added in Wishlist!">

  </head>
  <body>


<?php include("./header.php");  ?>

<!-- Wishlist Section -->
    <section class="wishlist">
  <div class="container mt-5">
    <h2 class="text-center mb-4">My Wishlist</h2>
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Product Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Price</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        
      <?php  
                // Tag Display

                $customer_id = $_SESSION['userID'];

      $select_query = "Select products.product_id, product_name, description, price, img1, status, wishlist.wishlist_id as wishid
      FROM products, wishlist WHERE products.product_id = wishlist.product_id AND products.status = 'yes' AND wishlist.customer_id = $customer_id;";
      $result = mysqli_query($con, $select_query);
      $num_rows = mysqli_num_rows($result);
      if ($num_rows >0){
      while ($row= mysqli_fetch_assoc($result)){
            $product_id= $row['product_id'];
            $product_name= $row['product_name'];
            $description= $row['description'];
            $price= $row['price'];
            $image= $row['img1'];
            $status= $row['status'];
            $wishlist_id = $row['wishid'];
            $check_query = "select stock from `stock` where product_id = $product_id;";
            $result1 = mysqli_query($con, $check_query);
            $row1= mysqli_fetch_assoc($result1);
            if (is_null($row1)){
              echo"
              <form method = 'post'>
                <tr>
                <td>$product_name</td>
                <td>$description</td>
                <td><img src='./images/$image' alt='Product A'></td>
                <td>$price</td>
                <td>Out Of Stock</td>
                <td>
                <button type='submit' name='remove_wish' class='btn btn-primary'>
                  <input type='hidden' name='wishlist_id' value='$wishlist_id'>
                  <span>Delete</span>
                </td>
                </tr>
            </form>";
        }
        else{
          echo"
          <form method = 'post'>
          <tr>
          <td>$product_name</td>
          <td>$description</td>
          <td><img src='./images/$image' alt='Product A'></td>
          <td>$price</td>
          <td>In Stock</td>
          <td>
          <button type='submit' name='remove_wish' class='btn btn-primary'>
            <input type='hidden' name='wishlist_id' value='$wishlist_id'>
            <span>Delete</span>
          </td>
          <td><button class='btn btn-danger'><a href = 'cart.html' style = 'text-decoration:none; color: white;'>Add To Cart</a></button></td>
        </tr></form>";
    }
      }
    }
    else{
      echo"<p>No Data Found</p>";
    }
?>

      </tbody>
    </table>
  </div>
</section>

<!-- End wishlist sectionn -->





<?php include("./footer.php");    ?>


<scirpt>

</script>
    
      <!-- Bootstrap JavaScript -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="main.js"></script>
  </body>
</html>

<?php








?>












<?php
// ...

if (isset($_POST['remove_wish']) && isset($_POST['wishlist_id'])) {
  $wishlist_id = $_POST['wishlist_id'];
  echo "id is $wishlist_id";
  $delete_query = "DELETE FROM wishlist WHERE wishlist_id = $wishlist_id;";
  echo "query is $delete_query";
  $result = mysqli_query($con, $delete_query);
  if (!$result) {
    die('Error: ' . mysqli_error($con));
    
  }
  echo "<script>alert('Item removed from wishlist')</script>";
}

// ...
?>

