<?php

  echo "<h3>Blogers list</h3>";

  $query = "SELECT * FROM `users`";
  $cusers = $connector->query($query);
  $allUsers = $cusers->fetchAll(PDO::FETCH_OBJ);

  //echo "<pre>", print_r($allCategories), "</pre>";

  foreach ( $allUsers as $user) {

    $qBlogs = "SELECT * FROM `blog` WHERE user_id = '". $user->id ."'";
    $blogs = $connector->query($qBlogs);
    $blogNumbers = $blogs->rowCount();

  	echo "<a href='index.php?option=blogers&id=" . $user->id . "'>" . $user->username . " (". $blogNumbers .")</a><br>";
  
  }

	 
