<?php

// 
// Основные функции
// 




// Формирование запрашиваемой страницы
// 
// @param string $controllerName название контроллера
// @param string $actionName название функции обработки страницы
// 

function loadPage($smarty, $controllerName, $actionName = 'index'){
    include_once (PathPrefix . $controllerName . PathPostfix);

    $function = $actionName . 'Action';
    $function($smarty);
}



// загрузка шаблона
// 
// @param object $smarty объект шаблонизатора
// @param string $templateName название файла шаблона
// 

function loadTemplate($smarty, $templateName){
    $smarty->display($templateName . TemplatePostfix);
}



// Функция отладки
// Останавливает программу выводя значение $value
// 
// @param variant $value - переменная для вывода ее на страницу
// 

function d($value = null, $die = 1){
    print 'Debug: <br><pre>';
    print_r ($value);
    print '</pre>';

    if ($die) die;
}