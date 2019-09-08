<?php
  // Start a session
  if (!isset($_SESSION)) {
    session_start();
  }
  //Pulling in the databases
  //require('./model/database.php');
  //global $db;

  if (isset($_POST["login"])){
    $username = filter_input(INPUT_POST, 'username');
  }

?>

<?php include 'view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/signup.css">

<main>

  <h1 class>

  <form method="post" class='form'>

    <div class='form-item'>
      <input type='text' class='form-input' name='username' placeholder="User Name" aria-label="Username">
    </div>

    <div class='form-item'>
      <input type='text' class='form-input' name='firstname' placeholder="First Name" aria-label="Firstname">
    </div>

    <div class='form-item'>
      <input type='text' class='form-input' name='lastname' placeholder="Last Name" aria-label="Lastname">
    </div>

    <div class='form-item'>
      <input type='text' class='form-input' name='address' placeholder="Address" aria-label="Address">
    </div>

    <div class='form-item'>
      <input type='text' class='form-input' name='city' placeholder="City" aria-label="City">
    </div>

    <div class='form-item'>
      <input type='text' class='form-input' name='state' placeholder="State" aria-label="State">
    </div>

    <div class='form-item'>
      <input type='password' class='form-input' name='password_1' placeholder="Password" aria-label="Password">
    </div>

    <div class='form-item'>
      <input type='password' class='form-input' name='password_2' placeholder="Password" aria-label="Password">
    </div>

    <button type="submit" name="login" class='form-button' type='submit'>Submit</button>
  </form>

</main>

<?php include 'view/Footer.php'; ?>
