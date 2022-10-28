<?php
include ("../init.php");
use Models\Student;

$id = $_GET['id'];
$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$student->getById($id);

$first_name = $student->getFirstName();
$last_name = $student->getLastName();
$studentClass = $student->viewStudent($id);

$template = $mustache->loadTemplate('student/view.mustache');
echo $template->render(compact('studentClass','first_name','last_name'));
?>