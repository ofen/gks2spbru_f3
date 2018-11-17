<?php 

require '../vendor/autoload.php';

$f3 = \Base::instance();
// DEBUG
$f3->set('DEBUG', 3);
// Setting default templates path
$f3->set('UI', '../templates/');
// Connect to database
$f3->set('DB', new DB\SQL('sqlite:../database.sqlite'));

// $f3->set('ONERROR', function($f3) {
//     if($f3->get('ERROR.code') == '405') {
//         $f3->error(404);
//     }
// });
// Adding navbar tree
$f3->set('navbar', require_once '../data/navbar.php');
// Adding routes
require_once '../data/routes.php';

$f3->run();