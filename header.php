<?php
@session_start();
include('connection/connect.php');
?>
  
  <!-- Header Section -->
    <div id="nav-container">
    <section class="header">
      <nav class="navbar  navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index"
            ><img src="./images/logo.jpg" alt="Logo of FlexiSports - a leading Sports Wears in Asia"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#mynavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto" style="margin-left:auto;">
              <li class="list-group-item nav-item">
                
                
                <a class="nav-link" href="\index">Home</a>
                
              </li>
              <li class="list-group-item nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  href="shop.html"
                  >Shop</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


                  
            <?php  
                // Tag Display

      $select_query = "select * from `category`";
      $result = mysqli_query($con, $select_query);
         
        if (!$result) {
          die('Error: ' . mysqli_error($con));
          
        }
      while ($row= mysqli_fetch_assoc($result)){
        $category_id = $row['category_id'];
        $category_name = $row['title'];
        echo "
              <li class='list-group-item nav-item'>
                <a class='nav-link' href='\category?id=$category_id'>$category_name</a>
              </li>";

      }?>


        
                    
                  </ul>
              </li>
              <li class="list-group-item nav-item">
       
                <a class="nav-link" href="\about">About Us </a>
              </li>

              <?php
                
                        // Check if the user is not logged in
                        if (isset($_SESSION['loggedin'])) {
                          echo "              <li class='list-group-item nav-item'>
                          <a class='nav-link' href='/user/userdashboard'>My Account</a>
                        </li>";
                        }
              ?>
       </ul>







<?php

// Check if the user is logged in 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      // User is logged in
      // Perform user-specific operations using $_SESSION['userID']
      echo "
      <a
        onclick = 'showalert();'
        href='\logout'
        
        class='nav-link me-3'
        >Logout</a>";
    } else {
        // User is not logged in
        echo "
        <a
          href='#myModal'
          onclick='hideDiv()'
          data-toggle='modal'
          class='nav-link me-3'
          href='#'
          >Login </a>";
    }
  
?>

<?php
// Check if the user is logged in 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // Fetching number of wishlist enteries
      $customer_id = $_SESSION['userID'];
      $select_query = "select * from `wishlist` WHERE customer_id = '$customer_id';";
      $result = mysqli_query($con, $select_query);

      if (!$result) {
        die('Error: ' . mysqli_error($con));
        
      }
      $rows_wishlist = mysqli_num_rows($result);
      // Fetching number of wishlist enteries
      $select_query1 = "select * from `shopping_cart` WHERE customer_id = '$customer_id' AND ordered = 'no';";
        $result1 = mysqli_query($con, $select_query1);
  
        if (!$result1) {
          die('Error: ' . mysqli_error($con));
          
        }
          $rows_cart = mysqli_num_rows($result1);

          echo "
          <a class='nav-link me-3' href='\wishlist'> <sup>" . $rows_wishlist . "</sup> <i class='far fa-heart'></i></a>
          <a class='nav-link me-3' href='\cart'><sup>" . $rows_cart . "</sup><i class='fas fa-shopping-cart'></i></a>";
}
else{
              echo "
              <a class='nav-link me-3' href='\wishlist'><i class='far fa-heart'></i></a>
              <a class='nav-link me-3' href='\cart'><i class='fas fa-shopping-cart'></i></a>";
}
?>

              <!-- <a href="#myModal" onclick="hideDiv()";   data-toggle="modal" class="nav-link me-3" href="#">Login</a> -->
              <!-- <a class="nav-link me-3" href="wishlist"><i class="far fa-heart"></i></a>
              <a class="nav-link me-3" href="cart"
                ><i class="fas fa-shopping-cart"></i
              ></a> -->
              <a  href="#mySearch"  onclick="popUpSearch()"  data-toggle='modal' class='nav-link me-3' class="nav-link" href="#"
                ><i id="search-icon" class="fa-solid fa-magnifying-glass"></i></a>


            </div>
          </div>
        </div>
      </nav>
    </section>
  </div>
    <!-- End Header -->


    <script>
      function showalert() {
        alert('logged out successfuly');
      }
    </script>