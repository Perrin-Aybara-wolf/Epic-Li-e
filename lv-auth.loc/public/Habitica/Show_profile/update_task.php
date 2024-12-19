<?php
session_start();

require_once '../scripts/connect_db.php';

$con = connection("User_" . auth()->user()->id);
$query = "UPDATE `Taskes` SET
`Name`='{$_REQUEST['name']}',
`Description`='{$_REQUEST['description']}'
WHERE `id` = {$_REQUEST['id']}";
@mysqli_query($con, $query) or handle_error("Что-то не так с запросом обновления задачи", mysqli_error($con));
mysqli_close($con);

echo $_REQUEST['id'];