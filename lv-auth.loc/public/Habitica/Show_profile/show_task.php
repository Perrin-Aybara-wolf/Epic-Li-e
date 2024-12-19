<?php
session_start();

require_once '/Habitica/scripts/connect_db.php';

$con = connection("User_" . auth()->user()->id);
$query = "SELECT `Taskes`.* FROM `Statistic`, `Taskes` WHERE `Taskes`.`id` = `Statistic`.`Taskes_id` AND DATEDIFF(`Datetime_start`, '{$_REQUEST['date']}') % `Rep_val` = 0";
$result = mysqli_query($con, $query);
echo mysqli_error($con);
mysqli_close($con);

$cards;

for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
    $cards[$i] = $row;
}

echo json_encode($cards);

