<?php
require_once '../scripts/connect_db.php';

// echo '<meta charset="UTF-8">';

foreach ($_REQUEST as $key => $v) {
  if ($v === '')
    unset($_REQUEST[$key]);
}

// dd(123);
$ds = isset($_REQUEST['datestart']) ? $_REQUEST['datestart'] : date('Y-m-d');
$df = isset($_REQUEST['datefinish']) ? $_REQUEST['datefinish'] : date('Y-m-d');

function get_datatime($date, $time, $k = 0, $marker = false)
{
  //Автоматически устанавливает datetime с разницей в 30 минут (не обязательно) и маркером для учитывания
  //времени этой даты при расчётах (не обязательно. если 00 секунд - время учитывается. если 01 - нет)
  settype($marker, 'bool');
  $k = $k === 0 ? 0 : ($k > 0 ? 1 : -1);
  $year = substr($date, 0, 4);
  $month = substr($date, 5, 2);
  $day = substr($date, 8, 2);
  $minut = substr($time, 3, 2);
  $hour = substr($time, 0, 2);
  $dt = date('Y-m-d H:i:s', mktime($hour, $minut + (30 * $k), $marker ? 0 : 1, $month, $day, $year));
  return $dt;
}

if (isset($_REQUEST['timestart'])) {
  $ds = get_datatime($ds, $_REQUEST['timestart'], 0, true);
  if (isset($_REQUEST['timefinish']))
    $df = get_datatime($df, $_REQUEST['timefinish'], 0, true);
  else
    $df = get_datatime($ds, $_REQUEST['timestart'], 1, true);
} else {
  if (isset($_REQUEST['timefinish'])) {
    $df = get_datatime($df, $_REQUEST['timefinish'], 0, true);
    $ds = get_datatime($df, $_REQUEST['timefinish'], -1, true);
  } else {
    $ds = get_datatime($ds, date('H:i'), 0, false);
    $df = get_datatime($df, date('H:i'), 1, false);
  }
}

$week = null;
if (isset($_REQUEST['week_days'])) {
  $zap = "'";
  foreach ($_REQUEST['week_days'] as $key => $val) {
    $week .= ($zap . $key);
    $zap = ',';
  }
  $week ? $week.="'" : $week;
}
$repeat = null;
$val_to_rep = null;
if (isset($_REQUEST['repeat'])) {
  foreach ($_REQUEST['repeat'] as $key => $val) {
    $val_to_rep = $key;
    $repeat = $val;
  }
}
// echo "Количество: " . $repeat . " множитель: " . $val_to_rep;

$data = array(
  'sub_id' => key_exists('sub_id', $_REQUEST) ? $_REQUEST['sub_id'] : "NULL",
  'name' => key_exists('name', $_REQUEST) ? $_REQUEST['name'] : 'Безымянная',
  'column' => $_REQUEST['column'],
  'description' => key_exists('description', $_REQUEST) ? $_REQUEST['description'] : 'Без описания',
  'complexity' => key_exists('complexity', $_REQUEST) ? $_REQUEST['complexity'] : 0,
  'dt_start' => $ds,
  'dt_finish' => $df,
  'week_days' => $week ? $week : 'NULL',
  'repeat' => $repeat ? $repeat : 'NULL',
  'val_to_rep' => $val_to_rep ? $val_to_rep : 'NULL'
);


$con = connection("User_" . auth()->user()->id);

$query = "INSERT INTO `Taskes`(`sub_id`, `Column_num`, `Name`,
 `Description`, `Сomplexity`, `Datetime_start`,
  `Datetime_finish`, `Rep_days_week`, `Rep_val`, `Val_to_rep`)
VALUE (
 {$data['sub_id']}, {$data['column']}, '{$data['name']}',
 '{$data['description']}', {$data['complexity']}, '{$data['dt_start']}',
 '{$data['dt_finish']}', {$data['week_days']}, {$data['repeat']}, '{$data['val_to_rep']}'
 )";

@mysqli_query($con, $query) or handle_error("njnj", mysqli_error($con));
$task_id = mysqli_insert_id($con);





$query = "INSERT INTO `Statistic`(`Taskes_id`, `Status`, `Date_set`,`Time_start`,`Time_finish`)
VALUE ($task_id, 0, CURDATE(), DATE_FORMAT('{$data['dt_start']}', '%H:%i:%s'), DATE_FORMAT('{$data['dt_finish']}', '%H:%i:%s'))";

@mysqli_query($con, $query) or handle_error("njnj", mysqli_error($con));


// header("Location:index.php?user_id=".$_REQUEST['user_id']);

// echo $task_id;

// echo 1;
mysqli_close($con);

echo $data['week_days'];


// echo $minuts < 30 ? $hours . ':' . ($minuts + 30) : (($minuts -= 30) < 10 ? ++$hours . ':0' . $minuts : ++$hours . ':' . $minuts);

