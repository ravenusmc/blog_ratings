<?php include 'view/header.php'; ?>
<!-- <link rel="stylesheet" type="text/css" href="./assets/css/landing.css"> -->

<div class="container height_fix">
  <div class="row margin_fix">
    <!-- Start of login form -->
    <form method="post" class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input name='username' id="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name='password' id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <button type="submit" name="login" class="btn btn-primary form-submit-btn">Login</button>
      <a class="waves-effect waves-light btn" href="signup.php">Sign Up</a>
    </form>
    <!-- End of login form -->

  </div>
</div>
