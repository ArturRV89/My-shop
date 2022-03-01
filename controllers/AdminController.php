<?php

// AdminController.php
// 
// Контроллер бэкенда сайта (/admin/)
// 



// подключаем модели
include_once ('../models/CategoriesModel.php');
include_once ('../models/ProductsModel.php');
include_once ('../models/OrdersModel.php');
include_once ('../models/PurchaseModel.php');



$smarty->setTemplateDir (TemplateAdminPrefix);
$smarty->assign ('templateWebPath', TemplateAdminWebPath);



function indexAction ($smarty)
{
     $rsCategories = getAllMainCategories ();
     
     $smarty->assign ('rsCategories', $rsCategories);
     $smarty->assign ('pageTitle', 'Управление сайтом');
     
     loadTemplate ($smarty, 'adminHeader');
     loadTemplate ($smarty, 'admin');
     loadTemplate ($smarty, 'adminFooter');
}



// 
// добавление новой категории
//

function addnewcatAction ()
{
     $catName = $_POST['newCategoryName'];
     $catParentId = $_POST['generalCatId'];

     $res = insertCat ($catName, $catParentId);

     if ($res){
         $resData['success'] = 1;
         $resData['message'] = 'Категория добавлена';
         
     } else {
         $resData['success'] = 0;       
         $resData['message'] = 'Ошибка добавления категории';       
     }

     print json_encode ($resData);
     return;
}



// страница управления категориями
// 
// @param type $smarty
// 

function categoryAction ($smarty)
{
    $rsCategories = getAllCategories ();
    $rsMainCategories = getAllMainCategories ();
   
    $smarty->assign ('rsCategories', $rsCategories);
    $smarty->assign ('rsMainCategories', $rsMainCategories);
    $smarty->assign ('pageTitle', 'Управление сайтом');

    loadTemplate ($smarty, 'adminHeader');
    loadTemplate ($smarty, 'adminCategory');
    loadTemplate ($smarty, 'adminFooter');
}



function updatecategoryAction ()
{
    $itemId = $_POST['itemId'];
    $parentId = $_POST['parentId'];
    $newName = $_POST['newName'];

    $res = updateCategoryData ($itemId, $parentId, $newName);

    if ($res){
        $resData['success'] = 1;
        $resData['message'] = 'Категория обновлена';

    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных категории';
    }

    print json_encode ($resData);
    return;
}