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

  <section class='homeSectionArea'>

    <!-- Blog area -->
    <div class='blogSection'>

        <h1 class='center font'>BLOGS!!</h1>

        <?php foreach ($blogs as $blog) : ?>
        <div class='blog_div'>

          <div>
            <p><?php echo $blog['blog']; ?></p>
          </div>

          <div class='votingDiv'>

            <form action="index.php" method="post">
              <input type="hidden" name="action" value="change_vote" />
              <input type="hidden" name="up" value="up" />
              <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>" />
              <button type="submit"><i class="far fa-thumbs-up"></i></button>
            </form>

            <form action="index.php" method="post">
              <input type="hidden" name="action" value="change_vote" />
              <input type="hidden" name="down" value="down" />
              <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>" />
              <button type="submit" name="change_vote"><i class="far fa-thumbs-down"></i></button>
            </form>

          </div>

        </div>
        <?php endforeach; ?>

    </div>
    <!-- End blog area -->

  </section>

</main>

<?php include '../view/Footer.php'; ?>
