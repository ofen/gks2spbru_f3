<?php

function isActive($route) {
    if (\Base::instance()->get('PATH') == $route) {
        return 'class="active"';
    } else {
        return '';
    }
}

function validate($data) {
    $errors = array();
    // $firstnameErr = $lastnameErr = $addressErr = $phoneErr = "";
    // $emailErr = $subjectErr = $bodyErr = $attachemntErr = "";
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
        $errors['email'] = 'Телефон обязателен';
    } elseif (!preg_match("/^[0-9\+]+$/", $data['email'])) {
        $errors['email'] = 'Некорректный телефон';
    }

    if (empty($data['subject'])) {
        $errors['subject'] = 'Тема обязательна';
    } elseif (!preg_match("/^[0-9\+]+$/", $data['subject'])) {
        $errors['subject'] = 'Некорректная тема';
    }

    if (empty($data['body'])) {
        $errors['body'] = 'Текст сообщения обязателен';
    }

    // Return array of errors or OK
    if ($errors) {
        return $errors;
    } else {
        return 'OK';
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