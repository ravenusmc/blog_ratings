<?php

  session_start();
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  if (!empty($name)){
    $navbar = True;
  }

?>
<?php include '../view/header.php'; ?>
<!-- Bringing in CSS -->
<link rel="stylesheet" type="text/css" href="../assets/css/generic.css">
<!-- CSS for the header -->
<link rel="stylesheet" type="text/css" href="../assets/css/header.css">
<!-- CSS for this page -->
<link rel="stylesheet" type="text/css" href="../assets/css/home.css">

<main class='homeMainSection'>

  <section>
      <h1 class='center font'>BLOGS!!</h1>

      <!-- Blog area -->
      <div>
      </div>
      <!-- End blog area -->

  </section>

</main>

<?php include '../view/Footer.php'; ?>
