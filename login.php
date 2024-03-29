<?php

  session_start();
  //Pulling in the databases
  require('./model/database.php');
  require('./model/helpers.php');

  global $db;
  $message = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    //Getting the password from the database
    $query = "SELECT * FROM users
          WHERE userName = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    //Setting the user_table variable to store the password for the verify function
    $user_table_password = $user['password'];
    //Verifing the password from the database.
    $valid_password = password_verify($password, $user_table_password);
    if ($valid_password) {
      $user = get_one_user($username, $user_table_password);
      $_SESSION["username"] = $username;
      $_SESSION["user_id"] = $user['user_id'];
      header("location: controller/index.php");
      exit();
    }else {
      $message = '<label>Password is Wrong!</label>';
    }
  }

?>
<?php include 'view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<!-- CSS for the header -->
<link rel="stylesheet" type="text/css" href="./assets/css/header.css">
<link rel="stylesheet" type="text/css" href="./assets/css/login.css">

<main>

  <!-- Start of error handling -->
  <?php
    if (isset($message)){
      echo $message;
    }
  ?>
  <!-- End of error handling -->

  <form method="post" class='form'>

    <div class='form-item'>
      <input name='username' type='text' class='form-input' placeholder="Username" aria-label="Username">
    </div>

    <div class='form-item'>
      <input name='password' type='password' class='form-input' placeholder="Password" aria-label="Password">
    </div>

    <button class='form-button' type='submit'>Submit</button>
  </form>

</main>

<?php include 'view/Footer.php'; ?>
