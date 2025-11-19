<?php
require_once "./bootstrap.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
  if ($_POST['password'] !== $_POST['confirm_password']) {
    echo "<script>alert('Passwords do not match');</script>";
  } else {
    echo $auth->resetPassword($_POST['username'], $_POST['password']);
  }
}

require_once "./views/header.php";
?>

<section class="card">
  <h2>Reset password</h2>
  <p class="small">Enter your username and new password.</p>

  <form action="/php-practitioner/resetpassword" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">New password</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Confirm password</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="submit" value="Reset Password">
  </form>

  <p class="small"><a href="/php-practitioner/">Back to Sign In</a></p>
</section>

<?php require_once "./views/footer.php"; ?>