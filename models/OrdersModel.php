<?php

// 
// Модель для таблицы заказов (orders)
// 



// создание заказа (без привязки товара)
// 
// @param string $name
// @param string $phone
// @param string $adress
// @return integer ID созданного заказа
// 

function makeNewOrder ($name, $phone, $adress)
{
     $userId = $_SESSION['user']['id'];
     $dateCreated = date ('Y.m.d H:i:s');
     $comment = "id пользователя: {$userId}<br/>
                         Имя: {$name}<br/>
                         Тел: {$phone}<br/>
                         Адрес: {$adress}";
     $userIp = $_SERVER['REMOTE_ADDR'];

     $sql = "INSERT INTO `orders` (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)
                 VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";

     $rs = mysql_query ($sql);

     // получить id созданного заказа
     if ($rs){
         $sql = "SELECT id 
                    FROM `orders`
                    ORDER BY `id` DESC
                    LIMIT 1";

          $rs = mysql_query ($sql);
          // преобразование результата запроса
          $rs = createSmartyRsArray($rs);

          if (isset ($rs[0])){
              return $rs[0]['id'];
          }
     } 
     return false;   
}