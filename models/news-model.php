<?php

function createNewsPreview($a, $preview_length){

    // Объявляем переменную для сокращённого текста и ссылки
    $news_preview = [];

    // Обрезаем текст новости до 180 символов и удаляем пробелы и точки в конце подстроки
    $abridgment = rtrim(mb_substr($a, 0, $preview_length), " \t.");

    // Если последний символ строки ? или ! присоединяем две точки, иначе три
    if (mb_substr($abridgment, -1) === '?' || mb_substr($abridgment, -1) === '!'){
        $abridgment .= '..';
    } else {
        $abridgment .= '...';
    }

    // Находим два послдених слова с помощью регулярного выражения
    // Для этого разбиваем строку по пробельным символам
    preg_match_all('/.+?\s/', $abridgment, $matches, PREG_OFFSET_CAPTURE);

    // Определяем место вхождения предпоследнего слова
    $last_match_offset = $matches[0][array_key_last($matches[0])][1];

    // Разделяем текст превью по месту входения предпоследнего слова
    $news_preview['text'] = mb_substr($abridgment, 0, $last_match_offset);
    $news_preview['link'] = mb_substr($abridgment, $last_match_offset);

    return $news_preview;
}