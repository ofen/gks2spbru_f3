<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data =htmlspecialchars($data);
    return $data;
}

$f3->route('GET /', function($f3) {
    $f3->set('content', 'index.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /news', function($f3) {
    $f3->set('content', 'news.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /about', function($f3) {
    $f3->set('content', 'about.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /pricing', function($f3) {
    $f3->set('content', 'pricing.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /reception', function($f3) {
    // if (Flash::hasFlash()) {
    //     $f3->set('content', Flash::getFlash());
    //     echo \Template::instance()->render('notification.htm');
    // } else {
    //     $f3->set('content', 'reception.htm');
    //     echo \Template::instance()->render('layout.htm');
    // }
    $f3->set('content', 'reception.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('POST /reception', function($f3) {
    echo json_encode(['result' => validate($_POST)]);
    // Flash::setFlash('success', 'Сообщение успешно отправлено!');
    // $f3->reroute('/');
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