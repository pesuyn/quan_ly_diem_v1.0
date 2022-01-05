<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Xóa điểm');
requireLayout('header.php', $data);

require_once 'app/model/diem.php';
require_once 'app/common/connect.php';


$conn = $connect;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    diem_delete($id,$conn);
    $location = "?module=diem&action=search&searchByStudent=".($_SESSION['searchByStudent']).
    "&searchBySubject=".($_SESSION['searchBySubject']). 
    "&searchByTeacher=".($_SESSION['searchByTeacher'])."&form_search=Tìm+kiếm";
    header('Location: '.$location);
}

require_once 'app/view/diem_timkiem_input2.php';
?>