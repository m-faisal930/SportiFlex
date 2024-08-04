<?php
include('./connection/connect.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the email address entered by the user
    $email = $_POST["email"];

    // Validate the email address (you can use additional validation methods)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }
    $select_query = "SELECT email_address, customer_id from `customers`";
    $result = mysqli_query($con, $select_query);
    $found = FALSE;
    WHILE ($row = mysqli_fetch_assoc($result)){
        $temp = $row['email_address'];
        $customer_id = $row['customer_id'];
        if ($temp == $email){
            $found = TRUE;
            break;
        }
    }
    if ($found == TRUE){
                // Generate a unique token for password reset
                $token = bin2hex(random_bytes(16));

                $insert_query = "INSERT INTO `tokens` (`customer_id`, `token`, `token_expiry`) VALUES('$customer_id', '$token',  DATE_ADD(NOW(), INTERVAL 30 MINUTE))";
                $result = mysqli_query($con, $insert_query);


                // Create a link with the token as a query parameter
                $resetLink = "http://localhost/SportiFlex%20Store/reset_password.php?token=$token&id=$customer_id"; // Update with your domain and reset_password.php file

                // Include the PHPMailer library
                require ("./PHPMailer/src/PHPMailer.php");
                require ("./PHPMailer/src/SMTP.php");
                require './PHPMailer/src/Exception.php';

                // Create a new PHPMailer instance
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                    // Enable SMTP debugging (optional)
                    $mail->SMTPDebug = 0;  // Set to 2 for detailed debugging information

                    // Set the SMTP credentials and server details
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'redmindigo@gmail.com';
                    $mail->Password = 'oso rag vsp lzh wwdb';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    // Set the email subject, body, and recipient
                    $mail->Subject = 'Reset Password';

                    // Compose the email body
                    $body = 'Click the link below to reset your password:<br>';
                    $body .= '<a href="' . $resetLink . '">Reset Password</a>';

                    // Set the email body
                    $mail->Body = $body;
                    $mail->setFrom('redmindigo@gmail.com', 'Muhammad Faisal');
                    $mail->addAddress('faisal.mr333@gmail.com', 'Muhammad Javed');

                    // Send the email
                    if ($mail->send()) {
                        echo 'Email sent successfully!';
                    } else {
                        echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
                    }
        }
    else {
        echo "<script>alert('Email Not Found');
        window.location.href = './index';
        </script>";
         // Redirect the user to a success page or login pagse
    // header("Location: index");
    // // exit();
    }
}
?>
