<?php
require_once 'app/model/diem.php';
require_once 'app/common/quanlydiem_conn.php';
$conn = $connect;
$data = initTable($conn);
extract($data);

if(isset($_GET['searchByStudent']) && isset($_GET['searchBySubject']) &&
isset($_GET['searchByTeacher'])){
    $student = $_GET['searchByStudent'];
    $subject = $_GET['searchBySubject'];
    $teacher = $_GET['searchByTeacher'];
    $data = search($student,$subject,$teacher,$conn);
    extract($data);
}
require_once 'C:/xampp/htdocs/web/quan_ly_diem_v1.0/app/view/diem_timkiem_input.php';

?>