<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Change Password</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <?php
    if (isset($_SESSION['status'])) {
      ?>
      <div class="alert alert-success">
        <h5>
          <?= $_SESSION['status'] ?>
        </h5>
      </div>
      <?php
      unset($_SESSION['status']);

    }

    ?>

    <div class="card">
      <div class="card-body p-4">
        <h1 class="card-title mb-4">Change Password</h1>

        <form action="passwored_reset_code.php" method="post">
          <input type="hidden" value="<?php if (isset($_GET['token'])) {
            echo $_GET['token'];
          } ?>" name="password_token">

          <div class="form-group mb-3">
            <label for="currentPassword">Email Address</label>
            <input type="hidden" class="form-control" id="currentPassword" name="email"
              value="<?php if (isset($_GET['email'])) {
                echo $_GET['email'];
              } ?>" required>
          </div>

          <div class="form-group mb-3">
            <label for="newPassword">New Password:</label>
            <input type="password" class="form-control" id="newPassword" name="new_Password" required>
          </div>

          <div class="form-group mb-3">
            <label for="confirm_Password">Confirm New Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirm_Password" required>
          </div>

          <button type="submit" name="password_update" class="btn btn-primary">Change Password</button>
        </form>
        
      </div>
    </div>
  </div>

  <!-- Inclue Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>