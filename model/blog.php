<?php

  //This function will get all the blogs from the blogs table.
  function get_all_Blogs(){
    global $db;
    $query = "SELECT * FROM blog";
    $statement = $db->prepare($query);
    $statement->execute();
    $topics = $statement->fetchAll();
    $statement->closeCursor();
    return $topics;
  }

  //This function will add a blog to the blog table.
  function add_blog_entry($blog_post, $user_id, $votes) {
      global $db;
      $query = 'INSERT INTO blog
                    (user_id, blog, votes)
                  VALUES
                    (:user_id, :blog, :votes)';
      $statement = $db->prepare($query);
      $statement->bindValue(':user_id', $user_id);
      $statement->bindValue(':blog', $blog_post);
      $statement->bindValue(':votes', $votes);
      $statement->execute();
      $statement->closeCursor();
  }

?>
