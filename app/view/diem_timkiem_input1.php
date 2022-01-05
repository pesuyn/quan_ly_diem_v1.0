<?php
if (!defined('_INCODE')) die('Access denied...');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style type="text/css">
        <?php include 'web/css/diem_timkiem.css'; ?>
    </style>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
    <div class="container_search">
        <div class="function">
            <label class="layout"><?php echo "Tìm kiếm điểm sinh viên"?><label>
        </div>
        <form action="" method="GET">
            <input type="hidden" name="module" value="diem">
            <input type="hidden" name="action" value="search">
            <div class="form_student">
                <label class="keyword1" for="username"><?php echo "Sinh viên" ?></label>
                <input type="text" name="searchByStudent" class="input1" />
                
            </div>
        
            <div class="form_subject">
                <label class="keyword2" for="username"><?php echo "Môn học" ?></label>
                <input type="text" name="searchBySubject" class="input2" />
            </div>
        
            <div class="form_teacher">
                <label class="keyword3" for="username"><?php echo "Giáo viên" ?></label>
                <input type="text" name="searchByTeacher" class="input3" />
            </div>

        <div class="button_submit"> 
            <input class="button" name="form_search" type="submit" value="Tìm kiếm">
        </div>    
        </form>      
    </div>
</body>
