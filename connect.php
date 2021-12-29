<?php
    $severName = "localhost";
    $username = "root";
    $password = "";
    $myDB = "quanlydiem";
    try {
        $conn = new PDO("mysql:host=$severName;dbname=$myDB", $username , $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
        echo "Connection failed" . $e->getMessage();
    }
