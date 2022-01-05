<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Tìm kiếm điểm môn học');
requireLayout('header.php', $data);

require_once 'app/model/score.php';
require_once 'app/common/connect.php';
require_once 'app/model/admins.php';

$conn = $connect;

$_SESSION['searchByStudent'] = "";
$_SESSION['searchBySubject'] = "";
$_SESSION['searchByTeacher'] = "";


if(!isset($_GET['searchByStudent']) && !isset($_GET['searchBySubject']) &&
!isset($_GET['searchByTeacher'])){
    require_once 'app/view/score_search_input1.php';
}


if(isset($_GET['searchByStudent']) && isset($_GET['searchBySubject']) &&
isset($_GET['searchByTeacher'])) {
    $student = $_GET['searchByStudent'];
    $subject = $_GET['searchBySubject'];
    $teacher = $_GET['searchByTeacher'];
    $_SESSION['searchByStudent'] = ($student);
    $_SESSION['searchBySubject'] = ($subject);
    $_SESSION['searchByTeacher'] = ($teacher);
    $data = diem_search($student,$subject,$teacher,$conn);
    extract($data);
    require_once 'app/view/score_search_input2.php';
}
?>