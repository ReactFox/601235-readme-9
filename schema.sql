CREATE DATABASE readme_db
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE UTF8_GENERAL_CI;

USE readme_db;

CREATE TABLE users
(
    id       INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_reg   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email    CHAR(128) NOT NULL UNIQUE,
    usr_name CHAR(64)  NOT NULL,
    pass     CHAR(64)  NOT NULL,
    avatar   CHAR(255),
    contact  TEXT(255)
);

# CREATE UNIQUE INDEX email_index ON users(email);

CREATE TABLE posts
(
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_add       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title        TEXT         NOT NULL,
    content      TEXT(1024),
    quote_author CHAR(128),
    image        CHAR(128),
    video        CHAR(128),
    link         CHAR(128),
    show_count   INT UNSIGNED,
    author_id    INT UNSIGNED NOT NULL,
    type_id      INT UNSIGNED NOT NULL,
    hashtag_id   INT UNSIGNED NOT NULL,
    FULLTEXT (title, content)
);



# CREATE INDEX text_index ON posts (content);

CREATE TABLE comments
(
    id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_add    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    content   TEXT(1024)   NOT NULL,
    author_id INT UNSIGNED NOT NULL,
    posts_id  INT UNSIGNED NOT NULL
);

CREATE TABLE likes
(
    id_like      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_like_id INT UNSIGNED NOT NULL,
    post_like_id INT UNSIGNED NOT NULL
);

CREATE TABLE subscribers
(
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    who_signed_id INT UNSIGNED NOT NULL,
    subscribed_id INT UNSIGNED NOT NULL
);

CREATE TABLE messages
(
    id_msg       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dt_add       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cont_massage TEXT(1024)   NOT NULL,
    sender_id    INT UNSIGNED NOT NULL,
    recipient_id INT UNSIGNED NOT NULL
);

CREATE TABLE hashtags
(
    hashtag_id      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hashtag_content TEXT(128)
);

# CREATE INDEX hashtags_index ON hashtags (hashtag_content);

CREATE TABLE content_type
(
    type_id    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title      CHAR(8) NOT NULL,
    class_icon CHAR(5) NOT NULL
);

# CREATE FULLTEXT INDEX title_post ON posts (title, content);