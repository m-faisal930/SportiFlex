<?php
ini_set('session.gc_maxlifetime', 2592000);
session_start();
include("./connection/connect.php");



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

    <!-- Font Awesome Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- css file -->
    <link rel="stylesheet" href="style.css" />

    <!-- Bootstrap CSS link -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    

    <script>


function popUpSearch() {
        showSearchForm();
        var div = document.getElementById("nav-container");
        div.style.display = "none";
        var div = document.getElementById("mySearch");
        div.style.display = "block";

      }

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
            <title>FlexiSports - Home</title>
<meta name="description" content="Welcome to SportiFlex - Your Premier Destination for Sports Products from Pakistan!.">
  </head>
  <body>

 <?php include("./header.php");
 
 
      // Insert Query
      $select_query = "SELECT * FROM banners;";
      $sql_execute = mysqli_query($con, $select_query);
      if (!$sql_execute) {
          die('Error: ' . mysqli_error($con));
      }
      
      $rows_count = mysqli_num_rows($sql_execute);
      if ($rows_count > 1){
        $images = array();
        while ($row1 = mysqli_fetch_assoc($sql_execute)){
          array_push($images, $row1['banner_img']);
        }
                  // Get the last value
          $lastIndex = count($images) - 1;
          $lastValue = $images[$lastIndex];

          // Get the second-to-last value
          $secondLastIndex = count($images) - 2;
          $secondLastValue = $images[$secondLastIndex];
      }
 ?>

    <!-- Hero Section -->
    <section  class="hero" >
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <?php
            echo "
            <img
              class='d-block w-100'
              src='./images/$lastValue'
              alt='First slide'
            />";
            ?>

          </div>
          <div class="carousel-item">
          <?php
            echo "
            <img
              class='d-block w-100'
              src='./images/$secondLastValue'
              alt='First slide'
            />";
            ?>
          </div>



          <a
            class="carousel-control-prev"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a
            class="carousel-control-next"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- End Hero Section -->

    <!-- Products section -->
    <section class="  products">
      <h2 class="text-center" data-aos='fade-up'>Featured Products</h2>
      <!-- Line Break -->
      <div class="container mx-6 mt-3 mb-5" data-aos='fade-up' >
        <div class="mb-3 line" style="border-top: 2px solid #0a0a0a"></div>
      </div>



      <?php
      
// Query the products table to fetch the product data
$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 8";
$result = $con->query($sql);

// Define the number of products to display per row
$productsPerRow = 4;

// Start generating the HTML markup
echo '<div class="container mb-6">';
echo '<div class="row mb-5">';

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
        
        <div   class='col-lg-3 col-md-6 mb-3  ' data-aos='fade-zoom-up' >
            <div class='shadow  card'   onclick="window.location='product_details?id=<?php echo $product_id; ?>';">
                <img class='card-img-top' src='./images/<?php echo $row['img1']; ?>' alt='<?php echo $row['product_name'];   ?>' />
                <div class='card-body' >
                    <h5 class='card-title text-center'><?php echo $row['product_name']; ?></h5>
                    <p class='card-text text-center'><?php echo $limitedDescription; ?>...</p>
                    <p class='card-text text-center price'><strong>Price: $</strong><?php echo $row['price']; ?></p>
                    <div class='icons'>
                        <a href='#' class='btn'><i class='fas fa-cart-plus'></i></a>
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
    <div class="container mx-6 mt-5" data-aos='fade-up'>
      <div class="mb-3 line" style="border-top: 2px solid #0a0a0a"></div>
    </div>

    <!-- Start Testimonial Section -->
    <div class="container" data-aos='fade-up'>
      <section id="testimonials" class="shadow testimonial-section"  >
        <div class="container"  >
          <h2 class="text-center mb-5">Testimonials</h2>
          <div class="row">
            <div class="col-md-12">
              <div
                id="testimonial-carousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#testimonial-carousel"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li
                    data-target="#testimonial-carousel"
                    data-slide-to="1"
                  ></li>
                  <li
                    data-target="#testimonial-carousel"
                    data-slide-to="2"
                  ></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="testimonial-item text-center">
                      <p class="mb-3">
                        "I recently purchased a product from SportiFlex, and I couldn't be happier with my experience. The quality of the product is outstanding, and the customer service I received was exceptional. The team at SportiFlex was friendly, helpful, and prompt in addressing my inquiries. I highly recommend SportiFlex to anyone looking for top-notch products and a great shopping experience!"
                      </p>
                      <div class="testimonial-author">
                        <img
                          src="./images/test2.jpg"
                          alt="Person 1"
                          class="rounded-circle mb-3"
                        />
                        <h4 class="mb-0">John Doe</h4>

                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="testimonial-item text-center">
                      <p class="mb-3">
                        "I had a fantastic experience with SportiFlex's customer support team. When I had a question about one of their products, they were quick to respond and provided me with all the information I needed. Their support staff was knowledgeable, friendly, and went above and beyond to ensure my satisfaction. I truly appreciate their dedication to excellent customer service. I highly recommend SportiFlex for their outstanding products and exceptional support!"
                      </p>
                      <div class="testimonial-author">
                        <img
                          src="./images/test1.jpeg"
                          alt="Person 2"
                          class="rounded-circle mb-3"
                        />
                        <h4 class="mb-0">Jane Doe</h4>
                        
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="testimonial-item text-center">
                      <p class="mb-3">
                        "SportiFlex exceeded my expectations in every way. Their website offers a wide range of high-quality products to choose from, and I found exactly what I needed. The ordering process was smooth, and my package arrived on time and in perfect condition. The attention to detail and the care they put into packaging the items was impressive. I'm thrilled with my purchase and will definitely be a repeat customer. Thank you, SportiFlex!
."
                      </p>
                      <div class="testimonial-author">
                        <img
                          src="./images/test3.jpg"
                          alt="Person 3"
                          class="rounded-circle mb-3"
                        />
                        <h4 class="mb-0">Bob Smith</h4>

                      </div>
                    </div>
                  </div>
                </div>
                <a
                  class="carousel-control-prev"
                  href="#testimonial-carousel"
                  role="button"
                  data-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#testimonial-carousel"
                  role="button"
                  data-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- End Testimonial Section -->

<?php include("./footer.php");  ?>
<?php include("./form.php");  ?>
<?php include("./search.php");  ?>



   
<?php  include("./connection/connect.php"); ?>
   <!-- Form Setup -->
    <!-- Modal HTML -->










    <script>
      function showSearchForm() {
        var div = document.getElementById("mySearch");
        div.style.display = "block";
      }

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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
    <script src="main.js"></script>
  </body>
</html>





