<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Password;
use Str;
use DB;

class UserController extends Controller
{
  public function index()
  {
    return 'wow! La Класс';
  }
  public function forgotPasswordStore(Request $request)
  {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]);
  }
  public function resetPasswordUpdate(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'token' => 'required',
      'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
      $request->only('email', 'password', 'password_confirmation', 'token'),
      function (User $user, string $password) {
        $user->forceFill([
          'password' => $password,
        ])->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
      }
    );

    return $status === Password::PASSWORD_RESET ? redirect()->route('login') : back()->withErrors(['email' => __($status)]);
  }
  public function create()
  {
    return view('door.registration');
  }
  public function store(Request $request)
  {
    request()->validate([
      'name' => ['bail', 'required', 'max:255'],
      'email' => ['bail', 'required', 'email', 'max:255', 'unique:users'],
      'password' => ['bail', 'required', 'confirmed'],
    ]);

    $user = User::create($request->all());
    event(new Registered($user));
    Auth::login($user);








    require_once 'Habitica/scripts/connect_db.php';
    $con = connection('Epic_Life');

    $last_id = \DB::table('users')->where('id', Auth::user()->id)->orderBy('id', 'desc')->first()->id;

    // @mysqli_query($con, "CREATE DATABASE `User_{$last_id}`")
    //   or handle_error(
    //     "ошибка при создании бд",
    //     mysqli_error($con)
    //   );

    // mysqli_close($con);

    //     $con = connection("User_{$last_id}");

    //     @mysqli_query($con, "CREATE TABLE `Data` (
//         Name varchar(30) not null DEFAULT 'hero',
//         Email varchar(30) not null UNIQUE CHECK (Email != ''),
//         Age INT DEFAULT 18,
//         Foto MEDIUMBLOB,
//         First_come_in date not null,
//         Last_come_in date not null,
//         Group_progress_id int,
//         Days_with_us int not null,
//         Serias_days int not null,
//         Hp int not null,
//         Fight_Soul int not null,
//         Head_id int,
//         Eyes_id int,
//         Sex_id int,
//         Hair_id int,
//         Body_id int,
//         Left_arm_id int,
//         Right_arm_id int,
//         Foot_id int,
//         Shoes_id int,
//         Skin_id int,
//         GM int DEFAULT 0,
//         DM int DEFAULT 0
//         )")
//       or handle_error(
//         "ошибка при создании таблицы с данными пользователя",
//         mysqli_error($con)
//       );

    //     @mysqli_query($con, "CREATE TABLE `Inventory`(thing_id int NOT NULL)")
//       or handle_error(
//         "ошибка при создании таблицы с инвентарём",
//         mysqli_error($con)
//       );

    //     @mysqli_query($con, "CREATE TABLE `Taskes`(
//         id int NOT NULL AUTO_INCREMENT,
//         PRIMARY KEY (id),
//         sub_id int DEFAULT NULL,
//         Column_num int NOT NULL,
//         Name varchar(30) not null DEFAULT 'Безымянная',
//         Description varchar(100) DEFAULT 'Без описания',
//         Seria_now int DEFAULT 0,
//         Max_seria int DEFAULT 0,
//         Datetime_start datetime DEFAULT NULL,
//         Datetime_finish datetime DEFAULT NULL,
//         Сomplexity int not null DEFAULT 0,
//         Rep_days_week SET( '1', '2', '3', '4', '5', '6', '7' ) DEFAULT NULL,
//         Rep_val int DEFAULT NULL,
//         Val_to_rep varchar(10) DEFAULT NULL
// )")
//       or handle_error(
//         "error create TABLE Taskes",
//         mysqli_error($con)
//       );


    //     @mysqli_query($con, "CREATE TABLE `Statistic`(
//         id int NOT NULL AUTO_INCREMENT,
//         PRIMARY KEY (id),
//         Taskes_id int NOT NULL,
//         Status TINYINT(1),
//         Date_set DATE,
//         Time_start Time DEFAULT NULL,
//         Time_finish Time DEFAULT NULL,
//         Datetime_completed DATETIME
// )")
//       or handle_error(
//         "ошибка при создании таблицы статистики",
//         mysqli_error($con)
//       );

    //     // Чтобы при перетаскивании дела вверх/вниз оно помнило свою позицию в списке, нужно менять их id местами, и тогда бд будет возвращать их в порядке возрастания.

    //     // header("Location: ../Show_profile/index.php?user_id={$last_id}");

    //     mysqli_close($con);

    //     auth()->user()->id = $last_id;


    return redirect()->route('verification.notice');
    // dd($request->all());
  }
  public function login()
  {

    // $con = @mysqli_connect(
    //   'mysql-8.2',
    //   'root',
    //   '',
    //   'Epic_Life'
    // );

    // $query = "CALL upd_rep_period();";
    // @mysqli_query($con, $query);

    // $query = "CALL upd_rep_week();";
    // @mysqli_query($con, $query);


    return view('door.login');
  }
  public function isnt()
  {
    return view('main.isnt');
  }
  public function rozpisanie()
  {
    $tasks = Task::all();
    $categories = Category::all();
    $link = 'rozpisanie';
    return view('main.rozpisanie', compact(['tasks', 'categories', 'link']));
  }
  public function team()
  {
    $link = 'team';
    return view('main.team', compact('link'));
  }
  public function options()
  {
    return view('main.options');
  }
  public function chat()
  {
    $link = 'chat';
    // return view('chat.index', compact('link'));
    // dd(view('chat.index'));
    return view('main.chat', compact('link'));
  }
  public function quest()
  {
    return view('main.isnt');
  }
  public function statistic()
  {
    $link = 'statistic';
    return view('main.statistic', compact('link'));
  }
  public function premium()
  {
    return view('main.premium');
  }

  public function loginAuth(Request $request)
  {
    // dd($request->input('name'));
    // dump($request->boolean('remember'));
    // if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
    $credentials = request()->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);
    // } else {
    //   $credentials = request()->validate([
    //     'name' => ['required'],
    //     'password' => ['required']
    //   ]);
    // }
    if (Auth::attempt($credentials, $request->boolean('remember'))) {
      $request->session()->regenerate();
      $user = Auth::user();

      $datediff = time() - strtotime($user->last_day);
      $user->Hp = $user->Hp - round($datediff / (60 * 60 * 24)) * 3 > 0 ? $user->Hp - round($datediff / (60 * 60 * 24))*3 : 0;

      

      if ($user->last_day === date('Y-m-d'))
        $user->increment('Serias_days');
      else
        $user->increment('Days_with_us');

      $user->last_day = date('Y-m-d');


      // SELECT Tasks.*, date_set, datetime_completed, time_start, time_finish
      // FROM Tasks
      // INNER JOIN (
      // SELECT task_id, time_start, time_finish, MAX(id) as m, date_set, datetime_completed
      //     FROM Statistic
      //     WHERE date_set = '2024-10-09'
      //   GROUP BY task_id, date_set
      //   ORDER BY id DESC
      // ) st on Tasks.id = task_id
      //    -- WHERE date_set = '2024-10-09'
      // GROUP BY Tasks.id

      $user->save();

      return redirect()->route('main')->with('success', 'Welcome, ' . Auth::user()->name);
    } else {
      return back()->withErrors([
        'email' => 'Неправильный email или пароль',
      ]);
    }
    // dd($request->all()); 
    // return view('door.login');
  }
  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }

  public function add_task()
  {
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
      $week ? $week .= "'" : $week;
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


  }

  public function upLvl()
  {
    User::find(auth()->user()->id)->increment('study');
  }
}
