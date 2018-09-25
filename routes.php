<?php

namespace routes;

$f3->route('GET @home: /', function($f3, $params) {
    $f3->set('content', 'index.htm');
    echo \Template::instance()->render('../templates/layout.htm');
});

$f3->route('GET /news', function($f3) {
    $f3->set('content', 'news.htm');
    echo \Template::instance()->render('../templates/layout.htm');
});

$f3->route('GET /about', function($f3) {
    $f3->set('content', 'about.htm');
    echo \Template::instance()->render('../templates/layout.htm');
});

$f3->route('GET /reception', function($f3) {
    $f3->set('content', 'reception.htm');
    echo \Template::instance()->render('../templates/layout.htm');
});

$f3->route('POST /reception', function($f3) {
    $f3->set('SESSION.message', ['success']);
    $f3->reroute('@home');
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