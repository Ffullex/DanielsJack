<?php
require_once 'layout/Header.php';
if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
    ?>
    <div class="help">Вы должны авторизоваться для просмотра галереи</div>
    <a href="/login">Авторизоваться</a>
    <?php
} else {
    ?>
    <div class="help">Здесь будут картинки(наверное)</div>
    <?php
}
require_once 'layout/Footer.php';