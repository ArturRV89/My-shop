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

     // получить id созданного заказа (оптимизировать!!!)
     if ($rs){

        //  $lastID = mysql_insert_id(); ////////////

         $sql = "SELECT `id` 
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



// получить список заказов с привязкой к продуктам для пользователя $userId
// 
// @param integer $userId ID пользователя
// @return array массив заказов с привязкой к продуктам
// 

function getOrdersWithProductsByUser ($userId)
{
    $userId = intval ($userId);
    $sql = "SELECT *
                FROM `orders`
                WHERE `user_id` = '{$userId}'
                ORDER BY `id` 
                DESC";

    $rs = mysql_query ($sql);

    $smartyRs = array();
    while ($row = mysql_fetch_assoc ($rs)){
        $rsCildren = getPurchaseForOrder ($row['id']);

        if ($rsCildren){
            $row['children'] = $rsCildren;
            $smartyRs[] = $row;
        }
    }

    return $smartyRs;
}