<?php
if (!defined('_INCODE')) die('Access denied...');

try {
    if (class_exists('PDO')) {
        $dsn = _DRIVER . ':dbname=' . _DB . ';host=' . _HOST;

        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        $connect = new PDO($dsn, _USER, _PASS, $options);
        // var_dump($connect);
    }
} catch (Exception $exception) {
    require_once 'app/view/error_db.php';
    die();
}
