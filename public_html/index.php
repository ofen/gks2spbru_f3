<?php 

require '../vendor/autoload.php';

$f3 = \Base::instance();

$f3->set('navbar', require_once '../navbar.php');
// Setting default templates path
$f3->set('UI', '../templates/');
// Adding routes
require '../routes.php';

$f3->run();