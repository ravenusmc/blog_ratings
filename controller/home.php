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

  <section id='createBlog'>

    <h2 class='center font'>MAKE YOUR STATEMENT!!</h2>

    <form class='createBlogForm' method="post">

      <div class='form-item'>
        <textarea name='blog' type='text' class='form-input' placeholder="Blog!" aria-label="Blog" rows="4" cols="50">
        </textarea>
      </div>

      <button>Submit</button>

    </form>

  </section>

</main>

<?php include '../view/Footer.php'; ?>
