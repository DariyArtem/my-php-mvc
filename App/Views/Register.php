<?$this->render('header')?>
<form method="post" action="registration/addUser">
  <div class="container">
    <h3>Registration</h3>
    <p>Please fill in this form to create an account.</p>

    <label for="email"><b>Email</b></label>
    <br>
    <input class="registerinput" type="text" placeholder="Enter Email" name="email"  required>
    <br/>

    <label  for="password"><b>Password</b></label>
    <br>
    <input class="registerinput" type="password" placeholder="Enter Password" name="password" required>
    <br>

    <label  for="password_confirmation"><b>Confirm Password</b></label>
    <br>
    <input class="registerinput" type="password" placeholder="Confirm Password" name="password_confirmation" required>
    <br>

    <label  for="username"><b>Username</b></label>
    <br>
    <input class="registerinput" type="text" placeholder="Enter Username" name="username" required>
    <br>

    <button class="button" type="submit"  name="submit_add_user">
      <a>Register</a>
    </button>
    <br>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login">Sign in</a>.</p>
  </div>
</form>
<?
if (isset($_SESSION['is_error']) && $_SESSION['is_error'] === true){
    ?>
    <div class="alert">
        <?= $_SESSION['error_message'] ?>
    </div>
    <?php
}
unset($_SESSION['is_error']);
unset($_SESSION['error_message']);
$this->render('footer')?>