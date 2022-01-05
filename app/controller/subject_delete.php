<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Xóa môn học');
requireLayout('header.php', $data);

require_once 'app/model/subjects.php';

echo 'day la subject_delete' . '<br>';

requireLayout('footer.php');
