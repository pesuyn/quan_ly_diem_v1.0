<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Sửa môn học');
requireLayout('header.php', $data);

require_once 'app/model/subjects.php';

echo 'day la subject_edit' . '<br>';

requireLayout('footer.php');
