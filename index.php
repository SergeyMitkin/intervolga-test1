<?php

// Подключаем файл с логикой
require_once 'models/news-model.php';

// Получаем адрес страницы
if(isset($_GET['view'])){
    $content = 'news-view.php';
}
else{
    $content =  'news-index.php';
}

// Подключаем основной шаблон
require_once('templates/main.php');
