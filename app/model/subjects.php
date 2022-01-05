<?php
if (!defined('_INCODE')) die('Access denied...');

function filterBySchoolYear($schoolYear, $filter)
{
    if (!empty($filter) && strpos($filter, 'WHERE') !== false) {
        $operator = 'AND';
    } else {
        $operator = 'WHERE';
    }
    $filter .= " $operator school_year=$schoolYear";
    return $filter;
}

function filterByKeyword($keyword, $filter)
{
    if (!empty($filter) && strpos($filter, 'WHERE') !== false) {
        $operator = 'AND';
    } else {
        $operator = 'WHERE';
    }
    $filter .= " $operator name LIKE '%$keyword%'";
    return $filter;
}

function getAllSubjects($filter)
{
    $sql = "SELECT * FROM subjects $filter ORDER BY id DESC";
    $allSubjectsQuery = getAllRows($sql);
    return $allSubjectsQuery;
}
