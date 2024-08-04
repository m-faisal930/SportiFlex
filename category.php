<?php


// include("./functions/common_functions");
include("./connection/connect.php");
// Reload the page
// header("Location: ".$_SERVER['PHP_SELF']);
// exit();

// <!-- include("./Admin_area/functions/common_functions"); -->

function limitStringToCharacters($string, $limit) {
  if (strlen($string) <= $limit) {
    return $string;
  } else {
    $limitedString = substr($string, 0, $limit);
    $lastSpacePos = strrpos($limitedString, ' ');
    if ($lastSpacePos !== false) {
      $limitedString = substr($limitedString, 0, $lastSpacePos);
    }
    return $limitedString;
  }
}

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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
        <title>Category</title>
<meta name="description" content="Shows Products on the basis of Categories added to given products.">
  </head>
  <body>
      <?php include("./header.php"); ?>
    <?php
    $category_id = $_GET['id'];
    $select_query = "select title from category where category_id = $category_id;";
    
    $result = mysqli_query($con, $select_query);
    
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    $category_name = $row['title'];
    // echo $category_name;
    ?>


<!-- Products section -->
    <section class="products" style="margin-top: 50px;">
        <h2 class="text-center">Category: <?php echo "$category_name";   ?></h2>
        <!-- Line Break -->
        <div class="container mx-6 mt-3">
            <div class="mb-3 line" style="border-top: 2px solid #0a0a0a"></div>
        </div>
        
        <?php
      
// Query the products table to fetch the product data
$sql = "SELECT p.product_id, p.product_name, p.description, p.price, p.img1, img2, p.img3, p.status
FROM products p, product_category pc, category c WHERE p.product_id =  pc.product_id AND pc.category_id = c.category_id AND c.category_id = $category_id;";
$result = mysqli_query($con, $sql);

// Define the number of products to display per row
$productsPerRow = 4;

// Start generating the HTML markup
echo '<div class="container mb-6">';
echo '<div class="row">';

// Iterate over the fetched product data and create the card HTML dynamically
if ($result->num_rows > 0) {
    $index = 0;
    while ($row = $result->fetch_assoc()) {
      $product_id = $row['product_id'];
      $description = $row['description'];
      $limitedDescription = limitStringToCharacters($description, 50);

        if ($index % $productsPerRow === 0) {
            echo '</div><div class="row">';
        }
        ?>
        <div class='col-lg-3 col-md-6 mb-3' data-aos='fade-up' onclick="window.location='product_details?id=<?php echo $product_id; ?>';">
            <div class='card' >
                <img  class='card-img-top' src='./images/<?php echo $row['img1']; ?>' alt='<?php echo $row['product_name']; ?>' />
                <div class='card-body' >
                    <h5 class='card-title text-center'><?php echo $row['product_name']; ?></h5>
                    <p class='card-text text-center'><?php echo $limitedDescription; ?>...</p>
                    <p class='card-text text-center price'><strong>Price: $</strong><?php echo $row['price']; ?></p>
                    <div class='icons'>
                        <a  href='#' class='btn'><i class='fas fa-cart-plus'></i></a>
                        <a href='#' class='btn'><i class='fas fa-heart'></i></a>
                    </div>
                  </div>
            </div>
        </div>
        <?php
        $index++;
    }
} else {
    echo "No products found.";
}


// Close the remaining HTML markup
echo '</div>';
echo '</div>';
?>
    </section>
    <!-- End Products Section -->

    <!-- Line Break -->
    <div class="container mx-6 mt-5">
      <div class="mb-3 line" style="border-top: 2px solid #0a0a0a"></div>
    </div>

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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  </body>
</html>





