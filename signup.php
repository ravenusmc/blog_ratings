<?php
  // Start a session
  if (!isset($_SESSION)) {
    session_start();
  }
  //Pulling in the databases
  //require('./model/database.php');
  //global $db;
  require('key.php');
  echo $test;

  if (isset($_POST["login"])){
    $username = filter_input(INPUT_POST, 'username');
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $password_1 = filter_input(INPUT_POST, 'password_1');
    $password_2 = filter_input(INPUT_POST, 'password_2');

    //Hashing the password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    //These lines will get the latitude and longitude from google maps.
    $address = $street . ' ' . $town . ' ' . $state . ' ' . $zip;
    $prepAddr = str_replace(' ','+', $address);
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key='.$api_key);
    $output = json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;

  }

?>

<?php include 'view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/signup.css">

<main>

  <h1 class='center'>Sign Up</h1>

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
      <input type='text' class='form-input' name='zip' placeholder="Zip" aria-label="Zip">
    </div>

    <div class='form-item'>
      <input type='password' class='form-input' name='password_1' placeholder="Password" aria-label="Password">
    </div>

    <div class='form-item'>
      <input type='password' class='form-input' name='password_2' placeholder="Confirm Password" aria-label="Password">
    </div>

    <button type="submit" name="login" class='form-button' type='submit'>Submit</button>
  </form>

</main>

<?php include 'view/Footer.php'; ?>
