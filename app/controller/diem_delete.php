<?php
require_once 'C:/xampp/htdocs/web/quanlydiem/app/model/diem_model.php';
$test = new diem_model();
$test->extract_conn();
if(isset($_GET['idD'])){
    $id = $_GET['idD'];
    $test->delete($id);
    header('location: diem_init_search.php');
}
require_once 'C:/xampp/htdocs/web/quanlydiem/app/view/diem_timkiem_input.php';

?>