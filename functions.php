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