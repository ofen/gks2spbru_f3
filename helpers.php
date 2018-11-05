<?php

function isActive($route) {
    if (\Base::instance()->get('PATH') == $route) {
        return 'class="active"';
    } else {
        return '';
    }
}

function filter($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function validate($data, $file=null) {

    /*
        firstname
        lastname
        address
        phone
        email
        subject
        body
        attachment
    */

    foreach($data as $key => $value) {
       $data[$key] = filter($value);
    }

    $errors = array();

    $subject_options = [
        'Обращение',
        'Пожелание',
        'Заявление',
        'Благодарность',
        'Претензия',
        'Жалоба',
        'Другое',
    ];

    $file_extensions = [
        'jpg',
        'png',
        'pdf',
    ];

    $max_size = 5242880;

    if (empty($data['firstname'])) {
        $errors['firstname'] = 'Имя обязательно';
    } elseif (!preg_match("/^[а-я ]+$/ui", $data['firstname'])) {
        $errors['firstname'] = 'Некорректное имя';
    }

    if (empty($data['lastname'])) {
        $errors['lastname'] = 'Фамилия обязательна';
    } elseif (!preg_match("/^[а-я ]+$/ui", $data['lastname'])) {
        $errors['lastname'] = 'Некорректная фамилия';
    }

    if (empty($data['address'])) {
        $errors['address'] = 'Адрес обязателен';
    } elseif (!preg_match("/^[а-я \.\,0-9]+$/ui", $data['address'])) {
        $errors['address'] = 'Некорректный адрес';
    }

    if (empty($data['phone'])) {
        $errors['phone'] = 'Телефон обязателен';
    } elseif (!preg_match("/^[0-9\+]+$/", $data['phone'])) {
        $errors['phone'] = 'Некорректный телефон';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'Email обязателен';
    } elseif (!preg_match("/^.+@.+\..+$/i", $data['email'])) {
        $errors['email'] = 'Некорректный email';
    }

    if (empty($data['subject'])) {
        $errors['subject'] = 'Тема обязательна';
    } elseif (in_array($data['subject'], $subject_options) ) {
        $errors['subject'] = 'Некорректная тема';
    }

    if (empty($data['body'])) {
        $errors['body'] = 'Текст сообщения обязателен';
    }

    $tmp_name = $file['attachment']['tmp_name'];
    $file_name = $file['attachment']['name'];
    $file_size = $file['attachment']['size'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    if ($file_size > 0) {

        if (!in_array($ext, $file_extensions)) {
            $errors['attachment'] = $file;
        } elseif ($file_size > $max_size) {
            $errors['attachment'] = 'Файл слишком велик';
        } else {
            move_uploaded_file($tmp_name, "tmp/{$file_name}");
        }
    }
    
    // Return array of errors or OK
    if ($errors) {
        return $errors;
    } else {
        return 'OK';
    }
}

function get_news($chunk_size) {
    $files = glob('../data/news/*.htm', GLOB_NOSORT);
    rsort($files, SORT_NATURAL);

    return array_chunk($files, $chunk_size);
}

function get_press($chunk_size) {
    $files = glob('../data/press/*.htm', GLOB_NOSORT);
    rsort($files, SORT_NATURAL);

    return array_chunk($files, $chunk_size);
}

function get_dir($path) {
    
}

function filesize_formatted($file) {
    if(file_exists($file)) {
        $bytes = filesize($file);

        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' Гб';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' Мб';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' Кб';
        } elseif ($bytes > 1) {
            return $bytes . ' байт';
        } elseif ($bytes == 1) {
            return '1 байт';
        } else {
            return '0 байт';
        }
    } else {
        return 'Нет файла';
    }
}

function translit($textcyr=null, $textlat=null) {
    
    $cyr = [
       'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
       'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
       'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
       'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
    ];

    $lat = [
       'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
       'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',
       'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
       'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
    ];

    if ($textcyr) {
        return str_replace($cyr, $lat, $textcyr);
    } elseif ($textlat) {
        return str_replace($lat, $cyr, $textlat);
    } else {
        return null;
    }
}

class Flash {

    static public function setFlash($type, $message) {
        return \Base::instance()->set('SESSION.flash', ['type' => $type, 'message' => $message]);
    }

    static public function getType() {
        $type = \Base::instance()->get('SESSION.flash')['type'];
        return $type;
    }

    static public function getFlash() {
        $message = \Base::instance()->get('SESSION.flash')['message'];
        \Base::instance()->clear('SESSION.flash');
        return $message;
    }

    static public function hasFlash() {
        if (\Base::instance()->get('SESSION.flash')) {
            return true;
        } else {
            return false;
        }
    }
}

class Validator {

}