<?php

if (WP_MODE === 'prod') {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

require_once get_template_directory() . '/inc/enqueue.php';

