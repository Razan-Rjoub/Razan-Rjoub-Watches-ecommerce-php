<?php
include('connection.php');

// Ensure proper error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user submitted the login form
if (isset($_POST['submit_login'])) {
    $Username = $_POST['Username'];
    $password = $_POST['password'];

    // Check if the user exists
    $query_select = "SELECT * FROM customer WHERE Username = ?";
    $stmt_select = $pdo->prepare($query_select);
    $stmt_select->bindParam(1, $Username);
    $stmt_select->execute();
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($row) { // User exists
        if (password_verify($password, $row['password'])) { // Password verification
            session_start();
            $_SESSION['username'] = $Username;
            $user_id = $row['id'];
            $_SESSION['loginstatus'] = 1;
            
            // Set session variable indicating checkout redirection
            $_SESSION['redirect_to_checkout'] = true;
            
            // Set cookie with expiration
            $expiration = strtotime('+1 month');
            setcookie('userid', $user_id, $expiration, '/');
            
            if ($row['role'] == 1) { // Admin
                header('Location: admin.php');
                exit();
            } else {
                // Redirect to checkout page
                header('Location: ../cart/shoping-cart.php'); // Update with your checkout page URL
                exit();
            }
        } else {
            echo 'Invalid password';
            include('login.php');
        }
    } else {
        echo 'User not found';
        include('login.php');
    }
}

$pdo = null; // Close database connection
?>
