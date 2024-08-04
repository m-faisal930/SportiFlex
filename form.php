<?php
// ini_set('session.gc_maxlifetime', 2592000);
@session_start();

    // include('./connection/connect');

?>



<script type="text/javascript">
        function movePage() {
            // Redirect the page
            window.location = "form";
            }
        }
    </script>
    <!-- C:\xampp\htdocs\SportiFlex Store\connection\connect -->
    <!-- Form Setup -->
    <!-- Modal HTML -->

    <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-login">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="login-title" class="modal-title">Sign In</h4>
            <button href="index" type="button" class="close">
              <a href="./index"><i class="fa-thin fa-square-xmark"></i></a>
            </button>
            <h4 id="register-title" class="modal-title">Sign Up</h4>
            <button href="index" type="button" class="close">
              <a href="/index"
                ><i class="fas fa-thin fa-square-xmark fa-2xl"></i
              ></a>
            </button>
            <h4 id="change-title" class="modal-title">change Password</h4>
            <button href="index" type="button" class="close">
              <a href="/index"
                ><i class="fas fa-thin fa-square-xmark fa-2xl"></i
              ></a>
            </button>
          </div>
          <div class="modal-body">
            <form
              id="register-form"
              style="display: none"
              action=""
              method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa fa-user"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control"
                    name="user_username"
                    placeholder="Username"
                    required="required"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="far fa-solid fa-envelope mt-2"></i
                  ></span>
                  <input
                    type="email"
                    class="form-control"
                    name="user_email"
                    placeholder="Email"
                    required="required"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa fa-lock"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control"
                    name="user_password"
                    placeholder="Password"
                    required="required"
                  />
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="user_registration" class="btn btn-primary btn-block btn-lg">
                  Sign Up
                </button>
              </div>
              <!-- <p class="hint-text"><a href="#">Forgot Password?</a></p> -->
              <br /><br /><br />
              <p>Already have account?</p>

              <button
                id="login-button"
                onclick="show_login();"
                class="button outlined btn-sm"
                style="border: none"
              >
                <!-- <div class="link-wrapper"> -->
                <a
                  class="link hover-1"
                  href="#"
                  style="
                    color: #0a0a0a;
                    text-decoration: none;
                    background-color: #f8f8f8;
                  "
                >
                  Sign In</a
                >
              </button>
            </form>
            <form id="login-form" action="" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa fa-user"></i
                  ></span>
                  <input
                    type="text"
                    name="user_username"
                    class="form-control"
                    placeholder="Username"
                    required="required"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa fa-lock"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control"
                    name="user_password"
                    placeholder="Password"
                    required="required"
                  />
                </div>
              </div>
              <div class="form-group">
                <button type="submit" onclick = "movePage();" name="user_login" class="btn btn-primary btn-block btn-lg">
                 Sign In
                </button>
              </div>
              <p class="hint-text"><a id="change-password-button" href="#">Forgot Password?</a></p>
              <br /><br /><br />

              <button
                id="register-button"
                class="button outlined btn-sm"
                style="border: none"
              >
                <!-- <div class="link-wrapper"> -->
                <a
                  class="link hover-1"
                  href="#"
                  style="
                    color: #0a0a0a;
                    text-decoration: none;
                    background-color: #f8f8f8;
                  "
                >
                  Sign Up</a
                >
              </button>

              <!-- <button id="register-button"   class="btn-link ">Sign Up</button> -->
            </form>
            <form id="change-password" action="./forgot_password_process" style="display:none;" method="post">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa fa-lock"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control"
                    name="email"
                    placeholder="Email"
                    required="required"
                  />
                </div>
              </div>

              <div class="form-group">
                <button type="submit"  class="btn btn-primary btn-block btn-lg">
                  Verify By Email
                </button>
              </div>

              <br /><br /><br />

              <button
                id="login-button"
                class="button outlined btn-sm"
                style="border: none"
                onclick="show_login();"
              >
                <!-- <div class="link-wrapper"> -->
                <a
                  class="link hover-1"
                  href="#"
                  style="
                    color: #0a0a0a;
                    text-decoration: none;
                    background-color: #f8f8f8;
                  "
                >
                  Sign In</a
                >
              </button>

              <!-- <button id="register-button"   class="btn-link ">Sign Up</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>


    <?php

    // Sinpu Logic
    if (isset($_POST['user_registration'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Select Query
        $select_query = "select * from `customers` where email_address = '$user_email' or username = '$user_username'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
        if ($rows_count > 0){
            echo "<script> alert('Username or Email Already exist') </script>";
        }
        else{
        // Insert Query

        $insert_query = "INSERT INTO `customers` (`username`, `email_address`, `password`, `status`) VALUES ('$user_username', '$user_email', '$hash_password','yes')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute){
            echo "<script>alert('Data Inserted Successfuly')</script>";
        }
        else{
            echo "<script>alert('Data Not Inserted Successfuly')</script>";
        }
        $update_query = "INSERT into `notifications` (`message`, `status`) values('A new User has been Registered!', 'unread');";
$result = mysqli_query($con, $update_query);

    }
    }


    // Login Logic
    if (isset($_POST['user_login'])){
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];

        // Select Query
        $select_query = "select * from `customers` where username = '$user_username'";
        $result = mysqli_query($con, $select_query);

        $rows_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        $customer_id = $row_data['customer_id'];
        if ($rows_count > 0){
            if(password_verify($user_password, $row_data['password'])){
              // Assuming the login is successful and $user is the username
              // Retrieve the user's ID from the database
              echo "<script> alert('Logged In Successfuly') </script>";
              // $userID = getUserIdFromDatabase($user);
              // Set the session variables
              
              $_SESSION['loggedin'] = true;
              // $_SESSION['user'] = $customer_id;
              $_SESSION['user'] = $user_username;
              $_SESSION['userID'] = $customer_id;

            }
            else{

                echo "<script> alert('Invalid Credential') </script>";
            }
        }
        else{
            echo "<script> alert('Invalid Credential') </script>";



    }
    }

    ?>




