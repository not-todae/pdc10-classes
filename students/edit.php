<?php

include ("../init.php");
use Models\Student;

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../templates/Student')
]);
    $id = $_GET['id'];
    $student = new Student('','','','','','');
    $student->setConnection($connection);
    $student->getById($id);
    $first_name = $student->getFirstName();
    $last_name = $student->getLastName();
    $student_number = $student->getStudentNumber();
    $email = $student->getEmail();
    $contact_number = $student->getContact();
    $program = $student->getProgram();

    echo $mustache->render('edit', compact('student', 'id', 'first_name', 'last_name', 'student_number','email','contact_number','program'));
?>

