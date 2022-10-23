<?php

include ("../init.php");
use Models\Student;
    $student= new Student('', '', '', '', '', '');
    $student->setConnection($connection);
    $all_students = $student->getAll();
    //var_dump($all_students);
    $template = $mustache->loadTemplate('Student/index.mustache');
    echo $template->render((compact('all_students')));
?>