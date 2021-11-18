<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
</head>
<?php
session_start();
function login($dbh, $login, $password)
{
    $sth = $dbh->prepare("SELECT * FROM users WHERE login= ? AND password= ?");
    $sth->execute(array(
        $login,
        $password
    ));
    $items = $sth->fetchAll(PDO::FETCH_ASSOC);

    if ($items[0]['login'] != '')
    {
        if ($items[0]['isAdmin'] == 1) {
            $_SESSION['isAdmin'] = 1;
        } else {
            $_SESSION['isAdmin'] = 0;
        }
        return true;
    }
    else
    {
        unset($_SESSION['login'], $_SESSION['password']);
        return false;

    }

}
require "../php/db.php";
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    if (login($dbh, $_SESSION['login'], $_SESSION['password'])) {
        ?>
            <a></a>
        <script>
            Swal.fire(
                'Вы успешно выполнили вход',
                'Нажмите ОК, чтобы продолжить',
                'success'
            ).then((result) => {
                if (result.isConfirmed) {
                    location.replace('/');
                }
            });
        </script>
        <?php
    } else {
        ?>
        <a></a>
        <script>
            Swal.fire(
                'Неправильный логи или пароль',
                'Нажмите ОК, чтобы попробовать ещё раз',
                'error'
            ).then((result) => {
                if (result.isConfirmed) {
                    location.replace('/');
                }
            });
        </script>
        <?php
    }
}
