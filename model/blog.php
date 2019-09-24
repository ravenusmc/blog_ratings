<?php

  //This function will get all the blogs from the blogs table.
  function get_all_Blogs(){
    global $db;
    $query = "SELECT * FROM blog ORDER BY votes DESC";
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

  //This function will get a specific blog
  function get_one_blog($blog_id){
    global $db;
    $query = 'SELECT * FROM blog
              WHERE blog_id = :blog_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':blog_id', $blog_id);
    $statement->execute();
    $blog = $statement->fetch();
    $statement->closeCursor();
    return $blog;
  }

  //This function will change the votes
  function change_vote($new_vote, $blog_id){
    global $db;
    $query = 'UPDATE blog
    SET votes = :votes
    WHERE blog_id = :blog_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':votes', $new_vote);
    $statement->bindValue(':blog_id', $blog_id);
    $statement->execute();
    $statement->closeCursor();
  }

?>
