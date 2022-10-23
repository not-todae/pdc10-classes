<?php
include ("../init.php");
use Models\Classes;
use Models\Teacher;

$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$all_teachers = $teacher->getAll();
$template = $mustache->loadTemplate('classes/add.mustache');
echo $template->render(compact('all_teachers'));

try {
	if (isset($_POST['name'])) {
		#var_dump($_POST['name'], $_POST['description'], $_POST['code'], $_POST['employee_number']);
		$addClass = new Classes($_POST['name'], $_POST['description'], $_POST['class_code'], $_POST['employee_number']);
		$addClass->setConnection($connection);
		$addClass->insertClass();
		echo "<script>window.location.href='index.php';</script>";
		exit;
	}
}

catch (Exception $e) {
	error_log($e->getMessage());
}
?>