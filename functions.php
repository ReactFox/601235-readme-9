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
        $params = array(
            'sec' => 60,
            'singular' => ' минута',
            'genitive' => ' минуты',
            'plural' => ' минут'
        );
    } elseif ($date_diff >= 3600 && $date_diff <= 86400) {
        $params = array(
            'sec' => 3600,
            'singular' => ' час',
            'genitive' => ' часа',
            'plural' => ' часов'
        );
    } elseif ($date_diff > 86400 && $date_diff <= 604800) {
        $params = array(
            'sec' => 86400,
            'singular' => ' день',
            'genitive' => ' дня',
            'plural' => ' дней'
        );
    } elseif ($date_diff > 604800 && $date_diff <= 3024000) {
        $params = array(
            'sec' => 604800,
            'singular' => ' неделя',
            'genitive' => ' недели',
            'plural' => ' недель'
        );
    } elseif ($date_diff > 3024000) {
        $params = array(
            'sec' => 3024000,
            'singular' => ' месяц',
            'genitive' => ' месяца',
            'plural' => ' месяцев'
        );
    }
    $date_create = floor($date_diff / $params['sec']);
    $result = $date_create . get_noun_plural_form($date_create, $params['singular'], $params['genitive'],
            $params['plural']) . ' назад';
    return $result;
}

function get_mysql_selection_result($con, $sql)
{
    $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = mysqli_error($con);
        print ("Ошибка MySQL: " . $error);
    } else {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
