<?php
require_once "./bootstrap.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
  echo $auth->signup($_POST['username'], $_POST['password']);
}

require_once "./views/header.php";
?>

<section class="card">
  <h2>Create account</h2>
  <p class="small">Create a new account to get started.</p>

  <form action="/php-practitioner/signup" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Sign Up">
  </form>

  <p class="small"><a href="/php-practitioner/">Back to Sign In</a></p>
</section>

<?php require_once "./views/footer.php"; ?>