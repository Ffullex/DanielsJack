<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include '../php/db.php';
$tmp_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/tmp/';
$path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/gallery/';
$base_patch = '/assets/img/gallery/';
echo $_POST['images'];
if (!empty($_POST['images'])) {
    $sth = $dbh->prepare("INSERT INTO gallery (url) VALUES (null)");
    $sth->execute();
    $sth = $dbh->prepare("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC LIMIT 1");
    $sth->execute();
    $item = $sth->fetchAll(PDO::FETCH_ASSOC);
    $insert_id = $item[0]['id'];
    foreach ($_POST['images'] as $row) {
        $filename = preg_replace("/[^a-z0-9\.-]/i", '', $row);
        $filename_base = $base_patch.$filename;
        if (!empty($filename) && is_file($tmp_path . $filename)) {
            $sth = $dbh->prepare("INSERT INTO gallery (url) VALUES (?)");
            $sth->execute(array($filename_base));

            // Перенос оригинального файла
            rename($tmp_path . $filename, $path . $filename);

            // Перенос превью
            $file_name = 'id' . $insert_id;
            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
            $thumb = $file_name . '-thumb.' . $file_ext;
            rename($tmp_path . $thumb, $path . $thumb);
        }
    }
}