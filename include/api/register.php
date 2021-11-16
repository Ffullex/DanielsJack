<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
</head>
<?php
require "../php/db.php";
$login = $_POST['login'];
$password = $_POST['password'];
$sth = $dbh->prepare("SELECT * FROM users WHERE login = ?");
$sth->execute(array($login));
$result = $sth->fetch(PDO::FETCH_ASSOC);
if ($result['login'] == $login) {
    ?>
    <a></a>
    <script>
        Swal.fire(
            'Пользователь с таким логином уже существует',
            'Нажмите ОК, чтобы попробовать ещё раз',
            'error'
        ).then((result) => {
            if (result.isConfirmed) {
                location.replace('/');
            }
        });
    </script>
    <?php
} else {
    $sth = $dbh->prepare("INSERT INTO users SET login = ?, password = ?");
    $sth->execute(array($login, $password));
    ?>
    <a></a>
    <script>
            Swal.fire(
            'Вы успешно зарегистрировались',
            // ahahaha Danya
            'Нажмите ОК, чтобы продолжить',
            'success'
            ).then((result) => {
            if (result.isConfirmed) {
            location.replace('/');
        }
        });
    </script>
    <?php
}
