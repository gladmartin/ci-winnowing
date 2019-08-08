<?php

function has_error_form($field, $classErr = 'has-error', $classSuccess = 'has-success') 
{
    if (form_error($field)) {
        return $classErr;
    }
    if (isset($_POST[$field])) {
        if ($_POST[$field] != '') {
            return $classSuccess;
        }
    }
    return '';
}

function alert_flash_data($session, $class = 'callout callout-info' ) {
    if ($session) {
        return "<div class='{$class}'> $session </div>";
    }
}