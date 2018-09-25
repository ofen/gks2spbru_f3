<?php

function isActive($route) {
    if (\Base::instance()->get('PATH') == $route) {
        return 'class="active"';
    } else {
        return '';
    }
}

function flash() {
    $message = \Base::instance()->get('SESSION.message');
    \Base::instance()->clear('SESSION.message');
    return $message;
}