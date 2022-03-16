<?php

// 
// Основные функции
// 



// Формирование запрашиваемой страницы
// 
// @param string $controllerName название контроллера
// @param string $actionName название функции обработки страницы
// 

function loadPage($smarty, $controllerName, $actionName = 'index')
{
    include_once (PathPrefix . $controllerName . PathPostfix);

    $function = $actionName . 'Action';
    $function($smarty);
}



// загрузка шаблона
// 
// @param object $smarty объект шаблонизатора
// @param string $templateName название файла шаблона
// 

function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}



// Функция отладки
// Останавливает программу выводя значение $value
// 
// @param variant $value - переменная для вывода ее на страницу
// 

function d($value = null, $die = 1)
{
    function debugOut ($a)
    {
        print '<br/><b>' 
            . basename ($a['file']) . '<br/>'
            . "&nbsp;<font color='red'>({$a['line']})</font>"
            . "&nbsp;<font color='green'>({$a['function']})</font>"
            . "&nbsp; --" . dirname ($a['file']);
    }

    print '<pre>';
        $trace = debug_backtrace();
        array_walk ($trace, 'debugOut');
        print "\n\n";
        print_r ($value);
    print '</pre>';

    if ($die) exit();
}



// Преобразование результата работы функции выборки в ассоциативный массив
// 
// @param recordset $rs набор строк - результат работы SELECT
// @return array
// 

function createSmartyRsArray($rs)
{
    if ( ! $rs) return false;
    $smartyRs = array();
    while ($row = mysql_fetch_assoc($rs)){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}



// Редирект
// 
// @param string $url адрес для перенаправления
// 

function redirect ($url = '/')
{
    header ("Location: {$url}");
    exit();
}