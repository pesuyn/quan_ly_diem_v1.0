<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style type="text/css">
        <?php include 'C:/xampp/htdocs/web/quanlydiem/web/css/diem_timkiem.css'; ?>
    </style>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
$(".delbutton").click(function(){
 if(confirm("Bạn chắc chắn muốn xóa điểm của sinh viên này?")) {
    $.ajax({
     type: "GET",
     data: idD,
     success: function(data){ 
     alert(data);
     }
  });
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
  }
 return false;
});
});
</script>

<body>
    <div class="container_search">
        <form action="" method="GET">
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
    </div>

    <div class="container_table">
        <div class="found"><label>
            <?php
            if($init==1){
                echo "Số bản ghi tìm thấy: $rowCounts";
            }
            ?>
            </label>
        </div>
        <table>
            <tr>
                <th scope="col"><label>NO</th>  
                <th scope="col"><label>Sinh viên</th>
                <th scope="col"><label>Môn học</th>
                <th scope="col"><label>Giáo viên</th>
                <th scope="col"><label>Điểm</th>
                <th scope="col"><label>Action</th>
                <th scope="col"><label>Action</th>
            </tr>
            <?php
            if (isset($rowCounts) && $rowCounts>0) {
                $stt = 1;
                foreach ($statement as $key) {
                    echo "
                    <tr>
                        <td>" . $stt++ ."</td>
                        <td>" . $key['Sinh viên'] . "</td>
                        <td>" . $key['Môn học'] . "</td>
                        <td>" . $key['Giáo viên'] . "</td>
                        <td>" . $key['Điểm'] . "</td>  
                        <td>
                            <a href='diem_init_search.php?idD=".$key['NO']."'
                                class='delbutton' >Xóa</a>
                        </td>   
                        
                        <td>
                            <a href='diem_edit.php?idE=".$key['NO']."'
                                class='editbutton'>Sửa</a>
                        </td>                                
                    </tr>
                    ";
                }
            }else if (isset($rowCounts) && $rowCounts == 0 && $check==1) {
                echo "";
            }else{
                if($init==0){
                    echo '<div class="found">
                            <label>Số bản ghi tìm thấy</label>: '.$rowCountsScores.'
                        </div>';
                }
                $stt = 1;
                foreach ($statementScores as $keyAll){
                    echo "
                    <tr>
                        <td>" . $stt++ ."</td>
                        <td>" . $keyAll['Sinh viên'] . "</td>
                        <td>" . $keyAll['Môn học'] . "</td>
                        <td>" . $keyAll['Giáo viên'] . "</td>
                        <td>" . $keyAll['Điểm'] . "</td>  
                        <td>
                            <a href='diem_init_search.php?idD=".$keyAll['NO']."'
                                class='delbutton' >Xóa</a>
                        </td>   
                        
                        <td>
                            <a href='diem_edit.php?idE=".$keyAll['NO']."'
                                class='editbutton'>Sửa</a>
                        </td>         
                    </tr>
                    ";
                }
            }
            ?>
        </table>
    </div>
    </form>
</body>