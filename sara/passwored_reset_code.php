<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/Watches-ecommerce-php-/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/Watches-ecommerce-php-/PHPMailer-master/src/SMTP.php';
require 'C:/xampp/htdocs/Watches-ecommerce-php-/PHPMailer-master/src/Exception.php';

include('connection.php'); // Include your database connection file
session_start();

function send_password_reset($get_name, $get_email, $token)
{
    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'marah12317@outlook.com';
        $mail->Password = 'wala@123@!@#';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('marah12317@outlook.com', 'watch');
        $mail->addAddress($get_email, $get_name); // Replace with actual email and name

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Link';

        // Email template
        $get_email_template = "
            <h2>Password Reset Link</h2>
            <p>Click the following link to reset your password:</p>
            <a href='
            http://localhost/watches-ecommerce-php-/sara/password-change.php?token=$token&email=$get_email'>Reset Password</a>
            <br><br>
        ";

        $mail->Body = $get_email_template;
        $mail->msgHTML($get_email_template);

        $mail->send();

        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['password_reset_link'])) {
    $email = $_POST['email'];
    $get_name = $_POST['email'];
    $token = md5(rand());

    $stmt = $pdo->prepare("INSERT INTO customer (email, verify_token) VALUES (:email, :token)");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);

    if ($stmt->execute()) {
        send_password_reset($get_name, $email, $token);
        $_SESSION['status'] = "We emailed you a password reset link.";
    } else {
        $_SESSION['status'] = "Error inserting token: " . $stmt->errorInfo()[2];
    }
}

$stmt = $pdo->prepare("SELECT email,firstname FROM customer WHERE email = :email LIMIT 1");
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();


if ($stmt && $stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $get_email = $row['email'];

    $update_token = "UPDATE customer SET verify_token = :token WHERE email = :get_email LIMIT 1";
    $update_token_stmt = $pdo->prepare($update_token);
    $update_token_stmt->bindValue(':token', $token, PDO::PARAM_STR);
    $update_token_stmt->bindValue(':get_email', $get_email, PDO::PARAM_STR);
    $update_token_stmt->execute();
    // 


    if ($update_token_stmt) {
        send_password_reset($get_name, $get_email, $token); // Assuming you have a function to send the reset email
        $_SESSION['status'] = "We emailed you a password reset link.";
        // header("Location: password_reset.php");
        // exit(0);
    } else {
        $_SESSION['status'] = "Something went wrong while updating token. #1";
        // header("Location: password_reset.php");
        // exit(0);
    }
} else {
    $_SESSION['status'] = "No Email Found";
    // header("Location: password_reset.php");
    // exit(0);
}

if (isset($_POST['password_update'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_Password'];
    $confirm_Password = $_POST['confirm_Password'];
    $token = $_POST['password_token'];

    // Prepare an UPDATE statement for password update
    $updatePasswordStmt = $pdo->prepare("UPDATE customer SET password = :new_password WHERE email = :email AND verify_token = :token");

    $updatePasswordStmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
    $updatePasswordStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $updatePasswordStmt->bindParam(':token', $token, PDO::PARAM_STR);

    if ($new_password === $confirm_Password) {
        // Execute the update statement
        if ($updatePasswordStmt->execute()) {
            $_SESSION['status'] = "Password updated successfully!";
        } else {
            $_SESSION['status'] = "Error updating password: " . $updatePasswordStmt->errorInfo()[2];
        }
    } else {
        $_SESSION['status'] = "Passwords do not match!";
    }


    if (!empty(($token))) {
        if (!empty(($email)) && !empty(($new_password)) && !empty(($confirm_Password))) {

        } else {
            $_SESSION['status'] = " fill all field";
            // header("Location: password_reset.php");
            // exit(0);

        }

    } else {
        $_SESSION['status'] = "No token Found";
        // header("Location: password_reset.php");
        // exit(0);

    }



}

?>