<?php
$select_query = "SELECT * from `messages` WHERE status = 'unread';";
$result = mysqli_query($con, $select_query);
$rows = mysqli_num_rows($result);
$select_query = "SELECT * from `notifications` WHERE status = 'unread';";
$result = mysqli_query($con, $select_query);
$notify_rows = mysqli_num_rows($result);
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- < class="container-fluid"> -->

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button
            class="btn btn-dark d-inline-block d-lg-none ml-auto"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="./notifications"
                  ><sup><?php echo $notify_rows;   ?></sup><i class="fal fa-sharp fa-solid fa-bell"></i
                ></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="./messages"
                  ><sup><?php echo $rows;   ?></sup><i class="fal fa-sharp fa-solid fa-message"></i
                ></a>
              </li>
              <li class="nav-link">
                <a
                  href="#pageSubmenu1"
                  data-toggle="collapse"
                  aria-expanded="false"
                  >Account</a
                >
                <ul class="collapse list-unstyled" id="pageSubmenu1">
                  <li class="nav-link">
                    <a href="./change-password">Password Change</a>
                  </li>
                  <li class="nav-link">
                    <a href="./logout">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- </div> -->
        </nav>
