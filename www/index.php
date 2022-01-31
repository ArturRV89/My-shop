<?php

session_start(); // стартуем сессию

// если в сессии нет массива корзины то создаем его
if ( ! isset ($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

include_once ('../config/config.php'); //инициализация настроек
include_once ('../config/db.php'); // инициализация базы данных
include_once ('../library/mainFunctions.php'); //основные функции

// определяем каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? filter_var(ucfirst($_GET['controller'])) : 'index';

// определяем какой функцией будем работать
$actionName = isset($_GET['action']) ? filter_var($_GET['action']) : 'index';

// инициализируем переменную шаблонизатора кол-ва элементов в корзине
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);