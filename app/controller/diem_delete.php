<?php
require_once 'app/model/diem.php';
require_once 'app/common/quanlydiem_conn.php';
$conn = $connect;

session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    delete($id,$conn);
    $location = "?module=diem&action=search&searchByStudent=".($_SESSION['searchByStudent']).
    "&searchBySubject=".($_SESSION['searchBySubject']). 
    "&searchByTeacher=".($_SESSION['searchByTeacher'])."&form_search=Tìm+kiếm";
    header('Location: '.$location);
}

require_once 'C:/xampp/htdocs/web/quan_ly_diem_v1.0/app/view/diem_timkiem_input2.php';
?>