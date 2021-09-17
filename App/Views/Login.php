<?$this->render('header');

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
<form method="post" action="login/logInUser">
    <div class="container">
    <h3 style="margin-bottom: 1%">Log in</h3>
    <label  for="email" ><b>Email</b></label>
    <br>
    <input class="loginput" type="text" placeholder="Enter Email" name="email" required>
    <br>
    <label for="password"><b>Password</b></label>
    <br>
    <input class="loginput" type="password" placeholder="Enter Password" name="password" required>
    <br>
    <button class="button" type="submit" name="login-submit">
      <a>Log in</a>
    </button>
</form>
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
<?$this->render('footer')?>