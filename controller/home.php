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

  <section class='blogSection'>
      <h1 class='center font'>BLOGS!!</h1>

      <!-- Blog area -->
      <?php foreach ($blogs as $blog) : ?>
      <div class='blog_div'>
        <p><?php echo $blog['blog']; ?></p>
        <p>Vote</p>
      </div>
      <?php endforeach; ?>
      <!-- End blog area -->

  </section>

</main>

<?php include '../view/Footer.php'; ?>
