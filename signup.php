<?php
  // Start a session
  if (!isset($_SESSION)) {
    session_start();
  }
  //Pulling in the databases
  require('./model/database.php');
  global $db;
  require('key.php');

  //This line will be used to display messages
  $message = "";

  if (isset($_POST["login"])){
    $username = filter_input(INPUT_POST, 'username');
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $password_1 = filter_input(INPUT_POST, 'password_1');
    $password_2 = filter_input(INPUT_POST, 'password_2');

    //Hashing the password
    $password_hashed = password_hash($password_1, PASSWORD_DEFAULT);

    //These lines will get the latitude and longitude from google maps.
    $address = $address . ' ' . $city . ' ' . $state . ' ' . $zip;
    $prepAddr = str_replace(' ','+', $address);
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key='.$api_key);
    $output = json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;

    //Having issues with the google geocode api it seems so this block of code
    //ensures that the two lat and long variables have a value to be placed
    //into the database. 
    if (!$latitude){
      $latitude = 0;
    }
    if (!$longitude){
      $longitude = 0;
    }
    //This SQL query checks to see if the username is in the users table.
    $query = "SELECT * FROM users WHERE
              username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $count = $statement->rowCount();

    //Conditional statements based on what the query returns.
    if ($count > 0){
      $message = '<label class="errorMsg">Username Taken!</label>';
    }else if ($password_1 != $password_2) {
      $message = '<label class="errorMsg">Passwords Do Not Match!</label>';
    }else {
      //Error messages for DB connection issues
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      //Query to add new user to the users table
      $query = "INSERT INTO users
                  (username, firstname, lastname, city, state, zip, latitude, longitude, password)
                VALUES
                  (:username, :firstname, :lastname, :city, :state, :zip, :latitude, :longitude, :password)";
      $statement = $db->prepare($query);
      $statement->bindValue(':username', $username);
      $statement->bindValue(':firstname', $firstname);
      $statement->bindValue(':lastname', $lastname);
      $statement->bindValue(':city', $city);
      $statement->bindValue(':state', $state);
      $statement->bindValue(':zip', $zip);
      $statement->bindValue(':latitude', $latitude);
      $statement->bindValue(':longitude', $longitude);
      $statement->bindValue(':password', $password_hashed);
      $statement->execute();
      $statement->closeCursor();
      //Message to alert user that they signed up
      $message = '<label>User Signed Up!</label>';
      //Rerouting user to the login page
      include 'login.php';
    }

  }

?>
<?php include 'view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<!-- CSS for the header -->
<link rel="stylesheet" type="text/css" href="./assets/css/header.css">
<link rel="stylesheet" type="text/css" href="./assets/css/signup.css">

<main>

  <h1 class='center'>Sign Up</h1>

  <form method="post" class='form'>

    <!-- Start of error handling -->
    <?php
      if (isset($message)){
        echo $message;
      }
    ?>
    <!-- End of error handling -->

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
