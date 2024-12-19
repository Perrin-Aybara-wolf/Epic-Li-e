<?php
// Константы подключения к базе данных
define('HOST', 'mysql-8.2');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'Epic_Life');
// define('SITE_ROOT', "D:/OpenServer/OpenServer/domains/localhost/Habitica/");

// Установка режима отладки
define("DEBUG_MODE", true);

// define('SITE_ROOT', '/КОРНЕВОЙ КАТАЛОГ ФАЙЛА(ИМЯ ПАПКИ)/');



// Выдача отчетов об ошибках
if (DEBUG_MODE) {
    error_reporting(E_ALL);
} else {
    // Выключение выдачи отчетов об ошибках
    error_reporting(0);
}

function handle_error($user_error_message, $system_error_message)
{
    $url = "Location: ../scripts/show_error.php?error_message={$user_error_message}&system_error_message={$system_error_message}";
    $url=str_replace(PHP_EOL, '', $url);
    header($url);
    exit();
}


function debug_print($message)
{
    if (DEBUG_MODE)
        echo $message;
}


function get_web_path($file_system_path)
{
    return str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_system_path);
}
