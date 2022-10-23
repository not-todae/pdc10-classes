<?php
include ("../init.php");
use Models\Teacher;

try{
    $id = $_POST['id'];

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $contact_number = $_POST['contact_number'];
        $employee_number = $_POST['employee_number'];
        $student = new Teacher('','','','','','');
        $student->setConnection($connection);
        $student->getById($id);
        #var_dump($_POST['id'],$_POST['first_name'], $_POST['last_name'], $_POST['student_number'], $_POST['email'], $_POST['contact_number'], $_POST['program']);
        $student->update($first_name, $last_name, $email, $contact_number, $employee_number);
        echo "<script>window.location.href='index.php';</script>";
        exit;
        }

catch (Exception $e){
    error_log($e->getMessage());
}