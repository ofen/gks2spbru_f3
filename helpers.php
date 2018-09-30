<?php

function isActive($route) {
    if (\Base::instance()->get('PATH') == $route) {
        return 'class="active"';
    } else {
        return '';
    }
}

function validate($data) {
    $firstnameErr = $lastnameErr = $addressErr = $phoneErr = "";
    $emailErr = $subjectErr = $bodyErr = $attachemntErr = "";
    /*
        form_firstname
        form_lastname
        form_address
        form_phone
        form_email
        form_subject
        form_body
        form_attachment
    */

    if (empty($data['form_firstname'])) {
        $firstnameErr = 'Имя обязательно';
    } elseif (!preg_match($firstnameRegexp, $data['form_firstname'])) {
        $firstnameErr = 'Некорректное имя';
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