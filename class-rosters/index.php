<?php

include ("../init.php");
use Models\ClassRoster;

$rosters= new ClassRoster('', '', '', '', '', '');
$rosters->setConnection($connection);
$all_rosters = $rosters->getAll();
$template = $mustache->loadTemplate('ClassRoster/index.mustache');
echo $template->render((compact('all_rosters')));
?>