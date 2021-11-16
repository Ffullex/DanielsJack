<?php
require_once './layout/Header.php';

?>
<br/>

<form method="post" action="/include/api/login.php" class="form">
    <div class="form__login">
        <input type="text" required id="login" name="login" class="form__login__input">
        <label for="login" class="form__login__label">Логин</label>
    </div>
    <div class="form__pass">
        <input type="password" required id="password" name="password" class="form__pass__input">
        <label for="password" class="form__pass__label">Пароль</label>
    </div>
    <div class="form__butt">
        <button type="submit" class="form__butt__button">Авторизоваться</button>
    </div>
</form>
<?php

require_once './layout/Footer.php';

?>
