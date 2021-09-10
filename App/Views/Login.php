<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/my.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Log in</title>
</head>

<body >
  <form method="post" action="assets/login.php">
  <div class="container">
    <h3 style="margin-bottom: 15px">Log in</h3>

      <?php
      if (isset($_SESSION['is_success_register']) && $_SESSION['is_success_register'] === true){
          ?>
          <div class="alert-success">
              <?= $_SESSION['success_message'] ?>
          </div>
          <?php
      }
      unset($_SESSION['is_success_register']);
      unset($_SESSION['success_message']);
      ?>
   
    <label  for="email" ><b>Email</b></label>
    <br>
    <input class="loginput" type="text" placeholder="Enter Email" name="email" required>
    <br>

    <label for="password"><b>Password</b></label>
    <br>
    <input class="loginput" type="password" placeholder="Enter Password" name="password" required>
    <br>

    <button class="button" type="submit">
      <a>Log in</a>
    </button>

      <?php
      if (isset($_SESSION['is_error']) && $_SESSION['is_error'] === true){
          ?>
          <div class="alert">
              <?= $_SESSION['error_message'] ?>
          </div>
          <?php
      }
      unset($_SESSION['is_error']);
      unset($_SESSION['error_message']);

      ?>

</form>
</body>
</html>