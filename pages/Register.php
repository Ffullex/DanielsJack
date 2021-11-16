<?php
require_once './layout/Header.php';

?>
<form method="post" action="/include/api/register.php">
    <div>
        <input type="text" required id="login" name="login">
        <label for="login">Логин</label>
    </div>
    <div>
        <input type="password" required id="password" name="password">
        <label for="password">Пароль</label>
    </div>
    <div>
        <button type="submit">Зарегистрироваться</button>
    </div>
</form>

<?php

require_once './layout/Footer.php';

?>
