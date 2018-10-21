<?php

// Column
$f3->route('GET /', function($f3) {
    $f3->set('content', 'index.htm');
    echo \Template::instance()->render('layout.htm');
});
// Test
$f3->route('GET /test', function($f3) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($_GET);
});

$f3->route('GET /news', function($f3) {
    $posts = array();
    foreach (glob('../data/news/*.htm') as $post) {
        $posts[] = $post;
    }

    rsort($posts);

    $posts = array_chunk($posts, 2);

    $page = 0;

    if ($_GET) {
        $page = $_GET['page'];
    }

    $f3->set('page', $page);
    $f3->set('posts', $posts);
    $f3->set('content', 'news.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /about', function($f3) {
    $f3->set('content', 'about.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /organization_structure', function($f3) {
    $f3->set('content', 'organization_structure.htm');
    $f3->set('data', require_once '../data/employees.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /working_hours', function($f3) {
    $f3->set('content', 'working_hours.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /jobs', function($f3) {
    $f3->set('content', 'jobs.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_list', function($f3) {
    $f3->set('content', 'house_list.htm');
    $f3->set('data', require_once '../data/house_list.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /order', function($f3) {
    $f3->set('content', 'order.htm');
    $f3->set('files', require_once '../data/order.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /thank_you_letter', function($f3) {
    $f3->set('content', 'thank_you_letter.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /press', function($f3) {
    $f3->set('content', 'press.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /useful_info', function($f3) {
    $f3->set('content', 'useful_info.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /contacts', function($f3) {
    $f3->set('content', 'contacts.htm');
    echo \Template::instance()->render('layout.htm');
});

// Column

$f3->route('GET /pricing', function($f3) {
    $f3->set('content', 'pricing.htm');
    $f3->set('files', require_once '../data/pricing.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /financial_report', function($f3) {
    $f3->set('content', 'financial_report.htm');
    $f3->set('files', require_once '../data/financial_report.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_meter_reading', function($f3) {
    $f3->set('content', 'house_meter_reading.htm');
    $f3->set('data', require_once '../data/house_meter_reading.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_report', function($f3) {
    $f3->set('content', 'house_report.htm');
    $f3->set('files', require_once '../data/house_report.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /average_monthly_temperature', function($f3) {
    $f3->set('content', 'average_monthly_temperature.htm');
    $f3->set('data', require_once '../data/average_monthly_temperature.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /purchases', function($f3) {
    $f3->set('content', 'purchases.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /to_vdgo', function($f3) {
    $f3->set('content', 'to_vdgo.htm');
    $f3->set('data', require_once '../data/to_vdgo.php');
    echo \Template::instance()->render('layout.htm');
});

// Column

$f3->route('GET /reception', function($f3) {
    $f3->set('content', 'reception.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('POST /reception', function($f3) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['result' => validate($_POST, $_FILES)]);
});

// class Page {
//     public function home() {
//         $f3->set('content', 'index.htm');
//         echo \Template::instance()->render('../templates/layout.htm');
//     }

//     public function news() {
//         $f3->set('content', 'news.htm');
//         echo \Template::instance()->render('../templates/layout.htm');
//     }

//     public function about() {
//         $f3->set('content', 'about.htm');
//         echo \Template::instance()->render('../templates/layout.htm');
//     }

//     public function reception() {
//         $f3->set('content', 'reception.htm');
//         echo \Template::instance()->render('../templates/layout.htm');
//     }
// }


// $f3->route('GET @home: /', 'Page->home');

// $f3->route('GET /news', 'Page->news');

// $f3->route('GET /about', 'Page->about');

// $f3->route('GET /reception', 'Page->reception');