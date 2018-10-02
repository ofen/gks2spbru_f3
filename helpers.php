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
    // $errors = [
    //     'firstname' => '',
    //     'lastname' => '',
    //     'address' => '',
    //     'phone' => '',
    //     'email' => '',
    //     'subject' => '',
    //     'body' => '',
    //     'attachment' => '',
    // ];

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