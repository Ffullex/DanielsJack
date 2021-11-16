<?php
require_once 'layout/Header.php';
if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
    ?>
    <div class="help">Вы должны авторизоваться для обращения в тех. поддержку</div>
    <a href="/login">Авторизоваться</a>
    <?php
} else {
    ?>
    <div class="help">Этот текст нельзя увидеть без авторизации</div>
    <?php
}
require_once 'layout/Footer.php';
?>