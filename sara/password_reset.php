
<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title mb-4">Password Reset</h1>
        <p class="card-text">Enter your email address below to reset your password.</p>

        <form action="passwored_reset_code.php" method="post">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <button type="submit" name="password_reset_link" class="btn btn-primary">Reset Password</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
