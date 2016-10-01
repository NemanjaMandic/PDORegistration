<?php

  echo "<h3>Categories list</h3>";

  $query = "SELECT * FROM `blog_category`";
  $categories = $connector->query($query);
  $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

  echo "<pre>", print_r($allCategories), "</pre>";

  foreach ($allCategories as $category) {

  	echo "<a href='index.php?option='>" . $category->name . "</a>";
  	echo $category->name, "<br>";
  }

	 
