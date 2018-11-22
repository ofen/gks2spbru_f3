<?php

// Column
$f3->route('GET /', function($f3) {
    $f3->set('content', 'home.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /news', function($f3) {
    $files = glob('../data/news/*.htm', GLOB_NOSORT);
    rsort($files, SORT_NATURAL);
    $files = array_chunk($files, 3);

    $current_page = 0;
    $data = array();

    if(isset($_GET['page'])) {
        $current_page = $_GET['page'];

        foreach($files[$current_page] as $file) {
            $data[] = file_get_contents($file);
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['result' => $data, 'lenght' => count($files)]);
    } else {

        foreach($files[$current_page] as $file) {
            $data[] = file_get_contents($file);
        }

        $f3->set('data', $data);
        $f3->set('content', 'news.htm');
        echo \Template::instance()->render('layout.htm');
    }
});

$f3->route('GET /about', function($f3) {
    $f3->set('content', 'about.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /organization_structure', function($f3) {
    $f3->set('content', 'organization_structure.htm');
    $f3->set('data', require_once '../data/organization_structure.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /working_hours', function($f3) {
    $f3->set('content', 'working_hours.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /job', function($f3) {
    $f3->set('content', 'job.htm');
    $f3->set('data', require_once '../data/job.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /houses_in_service', function($f3) {
    $f3->set('content', 'houses_in_service.htm');
    $f3->set('data', require_once '../data/houses_in_service.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_service_contract', function($f3) {
    $file = './doc/Договор_управления_МКД.pdf';

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="Договор_управления_МКД.pdf"');
    header('Content-Length: ' . filesize($file));

    echo readfile($file);
});

$f3->route('GET /law', function($f3) {
    $path = './doc/law/';

    $data = array();
    $dirs = array_diff(scandir($path), array('.', '..'));
    foreach ($dirs as $dir) {
        if(is_dir($path . $dir)) {
            $files = glob($path . $dir . '/*.pdf', GLOB_NOSORT);
            asort($files, SORT_NATURAL);
            $data[$dir] = $files;
        }
    }

    krsort($data);

    $f3->set('data', $data);
    $f3->set('content', 'law.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /thank_you_letter', function($f3) {
    $path = 'doc/thank_you_letter';
    $data = array();
    $years = range(2012, 2018);

    for($years as $year) {
        $data = glob("${path}/*_${year}.jpg", GLOB_NOSORT);
    }

    
    asort($data, SORT_NATURAL);

    $f3->set('data', array_chunk($data, 3));
    $f3->set('content', 'thank_you_letter.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /get_thumb', function($f3) {
    $filename = $_GET['image'];
    if(!$filename) {
        $f3->error(404);
    }

    $image = realpath("doc/thank_you_letter/${filename}");

    $dst_width = 300;
    $dst_height = 300;

    list($width, $height) = getimagesize($image);

    $ratio_orig = $width/$height;

    if ($dst_width/$dst_height > $ratio_orig) {
       $dst_width = $dst_height*$ratio_orig;
    } else {
       $dst_height = $dst_width/$ratio_orig;
    }

    $dst = imagecreatetruecolor($dst_width, $dst_height);
    $src = imagecreatefromjpeg($image);
    
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $dst_width, $dst_height, $width, $height);

    echo imagejpeg($dst, null, 100);
});

$f3->route('GET /press', function($f3) {
    $files = glob('../data/press/*.htm', GLOB_NOSORT);
    rsort($files, SORT_NATURAL);
    $files = array_chunk($files, 3);

    $current_page = 0;
    $data = array();

    if($_GET['page']) {
        $current_page = $_GET['page'];
        foreach($files[$current_page] as $file) {
            $data[] = file_get_contents($file);
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['result' => $data, 'lenght' => count($files)]);
    } else {
        foreach($files[$current_page] as $file) {
            $data[] = file_get_contents($file);
        }

        $f3->set('data', $data);
        $f3->set('content', 'press.htm');
        echo \Template::instance()->render('layout.htm');
    }
});

$f3->route('GET /useful_info', function($f3) {
    $f3->set('content', 'useful_info.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /contacts_and_working_hours', function($f3) {
    $f3->set('content', 'contacts_and_working_hours.htm');
    $f3->set('data', require_once '../data/contacts_and_working_hours.php');
    echo \Template::instance()->render('layout.htm');
});

// Column

$f3->route('GET /paid_services', function($f3) {
    $file = './doc/Платные_услуги_2014.pdf';

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="Платные_услуги.pdf"');
    header('Content-Length: ' . filesize($file));

    echo readfile($file);
});

$f3->route('GET /utility_rate', function($f3) {
    $f3->set('content', 'utility_rate.htm');
    $f3->set('data', require_once '../data/utility_rate.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /cost_reduction', function($f3) {
    $f3->set('content', 'cost_reduction.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /financial_report', function($f3) {
    $f3->set('content', 'financial_report.htm');
    $data = require_once '../data/financial_report.php';
    krsort($data);
    $f3->set('data', $data);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_report', function($f3) {
    $f3->reroute('https://www.reformagkh.ru/mymanager/profile/6743234/');
});

$f3->route('GET /house_information', function($f3) {
    $f3->reroute('https://gorod.gov.spb.ru/facilities/search/');
});

$f3->route('GET /house_meter_reading', function($f3) {
    $f3->set('content', 'house_meter_reading.htm');
    $data = require_once '../data/house_meter_reading.php';
    krsort($data);
    $f3->set('data', $data);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /house_meter_reading/@report_type', function($f3) {

    $allowed_types = ['cold_water', 'hot_water', 'electric_energy', 'heat_energy'];
    $report_type = $f3->get('PARAMS.report_type');

    if(in_array($report_type, $allowed_types)) {
        if($date = $_GET['date']) {

            $file = "../data/house_meter_reading/{$report_type}_{$date}.csv";

            if(file_exists($file)) {
                $handle = fopen($file, 'r');
                $data = array();
                while ($line = fgetcsv($handle)) {
                    $data[] = $line;
                }
                fclose($handle);
            } else {
                $f3->error(404);
            }
            
        } else {
            $f3->error(404);
        }

        $f3->set('content', 'house_meter_reading.htm');
        $f3->set('data', $data);
        echo \Template::instance()->render('layout.htm');
    } else {
        $f3->error(404);
    }

});

$f3->route('GET /house_service_report', function($f3) {
    $f3->set('content', 'house_service_report.htm');
    $data = require_once '../data/house_service_report.php';
    krsort($data);
    $f3->set('data', $data);
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /energy_efficiency', function($f3) {
    $f3->set('content', 'energy_efficiency.htm');
    $f3->set('files', require_once '../data/energy_efficiency.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /average_monthly_temperature', function($f3) {
    $f3->set('content', 'average_monthly_temperature.htm');
    $f3->set('data', require_once '../data/average_monthly_temperature.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /weekly_report', function($f3) {
    $data = require_once '../data/weekly_report.php';

    $periods = array_keys($data);
    $f3->set('content', 'weekly_report.htm');
    $f3->set('data', array_reverse($periods));
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /weekly_report/service_report', function($f3) {
    $data = require_once '../data/weekly_report.php';
    $date = $_GET['date'];

    if($date && array_key_exists($date, $data)) {
        $f3->set('content', 'weekly_report.htm');
        $f3->set('data', array_chunk($data[$date], 3));
        echo \Template::instance()->render('layout.htm');
    } else {
        $f3->error(404);
    }
});

$f3->route('GET /purchases', function($f3) {
    $f3->set('content', 'purchases.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /gas_equipment_service', function($f3) {
    $f3->set('content', 'gas_equipment_service.htm');
    $f3->set('data', require_once '../data/gas_equipment_service.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /reception', function($f3) {
    $f3->set('content', 'reception.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('POST /reception', function($f3) {
    header('Content-Type: application/json; charset=utf-8');
    $errors = validate($_POST, $_FILES);
    if($errors) {
        echo json_encode(['result' => $errors]);
    } else {
        $host = 'smtp.yandex.ru';
        $port = 465;
        $user = 'mailer@yandex.ru';
        $password = 'password';

        $smtp = new SMTP($host, $port, 'ssl', $user, $password);

        $smtp->set('From', '"gks2spb.ru mailer" <mailer@yandex.ru>');
        $smtp->set('To', '<admin@gmail.com>');
        $smtp->set('Subject', 'Интернет приемная - ' . $_POST['subject']);
        $smtp->set('Content-Type', 'text/html; charset=UTF-8');

        if($_FILES['attachment']['tmp_name']) {
            $tmp_name = $_FILES['attachment']['tmp_name'];
            $filename = $_FILES['attachment']['name'];
            move_uploaded_file($tmp_name, "./tmp/{$filename}");
            $smtp->attach("./tmp/{$filename}");
        }

        $message = "IP: {$_SERVER['REMOTE_ADDR']}<br>ФИО: {$_POST['fullname']}<br>Адрес: {$_POST['address']}<br>Телефон: {$_POST['phone']}<br>Email: {$_POST['email']}<br>Тема обращения: {$_POST['subject']}<br>Текст обращения:<br>{$_POST['body']}";

        if(!$smtp->send($message)) {
            echo json_encode(['result' => 'Ошибка отправки сообщени']);
        } else {
            echo json_encode(['result' => 'OK']);
        }
    }  
});