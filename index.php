<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$url = explode('/',strtolower(substr($_SERVER['REQUEST_URI'], 1)));

switch($url[0]) {
    case 'main':
    case 'index.php':
    case 'index':
    case '':{
        include 'main.php';
        break;
    }
    case 'help':{
        include 'pages/Help.php';
        break;
    }
    case 'register':{
        include 'pages/Register.php';
        break;
    }
    case 'login':{
        include 'pages/Login.php';
        break;
    }
    case 'upload':{
        include 'pages/Upload.php';
        break;
    }
}