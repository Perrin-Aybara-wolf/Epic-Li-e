<?php
session_start();
require_once '../scripts/connect_db.php';


$con = connection("User_" . auth()->user()->id);

$query = "DELETE FROM `Taskes` WHERE `id` = {$_REQUEST['id']}";
@mysqli_query($con, $query) or handle_error("что-то не так с запросом удаления оригинала", mysqli_error($con));

$query = "UPDATE `Statistic` SET `Status` = -4 WHERE `Taskes_id` = {$_REQUEST['id']} AND `Date_set` >= CURDATE()";
@mysqli_query($con, $query) or handle_error("что-то не так с запросом удаления копий", mysqli_error($con));


// header("Location:index.php?user_id=".$_REQUEST['user_id']);


// echo 1;
mysqli_close($con);