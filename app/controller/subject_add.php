<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Thêm môn học');
requireLayout('header.php', $data);

require_once 'app/model/subjects.php';

$bodyArr = getBody(); // GET method

echo '<pre>';
print_r($_SESSION['_FILES']);
echo '</pre>';

$file = getSession('_FILES')['avatar'];
// Rename file before upload
$filename = $file['name'];
$filenameArr = explode('.', $filename);
$ext = end($filenameArr);
$newName = uniqid('avt_', true) . '.' . $ext;

// Upload file into web/avatar/tmp/
$uploadPath = 'web/avatars/test/' . $newName;
$uploadStatus = move_uploaded_file($file['tmp_name'], $uploadPath);


echo '<pre>';
print_r($_FILES);
echo '</pre>';

if (empty($bodyArr['screen'])) {
    /**
     * Control Input screen
     */

    // Handle form submission: POST
    if (isPost()) {

        // Delete file in web/avatars/tmp folder if submit form again
        $subjectData = getSession('subjectData');
        if (!empty($subjectData)) {
            $uploadPath = $subjectData['uploadPath'];
            if (file_exists($uploadPath)) {
                unlink($uploadPath);
            }
            unsetSession('subjectData');
        }

        $bodyArr = getBody(); // POST method

        $errorArr = array();

        // Validate subject's name
        if (empty(trim($bodyArr['name']))) {
            $errorArr['name']['required'] = "Hãy nhập tên môn học!";
        } else {
            if (strlen(trim($bodyArr['name'])) > 100) {
                $errorArr['name']['maxlength'] = "Không nhập quá 100 ký tự!";
            }
        }

        // Validate school_year
        if (empty($bodyArr['school_year'])) {
            $errorArr['school_year']['required'] = "Hãy chọn khóa học!";
        }

        // Validate description
        if (empty(trim($bodyArr['description']))) {
            $errorArr['description']['required'] = "Hãy nhập mô tả chi tiết!";
        } else {
            if (strlen(trim($bodyArr['description'])) > 1000) {
                $errorArr['description']['maxlength'] = "Không nhập quá 1000 ký tự!";
            }
        }

        // Validate avatar (file upload)
        if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) {
            $errorArr['avatar']['required'] = "Hãy chọn avatar!";
        } else {
            setSession('_FILES', $_FILES);
        }

        if (empty($errorArr)) {
            // Rename file before upload
            $file = $_FILES['avatar'];
            $filename = $file['name'];
            $filenameArr = explode('.', $filename);
            $ext = end($filenameArr);
            $newName = uniqid('avt_', true) . '.' . $ext;

            // Upload file into web/avatar/tmp/
            $uploadPath = 'web/avatars/tmp/' . $newName;
            $uploadStatus = move_uploaded_file($file['tmp_name'], $uploadPath);

            if ($uploadStatus) {
                // Go to Confirm screen
                $bodyArr['uploadPath'] = $uploadPath;
                setSession('subjectData', $bodyArr);
                redirect('?module=subject&action=add&screen=confirm');
            }

            //  Set flash-data for showing message
            setFlashData('msg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau!');
            setFlashData('msg_type', 'danger');
        }
        // Set flash-data for showing error and saving content when there is error
        setFlashData('errorArr', $errorArr);
        setFlashData('oldBodyArr', $bodyArr);
        redirect('?module=subject&action=add');
    }
    $msg = getFlashData('msg');
    $msgType = getFlashData('msg_type');
    $errorArr = getFlashData('errorArr');
    $oldBodyArr = getFlashData('oldBodyArr');

    require_once 'app/view/subject_add_input.php';
} else {
    /**
     * Control Confirm screen
     */
    // Check if URL contains &screen=confirm 
    if ($bodyArr['screen'] == 'confirm') {
        $subjectData = getSession('subjectData');
        if (!empty($subjectData)) {
            require_once 'app/view/subject_add_confirm.php';
        } else {
            redirect('?module=subject&action=add');
        }
    }
}




requireLayout('footer.php');
