<?php

// 
// Инициализация подключения к БД
// 

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

// подключаемся к БД
$db = mysql_connect ($dblocation, $dbuser, $dbpasswd, $dbname);

if (! $db){
    print 'Ошибка доступа к MySql';
    exit();
}

// кодировка по умолчанию
mysql_set_charset ('utf8');

if (! mysql_select_db ($dbname, $db)){
    print 'Ошибка доступа к базе данных';
    exit();
}