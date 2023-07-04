<?php
//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('VIEW_ROOT', APP_ROOT . '\views\\');
define('APP_URL', 'http://localhost/mvc-framework');
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '/');

//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc-framework');

// EMAIL Params
define('MAIL_USERNAME', 'email@email.com');
define('MAIL_PASSWORD', '12345');
define('MAIL_SMTPSECURE', 'tls');
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);