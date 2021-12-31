<?php
require_once 'app/model/diem.php';
require_once 'app/common/quanlydiem_conn.php';
$conn = $connect;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    delete($id,$conn);
    header('location: ?module=diem&action=search');
}

require_once 'C:/xampp/htdocs/web/quan_ly_diem_v1.0/app/view/diem_timkiem_input.php';
?>