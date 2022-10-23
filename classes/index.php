<?php

include ("../init.php");
use Models\Classes;
    $class= new Classes('', '', '', '', '', '');
    $class->setConnection($connection);
    $all_classes = $class->getAll();
    #var_dump($all_classes);
    $template = $mustache->loadTemplate('Classes/index.mustache');
    echo $template->render((compact('all_classes')));
?>