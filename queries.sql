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
    `pass`     = 'secret1';

INSERT INTO users
SET dt_reg     = NOW(),
    `email`    = 'boris.borisov@gmail.com',
    `usr_name` = 'Boris',
    `pass`     = 'secret2';

# добавляет посты

INSERT INTO posts
SET dt_add         = NOW(),
    `title`        = 'Цитата',
    `content`      = 'Мы в жизни любим только раз, а после ищем лишь похожих',
    `quote_author` = 'автор неизвестен',
    `author_id`    = 1,
    `type_id`      = 2,
    `hashtag_id`   = 1;

INSERT INTO posts
SET dt_add       = NOW(),
    `title`      = 'Игра престолов',
    `content`    = 'Не могу дождаться начала финального сезона своего любимого сериала!',
    `author_id`  = 2,
    `type_id`    = 1,
    `hashtag_id` = 3;

INSERT INTO posts
SET dt_add       = NOW(),
    `title`      = 'Наконец, обработал фотки!',
    `content`    = 'Не могу дождаться начала финального сезона своего любимого сериала!',
    `image`= 'rock-medium.jpg',
    `author_id`  = 2,
    `type_id`    = 3,
    `hashtag_id` = 3;

INSERT INTO posts
SET dt_add       = NOW(),
    `title`      = 'Моя мечта',
    `image`= 'coast-medium.jpg',
    `author_id`  = 1,
    `type_id`    = 3,
    `hashtag_id` = 5;

INSERT INTO posts
SET dt_add       = NOW(),
    `title`      = 'Лучшие курсы',
    `link`       = 'www.htmlacademy.ru',
    `author_id`  = 1,
    `type_id`    = 5,
    `hashtag_id` = 5;

# Добавляет пару комментариев к разным постам;

# два коментария к посту фильмы
INSERT INTO comments
SET `dt_add`    = NOW(),
    `content`   = 'фильм будет возможно будет очень хороший',
    `author_id` = 1,
    `posts_id`  = 2;

INSERT INTO comments
SET `dt_add`    = NOW(),
    `content`   = 'Я согласен',
    `author_id` = 2,
    `posts_id`  = 2;

# два коментария к посту фотографии

INSERT INTO comments
SET `dt_add`    = NOW(),
    `content`   = 'Вы выглядите отлично',
    `author_id` = 2,
    `posts_id`  = 4;

INSERT INTO comments
SET `dt_add`    = NOW(),
    `content`   = 'поддерживаю',
    `author_id` = 1,
    `posts_id`  = 4;