<?php

echo "<h3>Last Blogs</h3>";

$qBlogs = "

   SELECT `blog`.`id` as `blodz_id`,
          `blog`.`title` as `blodz_tajtl`,
          `blog`.`text` as `blodz_text`,
          `blog`.`date` as `blodz_dejt`,
          `blog`.`category_id` as `blog_cat_id`,
          `blog`.`user_id` as `blog_user_id`,

          `blog_category`.`id` as `blog_category_id`,
          `blog_category`.`name` as `blog_category_name`,

          `users`.`id` as `user_id`,
          `users`.`username` as `user_username`

          FROM `blog`, `blog_category`, `users`

          WHERE `blog_category`.`id` = `blog`.`category_id`
          AND `users`.`id` = `blog`.`user_id`
          GROUP BY `blog`.`id`
          ORDER BY `blog`.`date` DESC
";

$blogs = $connector->query($qBlogs);
$allBlogs = $blogs->fetchAll(PDO::FETCH_OBJ);

//echo "<pre>", print_r($allBlogs), "</pre>";

foreach ($allBlogs as $b) {
	echo "<h2>". $b->blodz_tajtl ."</h2><br>";
	echo "<p>Published: ". $b->blodz_dejt ."</br>From:" . $b->user_username . "<br>Category: ". $b->blog_category_name ."</p>";
	echo "<p>". $b->blodz_text ."</p><br>";
    echo "<a href=''>See more...</a><br>";
    echo "<hr>";
}