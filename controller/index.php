<?php

  session_start();
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  if (!empty($name)){
    $allowed = True;
  }
  //Pulling in the databases
  require('../model/database.php');
  require('../model/blog.php');

  //Setting a default action
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      if ($action == NULL) {
          $action = 'home';
      }
  }

  if ($allowed){
    switch ($action) {
      //This case will bring the user to the blog page
      case 'home':
        $blogs = get_all_Blogs();
        include('home.php');
        break;
      //This action will submit a new blog posting
      case 'createTopic':
        $blog_post = filter_input(INPUT_POST, 'blog');
        $user_id = $id;
        $votes = 0;
        add_blog_entry($blog_post, $user_id, $votes);
        include('home.php');
        break;
      }
  }else {
    include('notAllowed.php');
  }
?>
