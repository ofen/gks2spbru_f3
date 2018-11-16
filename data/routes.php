<?php

// Column
$f3->route('GET /', function($f3) {
    $f3->set('content', 'index.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /news', function($f3) {
    $files = glob('../data/news/*.htm', GLOB_NOSORT);
    rsort($files, SORT_NATURAL);
    $files = array_chunk($files, 5);

    $current_page = 0;
    $data = array();

    if ($_GET['page']) {
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
    foreach($dirs as $dir) {
        if(is_dir($path . $dir)) {
            $files = glob($path . $dir . '/*.pdf', GLOB_NOSORT);
            asort($files, SORT_NATURAL);
            $data[$dir] = $files;
        }
    }
    krsort($data);
    // header('Content-Type: application/json; charset=utf-8');
    // echo json_encode($data);
    $f3->set('data', $data);
    $f3->set('content', 'law.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /thank_you_letter', function($f3) {
    $f3->set('content', 'thank_you_letter.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /press', function($f3) {
    $files = glob('../data/press/*.htm', GLOB_NOSORT);
    rsort($files, SORT_NATURAL);
    $files = array_chunk($files, 5);

    $current_page = 0;
    $data = array();

    if ($_GET['page']) {
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

$f3->route('GET /house_meter_reading/cold_water', function($f3) {
    if ($date = $_GET['date']) {

        $file = "../data/house_meter_reading/cold_water_{$date}.csv";

        if (file_exists($file)) {
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
});

$f3->route('GET /house_meter_reading/hot_water', function($f3) {
    if ($date = $_GET['date']) {

        $file = "../data/house_meter_reading/hot_water_{$date}.csv";

        if (file_exists($file)) {
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
});

$f3->route('GET /house_meter_reading/electric_energy', function($f3) {
    if ($date = $_GET['date']) {

        $file = "../data/house_meter_reading/electric_energy_{$date}.csv";

        if (file_exists($file)) {
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
});

$f3->route('GET /house_meter_reading/heat_energy', function($f3) {
    if ($date = $_GET['date']) {

        $file = "../data/house_meter_reading/heat_energy_{$date}.csv";

        if (file_exists($file)) {
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

    if ($date = $_GET['date']) {
        if (array_key_exists($date, $data)) {
            $f3->set('content', 'weekly_report.htm');
            $f3->set('data', array_chunk($data[$date], 3));
            echo \Template::instance()->render('layout.htm');
        } else {
            $f3->error(404);
        }
    } else {
        $f3->error(404);
    }
});

$f3->route('GET /purchases', function($f3) {
    $f3->set('content', 'purchases.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /gas_equipment_service_schedule', function($f3) {
    $f3->set('content', 'gas_equipment_service_schedule.htm');
    $f3->set('data', require_once '../data/gas_equipment_service_schedule.php');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('GET /reception', function($f3) {
    $f3->set('content', 'reception.htm');
    echo \Template::instance()->render('layout.htm');
});

$f3->route('POST /reception', function($f3) {
    header('Content-Type: application/json; charset=utf-8');
    $errors = validate($_POST, $_FILES);
    if ($errors) {
        echo json_encode(['result' => $errors]);
    } else {
        $mail = new \PHPMailer\PHPMailer\PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'username';
        $mail->Password = 'password';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('username@yandex.ru', 'gks2spb.ru mailer');
        $mail->addAddress('admin@gmail.com');

        $mail->WordWrap = 50;
        $mail->CharSet = 'utf-8';

        if($_FILES) {
            $tmp_name = $_FILES['attachment']['tmp_name'];
            $filename = $_FILES['attachment']['name'];
            move_uploaded_file($tmp_name, "tmp/{$filename}");
            $mail->addAttachment("tmp/{$filename}");
        }

        $message = "
            IP: {$_SERVER['REMOTE_ADDR']}\n
            Имя: {$_POST['firstname']}\n
            Фамилия: {$_POST['lastname']}\n
            Адрес: {$_POST['address']}\n
            Телефон: {$_POST['phone']}\n
            Email: {$_POST['email']}\n
            Тема обращения: {$_POST['subject']}\n
            Текст обращения:\n
            {$_POST['body']}
        ";
        
        $mail->Subject = 'Интернет приемная';
        $mail->Body = $message;

        if(!$mail->send()) {
            echo json_encode(['result' => 'Ошибка отправки сообщени']);
        } else {
            echo json_encode(['result' => 'OK']);
        }
    }  
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