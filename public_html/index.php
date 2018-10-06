<?php 

require '../vendor/autoload.php';

$f3 = \Base::instance();
// DEBUG
$f3->set('DEBUG', 3);
// Setting default templates path
$f3->set('UI', '../templates/');
// Connect to database
$f3->set('DB', new DB\SQL('sqlite:../database.sqlite'));
// Adding navbar tree
$f3->set('navbar', require_once '../navbar.php');
// Adding routes
require '../routes.php';

$f3->run();