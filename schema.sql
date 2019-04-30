CREATE DATABASE readme_db
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE UTF8_GENERAL_CI;

USE readme_db;

CREATE TABLE users
(
    id       INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_reg   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email    CHAR(128) NOT NULL UNIQUE,
    name     CHAR(64)  NOT NULL,
    password CHAR(64)  NOT NULL,
    avatar   CHAR(255),
    contact  TEXT(255)
);

CREATE TABLE posts
(
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_add     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title      TEXT NOT NULL,
    content    TEXT(1024),
    author_id  INT UNSIGNED,
    image      CHAR(128),
    video      CHAR(128),
    link       CHAR(128),
    show_count INT UNSIGNED
);


CREATE TABLE comments
(
    id      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT(1024) NOT NULL
);

CREATE TABLE likes
(
    id_like INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_like INT UNSIGNED NOT NULL,
    post_like INT UNSIGNED NOT NULL
);

CREATE TABLE subscriber
(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    who_signed_id INT UNSIGNED NOT NULL,
    subscribed_id INT UNSIGNED NOT NULL
);

CREATE TABLE messages
(
    id_msg       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_add       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cont_massage TEXT(1024)   NOT NULL,
    sender_id    INT UNSIGNED NOT NULL,
    recipient    INT UNSIGNED NOT NULL
);


CREATE TABLE hashtags
(
    hashtag_id      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hashtag_content TEXT(128)
);



CREATE TABLE content_type
(
    type_id    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title      CHAR(8) NOT NULL,
    class_icon CHAR(5) NOT NULL
);

/*
Создаёт связи
автор: пользователь, создавший пост;
тип контента: тип контента, к которому относится пост;
*/

SELECT u.id, u.name
FROM users u
         JOIN posts p
              ON u.id = p.id;

SELECT ct.type_id, ct.title, ct.class_icon
FROM content_type ct
         JOIN posts p
              ON ct.type_id = p.id;


SELECT p.id, name
FROM posts p
         JOIN hashtags ON p.id = hashtag_id;



/*
Вот не могу понять как правильно, как выше сделал или как ниже (((

SELECT p.id, p.title, p.content
FROM posts p
         JOIN users u
              ON p.id = u.id;

SELECT p.id
FROM posts p
         JOIN content_type ct
              ON p.id = ct.id;*/



/*
Связи:
    автор: пользователь, создавший пост;
    пост: пост, к которому добавлен комментарий.
*/

SELECT u.id, u.name
FROM users u
         JOIN comments c
              ON u.id = c.id;

SELECT pst.id
FROM posts pst
         join comments cmt
              on pst.id = cmt.id;



/*Связи:
пользователь: кто оставил этот лайк;
пост: какой пост лайкнули.
*/

SELECT u.id, u.name
FROM users u
         JOIN likes lk
              ON u.id = lk.id_like;

SELECT lk.id_like, lk.post_like
FROM likes lk
         JOIN posts pst
             ON lk.id_like = pst.id;



/*
Связи:
автор: пользователь, который подписался;
подписка: пользователь, на которого подписались.*/

SELECT sb.id, sb.who_signed_id
FROM subscriber sb
         JOIN users u
              on sb.id = u.id;

SELECT sb.id, sb.subscribed_id
FROM subscriber sb
         JOIN users u
              on sb.id = u.id;


/*Связи:

отправитель: пользователь, отправивший сообщение;
получатель: пользователь, которому отправили сообщение.*/

SELECT ms.id_msg, ms.sender_id
FROM messages ms
         JOIN users u ON ms.id_msg = u.id;


SELECT ms.id_msg, ms.recipient
FROM messages ms
         JOIN users u ON ms.id_msg = u.id;





INSERT INTO content_type(title, class_icon)
VALUES ('Текст', 'text'),
       ('Цитата', 'quote'),
       ('Картинка', 'photo'),
       ('Видео', 'video'),
       ('Ссылка', 'link');
