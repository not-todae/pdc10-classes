<?php
include ("../init.php");
use Models\ClassRoster;

$id=$_GET['id'] ?? null;

try{
    if(isset($_GET['id']));{
$classRoster= new ClassRoster('', '');
$classRoster->setConnection($connection);
$classRoster->getById(intval($id));
$classRoster->delete();
echo "<script>window.location.href='index.php';</script>";
exit();
}
} catch (Exception $e) {
    error_log($e->getMessage());
}