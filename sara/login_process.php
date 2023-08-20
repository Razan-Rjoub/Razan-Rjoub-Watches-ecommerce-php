<?php
include('connection.php');

// "<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); "// for puton .

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $path = parse_url($urle, PHP_URL_PATH);
    $lastPart = basename($path);
    echo $lastPart; // blog.html;
}
if (isset($_POST['submit_login'])) {
    $Username = $_POST['Username'];
    $password = $_POST['password'];



    // header('Location:../yousef/home.php');
    // To check if the user exists
    $query_select = "SELECT * FROM customer WHERE Username = ?";
    $stmt_select = $pdo->prepare($query_select);
    $stmt_select->bindParam(1, $Username);
    $stmt_select->execute();
    $user = $stmt_select->rowCount();
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

    echo $user;
     $expiration = strtotime('+1 month');
        setcookie('userid', $row['id'], time() + $expiration, '/');
    // print_r($row);

}

if ($user > 0) {
    
    session_start();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Assuming $row['password'] is the hashed password
        // $_SESSION['userid'] = $row['id'];
        // $user = $_SESSION['userid'];
        // $session_id = session_id();
       
        // Set session variables
        $_SESSION['username'] = $Username;
        $user = $_COOKIE["userid"];
        $_SESSION['loginstatus'] = 1;
        if ($row['role'] == 1) { // Role 1 (Admin)
            // Redirect to admin page
            header('Location: admin.php');
            exit(); // Make sure to exit after redirecting
        } else {
            if (isset($_SESSION['cart'])) {

                foreach ($_SESSION['cart'] as $product) {
                    $prodid = $product['productid'];
                    $productName = $product['Productname'];
                    $price = $product['price'];
                    $image = $product['image'];
                    $quantity = $product['quantity'];
                    $query = "INSERT INTO cart (quantity, customerid,productid) VALUES ($quantity, $user,$prodid)";
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                }
                unset($_SESSION['cart']);
                setcookie('session_id_cart', '', time() - 3600, '/');
            }
            if (isset($_SESSION['current_url'])) {
                $savedUrl = $_SESSION['current_url'];
               
            } else {
               
            }
            header("Location:$savedUrl");
            exit(); 
        }
          

    } else if ($password != '') {
        echo 'Invalid password';
        include('login.php');
    } else {
        echo '<script>alert("Please enter a password.");</script>';
        include('login.php');
    }
} else if ($Username != '') {
    echo 'User not found';
    include('login.php');
} else {
    echo '<script>alert("User not found.");</script>';
    include('login.php');
}


$pdo = null;
?>