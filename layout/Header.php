<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spaghetti</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
</head>
<body>
<div class="all-content">
<div class="header" id="jedy">
    <h1>Dura lex sed flex </h1>
    <button class="main__help-button">
        <a href="/help" class="main__help-button__text">Помощь</a>
    </button>
    <div class="auto">
    <?php
    if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
        ?>
            <button class="main__help-button">
                <a href="/register" class="main__help-button__text">Регистрация</a>
            </button>
        <button class="main__help-button">
        <a href="/login" class="main__help-button__text">Авторизоваться</a>
            <?php
        }
        ?>
        </button>
    </div>
</div>