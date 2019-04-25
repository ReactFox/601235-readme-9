<?php

function cut_text($text, $length = 300)
{
    $length_content = mb_strlen($text);
    $total = 0;
    if ($length_content > $length) {
        $array_words = explode(" ", $text);
        foreach ($array_words as $word) {
            $num = mb_strlen($word);
            $total += $num;
            if ($total < $length) {
                $show_contentent[] = $word;
            }
        }
        return '<p>' . implode(' ',
                $show_contentent) . ' ...' . '</p>' . '<a class="post-text__more-link" href="#">Читать далее</a>';
    }
    return '<p>' . $text . '</p>';
}

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');


function date_title($date_pub)
{
    $date_tamp = strtotime($date_pub);
    return date('d.m.Y H:i', $date_tamp);
}

function get_relative_format($date_pub)
{
    $date_pub = strtotime($date_pub);
    $date_now = time();
    $date_diff = $date_now - $date_pub;

    if ($date_diff < 3600) {
        $date_create = floor($date_diff / 60);
        $result = $date_create . get_noun_plural_form($date_create, ' минута', ' минуты', ' минут') . ' назад';
        return $result;

    } elseif ($date_diff > 3600 && $date_diff < 86400) {
        $date_create = floor($date_diff / 3600);
        $result = $date_create . get_noun_plural_form($date_create, ' час', ' часа', ' часов') . ' назад';
        return $result;

    } elseif ($date_diff > 86400 && $date_diff < 604800) {
        $date_create = floor($date_diff / 86400);
        $result = $date_create . get_noun_plural_form($date_create, ' день', ' дня', ' дней') . ' назад';
        return $result;

    } elseif ($date_diff > 604800 && $date_diff < 3024000) {
        $date_create = floor($date_diff / 604800);
        $result = $date_create . get_noun_plural_form($date_create, ' неделя', ' недели', ' недель') . ' назад';
        return $result;

    } elseif ($date_diff > 3024000) {
        $date_create = floor($date_diff / 3024000);
        $result = $date_create . get_noun_plural_form($date_create, ' месяц', ' месяца', ' месяцев') . ' назад';
        return $result;
    }
}
