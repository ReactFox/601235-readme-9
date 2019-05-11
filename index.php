<?php

require_once ("helpers.php");
require_once ("functions.php");
require_once ("data.php");
require_once ("init.php");


if (!$link) {
    $error = mysqli_connect_error();
    echo "<h2>$error</h2>";
    exit;
}

else {
    $sql = "SELECT dt_add, post_title, content, quote_author, image, link, show_count, p.type_id, 
       usr_name, avatar ,class_icon FROM posts p     
    JOIN users u ON u.id = p.author_id
    JOIN content_type ct ON p.type_id = ct.type_id
    JOIN likes ON post_like_id = p.id
    ORDER BY post_like_id DESC    
    ";
    $posts = get_mysql_selection_result($link, $sql);



    $sql_get_type_content ="SELECT icon_filter FROM content_type";
    $type_contents = get_mysql_selection_result($link, $sql_get_type_content);

}

$content = include_template("index.php", [
    "type_contents" => $type_contents,
    "posts" => $posts
]);

$layout = include_template("layout.php", [
    "is_auth" => $is_auth,
    "content" => $content,
    "user_name" => $user_name,
    "page_title" => $page_title
]);

print ($layout);
