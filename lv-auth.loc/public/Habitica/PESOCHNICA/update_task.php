<?php
// session_start();

// require_once '../scripts/connect_db.php';

// $date1 = new DateTime($_REQUEST['DATE1']);
// $date2 = new DateTime($_REQUEST['DATE2']);
// $interval = date_diff($date1, $date2);

// echo $interval->d;

$date1 = array(
    'year' => substr($_REQUEST['DATE1'], 0, 4),
    'month' => substr($_REQUEST['DATE1'], 5, 2),
    'day' => substr($_REQUEST['DATE1'], 8, 2)
);
$date2 = array(
    'year' => substr($_REQUEST['DATE2'], 0, 4),
    'month' => substr($_REQUEST['DATE2'], 5, 2),
    'day' => substr($_REQUEST['DATE2'], 8, 2)
);

echo (mktime(0, 0, 0, $date2['month'], $date2['day'], $date2['year']) - mktime(0, 0, 0, $date1['month'], $date1['day'], $date1['year']))/86400;
// echo mktime(0, 0, 0, $date2['month'], $date2['day'], $date2['year']) - mktime(0, 0, 0, $date1['month'], $date1['day'], $date1['year']);