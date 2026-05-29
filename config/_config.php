<?php

    session_start();

    define('TEMPLATE_VIEW_PATH', './views/templates/');
    define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');

    //Exemple de configuration
    define('DB_HOST', 'your_host');
    define('DB_NAME', 'your_database');
    define('DB_USER', 'your_user');
    define('DB_PASS', 'your_password');