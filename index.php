<?php

require_once ("helpers.php");
require_once ("functions.php");
require_once ("data.php");



$content = include_template("index.php", [
    "popular_posts" => $popular_posts
]);

$layout = include_template("layout.php", [
    "is_auth" => $is_auth,
    "content" => $content,
    "user_name" => $user_name,
    "page_title" => $page_title
]);

print ($layout);