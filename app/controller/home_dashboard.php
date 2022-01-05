<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Trang chủ');
requireLayout('header.php', $data);

require_once 'app/view/home_dashboard_view.php';

requireLayout('footer.php');
