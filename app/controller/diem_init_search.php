<?php
require_once 'C:/xampp/htdocs/web/quanlydiem/app/model/diem_model.php';
$test = new diem_model();
$test->extract_conn();

$data = $test->initTable();
extract($data);

if(isset($_GET['searchByStudent']) && isset($_GET['searchBySubject']) &&
isset($_GET['searchByTeacher'])){
    $student = $_GET['searchByStudent'];
    $subject = $_GET['searchBySubject'];
    $teacher = $_GET['searchByTeacher'];
    $data = $test->search($student,$subject,$teacher);
    extract($data);
}

if(isset($_GET['idD'])){
    header('location: diem_delete.php');
}

if(isset($_GET['idE'])){
    header('location: diem_edit.php');
}


require_once 'C:/xampp/htdocs/web/quanlydiem/app/view/diem_timkiem_input.php';
?>