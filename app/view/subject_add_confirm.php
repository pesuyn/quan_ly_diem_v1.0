<?php
if (!defined('_INCODE')) die('Access denied...');
?>

<hr>
<div class="container">

    <h3 class="text-center text-uppercase" style="margin-bottom: 50px;"> Thêm môn học </h3>

    <form action="?module=subject&action=add&screen=complete" method="post" enctype="multipart/form-data">
        <!-- name field -->
        <div class="row mx-auto" style="width: 50%; margin: 20px auto;">
            <div class=" col-sm-4 text-center">
                <label> Tên môn học </label>
            </div>
            <div class="col-sm-8">
                <input readonly type="text" class="form-control" name="name" value="<?php echo getOldFormData('name', $subjectData); ?>">
            </div>
        </div>

        <!-- school_year field -->
        <div class="row mx-auto" style="width: 50%; margin: 20px auto;">
            <div class="col-sm-4 text-center">
                <label> Khóa học </label>
            </div>
            <?php
            $schoolYear = getOldFormData('school_year', $subjectData);
            if (defined('_SCHOOL_YEARS') && $subjectData) {
                foreach (_SCHOOL_YEARS as $key => $value) {
                    if ($key == $schoolYear) {
                        $schoolYear = $value;
                    }
                }
            }
            ?>
            <div class="col-sm-8">
                <input readonly type="text" class="form-control" name="school_year" value="<?php echo $schoolYear; ?>">
            </div>
        </div>

        <!-- description field -->
        <div class="row mx-auto" style="width: 50%; margin: 20px auto;">
            <div class=" col-sm-4 text-center">
                <label> Mô tả chi tiết </label>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <textarea readonly class="form-control" rows="5" name="description"><?php echo getOldFormData('description', $subjectData); ?></textarea>
                </div>
            </div>
        </div>

        <!-- avatar field -->
        <div class="row mx-auto" style="width: 50%; margin: 20px auto;">
            <div class=" col-sm-4 text-center">
                <label> Avatar </label>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <img src="<?php echo getOldFormData('uploadPath', $subjectData); ?>" alt="Ảnh đại diện" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>

        <div class=" row mx-auto text-center" style="width: 50%; margin: 20px auto;">
            <div class="col-sm-6">
                <a href="?module=subject&action=add" class="btn btn-primary"> Sửa lại </a>
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary "> Xác nhận </button>
            </div>
        </div>
    </form>


</div>