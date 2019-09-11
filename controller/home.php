<?php

  session_start();
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  if (!empty($name)){
    $navbar = True;
  }


?>
<!-- Bringing in CSS -->
<link rel="stylesheet" type="text/css" href="../assets/css/generic.css">
<!-- CSS for the header -->
<link rel="stylesheet" type="text/css" href="../assets/css/header.css">
<!-- <link rel="stylesheet" type="text/css" href="../assets/css/home.css"> -->

<?php include '../view/header.php'; ?>

<h1>Home</h1>

<?php include '../view/Footer.php'; ?>
