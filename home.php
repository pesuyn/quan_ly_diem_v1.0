<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href=".\web\css\CSShome.css" >

</head>
<?php 
session_start();
if ($_SESSION['logged'] == false) {
    header("Location: login.php");
} ?>

<body>
    <div class="content">
        <div class="info">
            <div>Tên login: <?php echo $_SESSION['login_id'] ?></div> 
            <div>Thời gian login: <?php echo $_SESSION['time'] ?></div>
        </div>
        <div>
            <div class="key">
                <div class="id">Phòng học</div> 
                <div class="id">Giáo viên</div> 
                <div class="id">Môn học</div> 
                <div class="id">Sinh viên</div> 
                <div class="id">Điểm</div> 
            </div>
            <div class="directional">
                <a class="a" href="classroomSearch.php" >Tìm Kiếm<a>
                <a class="a" href="teacherSearch.php" >Tìm Kiếm<a>
                <a class="a" href="subjectSearch.php" >Tìm Kiếm<a>
                <a class="a" href="studentPassword.php" >Tìm Kiếm<a>
                <a class="a" href="scorePassword.php" >Tìm Kiếm<a>
            </div>
            <div class="directional">
                <a class="a" href="classroomAdd.php" >Thêm mới<a>
                <a class="a" href="teacherAdd.php" >Thêm mới<a>
                <a class="a" href="subjectAdd.php" >Thêm mới<a>
                <a class="a" href="studentAdd.php" >Thêm mới<a>
                <a class="a" href="scoreAdd.php" >Thêm mới<a>
            </div>
        </div>
    </div>
</body>


</html>