<?php
$is_auth = rand(0, 1);
$user_name = 'Болеслав';

$page_title = 'readme: популярное';

$popular_posts = [
    [
        'post_title' => 'Цитата',
        'post_type' => 'post-quote',
        'post_content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'user' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'post_title' => 'Игра престолов',
        'post_type' => 'post-text',
        'post_content' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'user' => 'Владик',
        'avatar' => 'userpic.jpg'
    ],
    [
        'post_title' => 'Наконец, обработал фотки!',
        'post_type' => 'post-photo',
        'post_content' => 'rock-medium.jpg',
        'user' => 'Виктор',
        'avatar' => 'userpic-mark.jpg'
    ],
    [
        'post_title' => 'Моя мечта',
        'post_type' => 'post-photo',
        'post_content' => 'coast-medium.jpg',
        'user' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'post_title' => 'Лучшие курсы',
        'post_type' => 'post-link',
        'post_content' => 'www.htmlacademy.ru',
        'user' => 'Владик',
        'avatar' => 'userpic.jpg'
    ]
];