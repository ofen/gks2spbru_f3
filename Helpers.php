<?php

function isActive($current_route, $target_route) {
    if ($current_route == $target_route) {
        return 'class="active"';
    } else {
        return '';
    }
}