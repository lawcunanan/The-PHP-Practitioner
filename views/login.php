<?php
require_once "./bootstrap.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
  $message =  $auth->signin($_POST['username'], $_POST['password']);

  if (isset($message)) {
    echo $message;
  }
}

require_once "./views/header.php";
?>

<section class="card">
  <h2>Sign In</h2>
  <p class="small">Welcome back — sign in to manage users.</p>

  <form action="/php-practitioner/" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Sign In">
  </form>

  <p class="small">No account? <a href="/php-practitioner/signup">Sign Up</a> — <a href="/php-practitioner/resetpassword">Reset Password</a></p>
</section>

<?php require_once "./views/footer.php"; ?>