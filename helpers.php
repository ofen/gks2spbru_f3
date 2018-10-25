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
    $data = array();
    $files = glob('../data/news/*.htm');
    krsort($files);

    foreach ($files as $file) {
        $data[] = file_get_contents($file);
    }

    return array_chunk($data, $chunk_size);
}

function get_press($chunk_size) {
    $data = array();
    $files = glob('../data/press/*.htm');
    krsort($files);

    foreach ($files as $file) {
        $data[] = file_get_contents($file);
    }

    return array_chunk($data, $chunk_size);
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