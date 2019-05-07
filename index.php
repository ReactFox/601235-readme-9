<?php

require_once ("helpers.php");
require_once ("functions.php");
require_once ("data.php");
require_once ("init.php");


if (!$link) {
    $error = mysqli_connect_error();
//    $content = include_template('error.php', ['error' => $error]);
}

else {
    $sql = "SELECT * FROM posts p 
    
    JOIN users u ON u.id = p.author_id
    JOIN content_type ct ON p.type_id = ct.type_id   
    ";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

// ДЛЯ ОТЛАДКИ
echo "<pre>";
print_r ($posts);
echo "</pre>";


$content = include_template("index.php", [
    "posts" => $posts
]);

$layout = include_template("layout.php", [
    "is_auth" => $is_auth,
    "content" => $content,
    "user_name" => $user_name,
    "page_title" => $page_title
]);

print ($layout);