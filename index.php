<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once 'config.php';
require_once 'app/common/quanlydiem_conn.php';

$module = _MODULE_DEFAULT;
$action = _ACTION_DEFAULT;

if (!empty($_GET['module'])) {
    if (is_string($_GET['module'])) {
        $module = trim($_GET['module']);
    }
}

if (!empty($_GET['action'])) {
    if (is_string($_GET['action'])) {
        $action = trim($_GET['action']);
    }
}

$path = 'app/controller/' . $module . '_' . $action . '.php';
// echo $path . '<br>';

if (file_exists($path)) {
    require_once $path;
}
