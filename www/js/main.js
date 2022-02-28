// Функция добавления товара в корзину
// 
// @param integer itemId - ID продукта
// @return в случае успеха обновятся данные корзины на странице
// 

function addToCart(itemId)
{
    console.log("js - addToCart()");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function (data) {
            if ( data['success']){
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }
    });
}



// удаление продукта из корзины
// 
// @param integer itemId - ID продукта
// @return в случае успеха обновляется данные корзины на странице
// 

function removeFromCart(itemId) 
{
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
        method: 'POST',
        async: false,
        url: "/cart/removefromcart/" + itemId + '/',
        dataType: 'json',
        success: function (data) {
            if (data['success']){
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}



// подсчет стоимости купленного товара
// 
// @param integer itemId ID продукта
// 

function conversionPrice(itemId) 
{
    var newCnt = $('#itemCnt_'+ itemId).val();
    var itemPrice = $('#itemPrice_'+ itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}



// получение данных с формы
// 
// @param obj_form - формы для заплнения
// 

function getData(obj_form) 
{
    var hData = {};
    $('input, textarea, select' , obj_form).each (function(){
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}



// 
// регистрация нового пользователя
// 

function registerNewUser() 
{
    var postData = getData ('#registerBox');
    $.ajax ({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert (data['message']);

                // блок в левом столбце
                $('#registerBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();

                // страница заказа
                $('#loginBox').hide();
                $('#btnSaveOrder').show();

            } else {
                alert(data['message']);
            }
        }
    });
}



// 
// авторизация пользователя
// 

function login() 
{
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();
    
    var postData = "email="+ email +"&pwd=" +pwd;
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function (data){
            if (data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
                
                // заполняем поля на странице заказа
                $('#name').val(data['name'])
                $('#phone').val(data['phone'])
                $('#adress').val(data['adress'])
                
                $('#btnSaveOrder').show();

            } else {
                alert(data['message']);
            }
        }
    });
}



// 
// прячем меню регистрации
// 

function showRegisterBox() 
{
    if ($('#registerBoxHidden').css('display') != 'block'){
        $('#registerBoxHidden').show();

    } else {
        $('#registerBoxHidden').hide();
    }
}



// 
// обновление данных пользователя
// дедовским способом
// 

function updateUserData() 
{
    console.log('js - updateUserData()');

    var name = $('#newName').val();
    var phone = $('#newPhone').val();
    var adress = $('#newAdress').val();
    var pwd1 = $('#newPwd1').val();
    var pwd2 = $('#newPwd2').val();
    var curPwd = $('#curPwd').val();
    
    var postData = {name: name,
                            phone: phone,
                            adress: adress,
                            pwd1: pwd1,
                            pwd2: pwd2,
                            curPwd: curPwd};

    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/update/",
        data: postData,       
        dataType: 'json',
        success: function (data){
            if (data['success']) {
                $('#userLink').html(data['userName']);
                alert (data['message']);
            } else {
                alert (data['message']);
            }
        }
    });
}



// 
// Сохранение заказа
// 

function saveOrder ()
{
    var postData = getData ('#frmOrder');
        
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/saveorder/",
        data: postData,
        dataType: 'json',
        success: function (data){
            if (data['success']){
                alert (data['message']);
                document.location = '/';
                
            } else {
                alert (data['message']);
            }
        }
    });
}



// показать или спрятать данные о заказе
// 
// @param ID - id продукта
// 

function showProducts (id)
{
    var objName = "#purchasesForOrderId_" + id;
    
    if ($(objName) . css ('display') != 'table-row'){
        $(objName) . show ();

    } else {
        $(objName) . hide ();
    }
}