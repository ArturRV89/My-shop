<?php

include_once ('../models/CategoriesModel.php');
include_once ('../models/ProductsModel.php');



// Формирование страницы продукта
// 
//  @param object $smarty шаблонизатор
// 

function indexAction ($smarty){
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($itemId == null) exit();

    // получить данные продукта
    $rsProduct = getProductById($itemId);

    // получить все категории, для получения главного меню сайта
    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}