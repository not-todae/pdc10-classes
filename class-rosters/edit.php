<?php
include ("../init.php");
use Models\ClassRoster;
use Models\Classes;

$class_code =($_GET['class_code']);
$class_roster= new ClassRoster('', '');
$class_roster->setConnection($connection);
$class_students=$class_roster->viewClasses($class_code);
$template = $mustache->loadTemplate('classroster/edit.mustache');
echo $template->render((compact('class_code','class_students')));
?>