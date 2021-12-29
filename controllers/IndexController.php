<?php

// 
// Контроллер главной страницы
// 

include_once ('../models/CategoriesModel.php');

function testAction(){
    print 'IndexController.php > testAction';
}


// 
// Формирование главной страницы сайта
// 
// @param object $smarty шаблонизатор
// 

function indexAction($smarty){
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories' ,$rsCategories);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}