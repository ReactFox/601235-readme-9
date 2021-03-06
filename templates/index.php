<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">
            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">
                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="popular__filters filters">
            <b class="popular__filters-caption filters__caption">Тип контента:</b>
            <ul class="popular__filters-list filters__list">
                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <a class="filters__button filters__button--ellipse filters__button--all filters__button--active"
                       href="#">
                        <span>Все</span>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--photo button" href="#">
                        <span class="visually-hidden"><?= $type_contents[2]['title'] ?></span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-<?= $type_contents[2]['icon_filter'] ?>"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--video button" href="#">
                        <span class="visually-hidden"><?= $type_contents[3]['title'] ?></span>
                        <svg class="filters__icon" width="24" height="16">
                            <use xlink:href="#icon-<?= $type_contents[3]['icon_filter'] ?>"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--text button" href="#">
                        <span class="visually-hidden"><?= $type_contents[0]['title'] ?></span>
                        <svg class="filters__icon" width="20" height="21">
                            <use xlink:href="#icon-<?= $type_contents[0]['icon_filter'] ?>"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--quote button" href="#">
                        <span class="visually-hidden"><?= $type_contents[1]['title'] ?></span>
                        <svg class="filters__icon" width="21" height="20">
                            <use xlink:href="#icon-<?= $type_contents[1]['icon_filter'] ?>"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--link button" href="#">
                        <span class="visually-hidden"><?= $type_contents[4]['title'] ?></span>
                        <svg class="filters__icon" width="21" height="18">
                            <use xlink:href="#icon-<?= $type_contents[4]['icon_filter'] ?>"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="popular__posts">

        <?php foreach ($posts as $key => $value): ?>

            <article class="popular__post post <?= $value['class_icon'] ?>">
                <header class="post__header">
                    <h2><?= htmlspecialchars($value['post_title']) ?></h2>
                </header>
                <div class="post__main">
                    <?php if ($value['class_icon'] === 'post-quote'): ?>
                        <blockquote>
                            <p>
                                <?= cut_text(htmlspecialchars($value['content'])) ?>
                            </p>
                            <cite><?= $value['quote_author'] ?></cite>
                        </blockquote>;
                    <?php endif; ?>

                    <?php if ($value['class_icon'] === 'post-link'): ?>
                        <div class="post-link__wrapper">
                            <a class="post-link__external" href="http://<?= htmlspecialchars($value['post_content']) ?>"
                               title="Перейти по ссылке">
                                <div class="post-link__info-wrapper">
                                    <div class="post-link__icon-wrapper">
                                        <img src="img/logo-vita.jpg" alt="Иконка">
                                    </div>
                                    <div class="post-link__info">
                                        <h3><?= htmlspecialchars($value['post_title']) ?></h3>
                                        <span><?= htmlspecialchars($value['link']) ?></span>
                                    </div>
                                </div>

                            </a>
                        </div>
                    <?php endif; ?>


                    <?php if ($value['class_icon'] === 'post-photo'): ?>
                        <div class="post-photo__image-wrapper">
                            <img src="img/<?= htmlspecialchars($value['image']) ?>" alt="Фото от пользователя" width="360"
                                 height="240">
                        </div>
                    <?php endif; ?>


                    <?php if ($value['class_icon'] === 'post-text'): ?>
                        <p><?= cut_text(htmlspecialchars($value['content'])) ?></p>
                    <?php endif; ?>

                </div>
                <footer class="post__footer">
                    <div class="post__author">
                        <a class="post__author-link" href="#" title="Автор">
                            <div class="post__avatar-wrapper">
                                <img class="post__author-avatar" src="img/<?= htmlspecialchars($value['avatar']) ?>"
                                     alt="Аватар пользователя">
                            </div>
                            <div class="post__info">
                                <b class="post__author-name"><?= htmlspecialchars($value['usr_name']) ?></b>

                                <? //$date_pub = generate_random_date($key) //генерирует случайную дату публикаци?>

                                <time class="post__time" datetime="<?= $value['dt_add'] ?> " title="<?= date_title($value['dt_add']) ?>"> <?= get_relative_format($value['dt_add']) ?> </time>
                            </div>
                        </a>
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                                     height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </article>

        <?php endforeach; ?>

    </div>
</div>