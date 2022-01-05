<?php
if (!defined('_INCODE')) die('Access denied...');

function existAdmin($login_id)
{
    $sql = "SELECT password FROM admins WHERE login_id='$login_id'";
    $adminQuery = getFirstRow($sql);
    return $adminQuery;
}
