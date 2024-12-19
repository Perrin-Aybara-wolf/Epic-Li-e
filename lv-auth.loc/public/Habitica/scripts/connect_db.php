<?php
require "app_config.php";

function connection($db_name)
{
    $con = @mysqli_connect(
        HOST,
        USER_NAME,
        PASSWORD,
        $db_name
    )
        or
        handle_error("ошибка подключения к базе {$db_name}", mysqli_connect_error());
    return $con;
}

function query_to_json($db_name, $str_query)
{
    $con = connection($db_name);
    $result = @mysqli_query($con, $str_query) or handle_error("наш программист наложал с sql запросом", mysqli_error($con));
    mysqli_close($con);

    $cards = null;

    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $cards[$i] = $row;
    }

    echo json_encode($cards);
}