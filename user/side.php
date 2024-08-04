

<div class="dashboard-item col-md-4">
        <i class="d-flex justify-content-center far fa-duotone fa-user fa-2xl" style="margin-top: 50px;"></i>

        <?php
        $username = $_SESSION['user'];
       echo" <p class='text-center' style='margin-top: 15px;'>Helo, $username!</p>";
?>

        <ul class="d-flex justify-content-center flex-wrap" style="margin-top: 50px;">
        <button class="button outlined btn-sm" style="border: none; margin-right: 9px; background-color: #f8f8f8;">
            <!-- <div class="link-wrapper"> -->
                
            <a class="link hover-1" href="userdashboard" style="border: none; margin-right: 9px; background-color: #f8f8f8; "><i class="fas fa-solid fa-list-check" style="margin-right: 3px;"></i></i>Dashboard</a>
          </button>
        <button class="button outlined btn-sm" style="border: none; margin-right: 9px; background-color: #f8f8f8;">
            <!-- <div class="link-wrapper"> -->
            <a class="link hover-1" href="userorders" style="border: none; margin-right: 9px; background-color: #f8f8f8;"><i class="fas fa-regular fa-magnifying-glass-minus" style="margin-right: 3px;"></i> Orders</a>
          </button>
        <button class="button outlined btn-sm" style="border: none; margin-right: 9px; background-color: #f8f8f8;">
            <!-- <div class="link-wrapper"> -->
            <a class="link hover-1" href="../wishlist" style="border: none; margin-right: 9px; background-color: #f8f8f8;"><i class="fas fa-solid fa-heart" style="margin-right: 3px;"></i>Wishlist</a>
          </button>
        <button class="button outlined btn-sm" style="border: none; margin-right: 9px; background-color: #f8f8f8;">
            <!-- <div class="link-wrapper"> -->
            <a class="link hover-1" href="user-address" style="border: none; margin-right: 9px; background-color: #f8f8f8;"><i class="fas fa-regular fa-location-crosshairs" style="margin-right: 3px;"></i>Address</a>
          </button>

        <button class="button outlined btn-sm" style="border: none; margin-right: 9px; background-color: #f8f8f8;">
            <!-- <div class="link-wrapper"> -->
            <a class="link hover-1" href="../logout" style="border: none; margin-right: 9px; background-color: #f8f8f8;"><i class="fas fa-regular fa-right-from-bracket" style="margin-right: 3px;"></i>Logout</a>
          </button>
        </ul>

        
    </div>

