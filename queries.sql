USE readme_db;

# Добавляет список типов контента для поста;

INSERT INTO content_type(title, class_icon)
VALUES ('Текст', 'text'),
       ('Цитата', 'quote'),
       ('Картинка', 'photo'),
       ('Видео', 'video'),
       ('Ссылка', 'link');

# Добавляет пару пользователей;

INSERT INTO users
SET dt_reg     = NOW(),
    `email`    = 'ivan.ivanov@gmail.com',
    `usr_name` = 'Ivan',
    `pass`     = 'secret';
INSERT INTO users
SET dt_reg     = NOW(),
    `email`    = 'boris.borisov@gmail.com',
    `usr_name` = 'Boris',
    `pass`     = 'secret';

