<?php
require_once("config/db.php");

//устанавливает рессурс соеденения
$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);


//устанавливает кодировку соеденения
mysqli_set_charset($link, "utf8");

$posts = [];
//$content = '';