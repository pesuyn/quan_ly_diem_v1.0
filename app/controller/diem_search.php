<?php
require_once 'app/model/diem.php';
require_once 'app/common/quanlydiem_conn.php';
$conn = $connect;

session_start();
$_SESSION['searchByStudent'] = "";
$_SESSION['searchBySubject'] = "";
$_SESSION['searchByTeacher'] = "";


if(!isset($_GET['searchByStudent']) && !isset($_GET['searchBySubject']) &&
!isset($_GET['searchByTeacher'])){
    require_once 'C:/xampp/htdocs/web/quan_ly_diem_v1.0/app/view/diem_timkiem_input1.php';
}


if(isset($_GET['searchByStudent']) && isset($_GET['searchBySubject']) &&
isset($_GET['searchByTeacher'])) {
    $student = $_GET['searchByStudent'];
    $subject = $_GET['searchBySubject'];
    $teacher = $_GET['searchByTeacher'];
    $_SESSION['searchByStudent'] = ($student);
    $_SESSION['searchBySubject'] = ($subject);
    $_SESSION['searchByTeacher'] = ($teacher);
    $data = search($student,$subject,$teacher,$conn);
    extract($data);
    require_once 'C:/xampp/htdocs/web/quan_ly_diem_v1.0/app/view/diem_timkiem_input2.php';
}
?>