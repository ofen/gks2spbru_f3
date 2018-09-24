<?php

function isActive($route) {
    if ($PATH == $route) {
        return 'active';
    } else {
        return '';
    }
}