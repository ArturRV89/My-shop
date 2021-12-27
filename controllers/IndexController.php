<?php
// Контроллер главной страницы
function testAction(){
    print 'IndexController.php > testAction';
}


// 
// Формирование главной страницы сайта
// 
// @param object $smarty шаблонизатор
// 

function indexAction($smarty){
    // объявление переменной
    $smarty->assign('pageTitle', 'Главная страница сайта');


    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}