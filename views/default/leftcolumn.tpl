
{*левый столбец*}

<div id="leftColumn">
    
    <div id="leftMenu">
        <div class="menuCaption">Меню: </div>
            {foreach $rsCategories as $item}
                <a href="/category/{$item['id']}/">{$item['name']}</a><br/>

                {if isset ($item['children'])}
                    {foreach $item['children'] as $itemChild}
                        ---<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br/>
                    {/foreach}
                {/if}

            {/foreach}
    </div>

    <div id="userBox" class="hideme">
        <a href="#" id="userLink"></a><br/>
        <a href="/user/logout/">Exit</a>
    </div>



    <div id="loginBox">
        <div class="menuCaption">Авторизация</div>
        <input type="text" name="loginEmail" id="loginEmail" value="" /><br/>
        <input type="password" name="loginPwd" id="loginPwd" value="" /><br/>
        <input type="button" onclick="login();" value="Войти">
    </div>



    <div id="registerBox">
        <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
        <div id="registerBoxHidden">
            Email: <br/>
            <input type="text" name="email" id="email" value=""/><br/>
            Пароль: <br>
            <input type="password" name="pwd1" id="pwd1" value=""/><br/>
            Повторите пароль: <br/> 
            <input type="password" name="pwd2" id="pwd2" value=""/><br/>
            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
        </div>
    </div>   



    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0}{$cartCntItems}
        {else}пусто
        {/if}
    </span>
    
</div>
