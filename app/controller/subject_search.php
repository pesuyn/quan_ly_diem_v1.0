<?php
if (!defined('_INCODE')) die('Access denied...');

$data = array('pageTitle' => 'Tìm kiếm môn học');
requireLayout('header.php', $data);

require_once 'app/model/subjects.php';

// Filter data
$filter = '';
if (isGet()) {
    $bodyArr = getBody();
    echo '<pre>';
    print_r($bodyArr);
    echo '</pre>';

    if (!empty($bodyArr['school_year'])) {
        $schoolYear = $bodyArr['school_year'];
        $filter = filterBySchoolYear($schoolYear, $filter);
    }

    if (!empty($bodyArr['keyword'])) {
        $keyword = $bodyArr['keyword'];
        $filter = filterByKeyword($keyword, $filter);
    }
}

// echo $filter;
$allSubjectsQuery = getAllSubjects($filter);

require_once 'app/view/subject_search_view.php';

requireLayout('footer.php');
