<?php

include ("../init.php");
use Models\Classes;
use Models\Teacher;

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../templates/Classes')
]);
    $teacher= new Teacher('', '', '', '', '', '');
	$teacher->setConnection($connection);
	$all_teachers = $teacher->getAll();
    $id = $_GET['id'];
    $class = new Classes('','','','','','');
	$class->setConnection($connection);
	$class->getById($id);
    $name = $class->getName();
    $description = $class->getDescription();
    $class_code = $class->getCode();
    $employee_number = $class->getEmployeeNumber();
    //var_dump($class_code, $employee_number);
    echo $mustache->render('edit', compact('class', 'id', 'name', 'description', 'class_code', 'employee_number', 'all_teachers'));
?>