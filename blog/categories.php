<?php

  echo "<h3>Categories list</h3>";

  $query = "SELECT * FROM `blog_category`";
  $categories = $connector->query($query);
  $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

  //echo "<pre>", print_r($allCategories), "</pre>";

  foreach ($allCategories as $category) {

    $qBlogs = "SELECT * FROM `blog` WHERE category_id = '". $category->id ."'";
    $blogs = $connector->query($qBlogs);
    $blogNumbers = $blogs->rowCount();

  	echo "<a href='index.php?option=categories&id=" . $category->id . "'>" . $category->name . " (". $blogNumbers .")</a><br>";
  
  }

	 
