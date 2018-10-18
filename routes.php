<?php
// Column
$f3->route('GET /', function($f3) {
    $f3->set('content', 'index.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /news', function($f3) {
    $articles = $f3->get('DB')->exec('SELECT * FROM articles');
    rsort($articles);
    $f3->set('content', 'news.htm');
    $f3->set('articles', $articles);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /about', function($f3) {
    $f3->set('content', 'about.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /organization_structure', function($f3) {
    $f3->set('content', 'organization_structure.htm');
    $f3->set('data', require_once '../employees.php');
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
    $f3->set('data', require_once '../house_list.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /thanks', function($f3) {
    $f3->set('content', 'thanks.htm');
    echo \Template::instance()->render('layout.htm');
});


$f3->route('GET /contacts', function($f3) {
    $f3->set('content', 'contacts.htm');
    echo \Template::instance()->render('layout.htm');
});

// Column
$f3->route('GET /pricing', function($f3) {
    $f3->set('content', 'pricing.htm');
    $f3->set('files', [
        [
            'filename' => 'Тарифы на 2018 год',
            'link' => 'doc/tarifi_01072018.pdf'
        ],
        [
            'filename' => 'Тарифы на 2017 год',
            'link' => 'doc/tarifi_01072017.pdf'
        ],
        [
            'filename' => 'Тарифы на 2016 год',
            'link' => 'doc/tarifi_01072016.pdf'
        ],
    ]);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /financial_report', function($f3) {
    $f3->set('content', 'financial_report.htm');
    $f3->set('files', [
        [
            'filename' => 'Бухгалтерский баланс на 2018 год',
            'link' => 'doc/financial_report_2018.pdf'
        ],
        [
            'filename' => 'Бухгалтерский баланс на 2017 год',
            'link' => 'doc/financial_report_2017.pdf'
        ],
        [
            'filename' => 'Бухгалтерский баланс на 2016 год',
            'link' => 'doc/financial_report_2016.pdf'
        ],
        [
            'filename' => 'Бухгалтерский баланс на 2015 год',
            'link' => 'doc/financial_report_2015.pdf'
        ],
        [
            'filename' => 'Бухгалтерский баланс на 2014 год',
            'link' => 'doc/financial_report_2014.pdf'
        ],
        [
            'filename' => 'Бухгалтерский баланс на 2013 год',
            'link' => 'doc/financial_report_2013.pdf'
        ],
        [
            'filename' => 'Бухгалтерский баланс на 2012 год',
            'link' => 'doc/financial_report_2012.pdf'
        ],
    ]);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_report', function($f3) {
    $f3->set('content', 'house_report.htm');
    $f3->set('files', [
        [
            'filename' => 'Отчет текущего ремонта на 2018 год',
            'link' => 'doc/otchet_tekushego_remonta_2018.pdf'
        ],
        [
            'filename' => 'Отчет текущего ремонта на 2017 год',
            'link' => 'doc/otchet_tekushego_remonta_2017.pdf'
        ],
        [
            'filename' => 'Отчет текущего ремонта на 2016 год',
            'link' => 'doc/otchet_tekushego_remonta_2016.pdf'
        ],
        [
            'filename' => 'Отчет текущего ремонта на 2015 год',
            'link' => 'doc/otchet_tekushego_remonta_2015.pdf'
        ],
        [
            'filename' => 'Отчет текущего ремонта на 2014 год',
            'link' => 'doc/otchet_tekushego_remonta_2014.pdf'
        ],
        [
            'filename' => 'Отчет текущего ремонта на 2013 год',
            'link' => 'doc/otchet_tekushego_remonta_2013.pdf'
        ],
        [
            'filename' => 'Отчет текущего ремонта на 2012 год',
            'link' => 'doc/otchet_tekushego_remonta_2012.pdf'
        ],
        [
            'filename' => 'План текущего ремонта на 2018 год',
            'link' => 'doc/plan_tekushego_remonta_2018.pdf'
        ],

        [
            'filename' => 'План текущего ремонта на 2017 год',
            'link' => 'doc/plan_tekushego_remonta_2017.pdf'
        ],

        [
            'filename' => 'План текущего ремонта на 2016 год',
            'link' => 'doc/plan_tekushego_remonta_2016.pdf'
        ],

        [
            'filename' => 'План текущего ремонта на 2015 год',
            'link' => 'doc/plan_tekushego_remonta_2015.pdf'
        ],

        [
            'filename' => 'План текущего ремонта на 2014 год',
            'link' => 'doc/plan_tekushego_remonta_2014.pdf'
        ],

        [
            'filename' => 'План текущего ремонта на 2013 год',
            'link' => 'doc/plan_tekushego_remonta_2013.pdf'
        ],

        [
            'filename' => 'План текущего ремонта на 2012 год',
            'link' => 'doc/plan_tekushego_remonta_2012.pdf'
        ],

    ]);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /average_monthly_temperature', function($f3) {
    $f3->set('content', 'average_monthly_temperature.htm');
    $f3->set('data', [
        '2017-2018' => [
            'Октябрь' => '+5.6',
            'Ноябрь' => '+2.3',
            'Декабрь' => '+0.4',
            'Январь' => '-2.9',
            'Февраль' => '-7.7',
            'Март' => '-4.4',
            'Апрель' => '-',
            'Средняя температура' => '-'
        ],
        '2016-2017' => [
            'Октябрь' => '+5.0',
            'Ноябрь' => '-1.8',
            'Декабрь' => '-1.2',
            'Январь' => '-3.9',
            'Февраль' => '-3.5',
            'Март' => '+1.3',
            'Апрель' => '+2.8',
            'Средняя температура' => '-0.1'
        ],
        '2015-2016' => [
            'Октябрь' => '+5.6',
            'Ноябрь' => '+3.1',
            'Декабрь' => '+2.1',
            'Январь' => '-11.2',
            'Февраль' => '+0.0',
            'Март' => '+1.0',
            'Апрель' => '+6.3',
            'Средняя температура' => '+0.9'
        ],
        '2014-2015' => [
            'Октябрь' => '+5.2',
            'Ноябрь' => '+0.8',
            'Декабрь' => '-1.0',
            'Январь' => '-2.7',
            'Февраль' => '-0.6',
            'Март' => '+2.6',
            'Апрель' => '+5.1',
            'Средняя температура' => '+1.4'
        ],
        '2013-2014' => [
            'Октябрь' => '+7.3',
            'Ноябрь' => '+4.4',
            'Декабрь' => '+0.9',
            'Январь' => '-7.0',
            'Февраль' => '+0.0',
            'Март' => '+2.2',
            'Апрель' => '+6.5',
            'Средняя температура' => '+2.0'
        ],
        '2012-2013' => [
            'Октябрь' => '+6.6',
            'Ноябрь' => '+2.9',
            'Декабрь' => '-8.0',
            'Январь' => '-6.1',
            'Февраль' => '-2.6',
            'Март' => '-6.6',
            'Апрель' => '+4.2',
            'Средняя температура' => '-1.4'
        ],
        '2011-2012' => [
            'Октябрь' => '+7.6',
            'Ноябрь' => '+3.6',
            'Декабрь' => '+1.9',
            'Январь' => '-4.9',
            'Февраль' => '-10.4',
            'Март' => '-1.0',
            'Апрель' => '+4.9',
            'Средняя температура' => '+0.3'
        ],
        '2010-2011' => [
            'Октябрь' => '+5.6',
            'Ноябрь' => '+0.3',
            'Декабрь' => '-8.3',
            'Январь' => '-5.8',
            'Февраль' => '-11.0',
            'Март' => '-1.9',
            'Апрель' => '+5.7',
            'Средняя температура' => '-2.2'
        ],
    ]);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /purchases', function($f3) {
    $f3->set('content', 'purchases.htm');
    echo \Template::instance()->render('layout.htm');
});

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