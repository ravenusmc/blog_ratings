<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>Blog Ratings</title>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Font for project -->
  <link href="https://fonts.googleapis.com/css?family=Livvic&display=swap" rel="stylesheet">
</head>
<body>

  <header class='navbar_header'>
    <h1 class='logo font'>Blog Ratings</h1>
    <input type="checkbox" id='nav-toggle' class='nav-toggle'>
    <nav>
      <ul>
        <?php if ($navbar != True) : ?>
          <li><a href="<?php echo $fullPath; ?>index.php">Home</a></li>
          <li><a href="<?php echo $fullPath; ?>background.php">Background</a></li>
          <li><a href="<?php echo $fullPath; ?>login.php">Login</a></li>
          <li><a href="<?php echo $fullPath; ?>signup.php">Join</a></li>
        <?php endif; ?>
        <?php if ($navbar == True) : ?>
          <li><a href="?action=home">Blogs</a></li>
          <li><a href="?action=createTopicPage">Create Blog</a></li>
          <li><a href="../logout.php">Log Out</a></li>
        <?php endif; ?>
      </ul>
    </nav>
    <label for="nav-toggle" class='nav-toggle-label'>
      <span></span>
    </label>
  </header>

</body>
