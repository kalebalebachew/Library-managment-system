<?php
session_start();
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $error = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homepage.css">
  <title>lMS</title>
</head>
<body>
  <section class="container">
    <h1 class="title">STUDENT lOGIN</h1>
    <div class="content">
      <form action="login.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <label for="userOrEmail" class="details">Username Or Email</label>
            <input class="input" type="text" name="userOrEmail" id="userOrEmail" required>
          </div>
          <div class="input-box">
            <label for="password" class="details">Password</label>
            <input class="input" type="password" name="password" id="password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Login">
        </div>
      </form>
    </div>
    <div class="register-link">
      <a href="register.html" id="sign_up">Sign Up?</a>
    </div>
    <!-- Displaying Error Message -->
    
  </form>
</section>
<?php if(isset($error)) { ?>
  <p style="margin-top: 2rem ; font-size: 2rem; text-align:center; color: coral"><?php echo $error ?></p>
  <p style="margin-top: 2rem ; font-size: 2rem; text-align:center; color: chocolate"></p>
    <?php } ?>
</body>
</html>