<?php
session_start();
?>


<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login Form</title>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add Font Awesome CSS for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Login</h4>
          </div>
          <div class="card-body">
            <form method="post" action="login_process.php">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="Username" placeholder="Enter username"
                  value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" <?php echo isset($_SESSION['remembered_password']) ? 'value="' . $_SESSION['remembered_password'] . '"' : ''; ?>
                  required>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
              <div class="form-group form-check">
                <a href="password_reset.php" ><p>forget password</p></a>
                
              </div>
              <button type="submit" name="submit_login" class="btn btn-primary btn-block">Login</button>
            </form>

            <hr>
            <div class="text-center">
              <p>Or login with:</p>
              <a href="#" class="btn btn-danger"><i class="fab fa-google"></i> Login with Gmail</a>
              <a href="#" class="btn btn-primary"><i class="fab fa-facebook-f"></i> Login with Facebook</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


    <script>
    document.querySelector('input[name="rememberMe"]').addEventListener("change", function () {
        var usernameField = document.querySelector('input[name="Username"]');
        
        if (this.checked) {
            usernameField.value = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
        } else {
            // Clear the field if the checkbox is unchecked
            usernameField.value = '';
        }
    });
</script>


</body>

</html>