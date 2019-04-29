CREATE DATABASE readme_db
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE UTF8_GENERAL_CI;

USE readme_db;

CREATE TABLE users
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    dt_reg   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email    CHAR(128) NOT NULL UNIQUE,
    name     CHAR(64)  NOT NULL,
    password CHAR(64)  NOT NULL,
    avatar   CHAR(255),
    contact  TEXT(255)
);

CREATE TABLE posts
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    dt_add     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    content    TEXT(1024),
    author_id  INT,
    image      CHAR(128),
    video      CHAR(128),
    link       CHAR(128),
    show_count INT
);

CREATE TABLE comments
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT(1024) NOT NULL
);

CREATE TABLE likes
(
    user_like INT NOT NULL,
    post_like INT NOT NULL
);

CREATE TABLE subscriber
(
    who_signed_id INT NOT NULL,
    subscribed_id INT NOT NULL
);

CREATE TABLE messages
(
    dt_add       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cont_massage TEXT(1024) NOT NULL,
    sender_id    INT        NOT NULL,
    recipient    INT        NOT NULL
);

CREATE TABLE hashtags
(
    hashtag_id      INT AUTO_INCREMENT PRIMARY KEY,
    hashtag_content TEXT(128)
);

CREATE TABLE content_type
(
    type_id    INT AUTO_INCREMENT PRIMARY KEY,
    title      CHAR(8) NOT NULL,
    class_icon CHAR(5)
);

INSERT INTO content_type(title, class_icon)
VALUES ('Текст', 'text');

INSERT INTO content_type(title, class_icon)
VALUES ('Цитата', 'quote');

INSERT INTO content_type(title, class_icon)
VALUES ('Картинка', 'photo');

INSERT INTO content_type(title, class_icon)
VALUES ('Видео', 'video');

INSERT INTO content_type(title, class_icon)
VALUES ('Ссылка', 'link');users