<?php 

require '../vendor/autoload.php';

$f3 = \Base::instance();

$f3->set('navbar', [
    'Главная' => '/',
    'Новости' => '/news',
    'О компании' => [
        'Общая информация' => '/about',
        'Структура организации' => '#',
        'Часы приема' => '#',
        'Режим работы' => '#',
        'Вакансии' => '#',
        'Информация о МКД' => '#',
        'Проект договора управления' => '#',
        'Раскрытие информации' => '#',
        'Административная ответственность' => '#',
        'Пресса о нас' => '#',
        'Полезная информация' => '#',
        'Контакты' => '#',
        'Контакты' => '#',
    ],
    'Услуги' => [
        'Платные услуги' => '#',
        'Тарифы' => '#',
        'Качество услуг' => '#',
        'Энергоэффективность' => '#',
        'Меры по снижению расходов' => '#',
    ],
    'Планы и отчеты' => [
        'Годовая бухгалтерская отчетность' => '#',
        'Сведения о доходах и расходах' => '#',
        'Текущий ремонт' => '#',
        'Фактическая среднемесячная температура' => '#',
        'Фотоотчёт по текущему и капитальному ремонту' => '#',
        'Закупки' => '#',
        'Акты сверки РСО' => '#',
        'Разное' => '#',
    ],
    'Интернет приемная' => '/reception',
]);

$f3->set('UI', '../templates/');

require '../routes.php';

// $f3->route('GET @home: /', function($f3) {
//     $f3->set('content', 'index.htm');
//     echo \Template::instance()->render('../templates/layout.htm');
// });

// $f3->route('GET /news', function($f3) {
//     $f3->set('content', 'news.htm');
//     echo \Template::instance()->render('../templates/layout.htm');
// });

// $f3->route('GET /about', function($f3) {
//     $f3->set('content', 'about.htm');
//     echo \Template::instance()->render('../templates/layout.htm');
// });

// $f3->route('GET /reception', function($f3) {
//     $f3->set('content', 'reception.htm');
//     echo \Template::instance()->render('../templates/layout.htm');
// });

$f3->run();