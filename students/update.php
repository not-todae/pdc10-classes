<?php
include ("../init.php");
use Models\Student;

try{
    $id = $_POST['id'];

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $student_number = $_POST['student_number'];
        $email = $_POST['email'];
        $contact_number = $_POST['contact_number'];
        $program = $_POST['program'];
        $student = new Student('','','','','','');
        $student->setConnection($connection);
        $student->getById($id);
        $student->update($first_name, $last_name, $student_number, $email, $contact_number, $program);
        echo "<script>window.location.href='index.php';</script>";
        exit;
        }

catch (Exception $e){
    error_log($e->getMessage());
}