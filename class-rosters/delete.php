<?php
include "../init.php";
use Models\ClassRoster;

    $id = $_GET['id']??null;
    $classRoster = new ClassRoster('', '');
    $classRoster->setConnection($connection);
    $classRoster->getById($id);
    $classRoster->delete();
    $class_code = $class_roster->getCode();
    echo "<script>window.location.href='index.php';</script>";
    exit();
?>