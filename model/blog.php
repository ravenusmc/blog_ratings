<?php

  //This function will add a comment to the comments table.
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
