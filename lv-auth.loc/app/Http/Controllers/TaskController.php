<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

  // function upDataTask(Task $task, Request $request)
  // {
  //   $request['datestart'] = $request['datestart'] ? $request['datestart'] : date('Y-m-d');
  //   $request['datefinish'] = $request['datefinish'] ? $request['datefinish'] : date('Y-m-d');

  //   if ($request['timestart']) {
  //     $request['datestart'] = TaskController::get_datatime($request['datestart'], $request['timestart'], 0, true);
  //     if ($request['timefinish'])
  //       $request['datefinish'] = TaskController::get_datatime($request['datefinish'], $request['timefinish'], 0, true);
  //     else
  //       $request['datefinish'] = TaskController::get_datatime($request['datestart'], $request['timestart'], 1, true);
  //   } else {
  //     if ($request['timefinish']) {
  //       $request['datefinish'] = TaskController::get_datatime($request['datefinish'], $request['timefinish'], 0, true);
  //       $request['datestart'] = TaskController::get_datatime($request['datefinish'], $request['timefinish'], -1, true);
  //     } else {
  //       $request['datestart'] = TaskController::get_datatime($request['datestart'], date('H:i'), 0, false);
  //       $request['datefinish'] = TaskController::get_datatime($request['datefinish'], date('H:i'), 1, false);
  //     }
  //   }

  //   $task->user_id = auth()->id();
  //   $task->sub_id = (int) $request->sub_id;
  //   $task->column = (int) $request->column;
  //   $task->category_id = (int)($request->grp_tsk);
  //   $task->name = $request->name ? $request->name : 'Безымянная';
  //   $task->description = $request->description ? $request->description : 'Без описания';
  //   $task->datetime_start = $request['datestart'];
  //   $task->datetime_finish = $request['datefinish'];
  //   $task->complexity = (int) $request->complexity;
  //   $task->rep_days_week = $request->week_days;
  //   $task->rep_val = (int) $request->rep_int;
  //   $task->val_to_rep = (int) $request->sel_rep_int;

  //   $task->save();
  //   return $task;

  // }
  // function get_datatime($date, $time, $k = 0, $marker = false)
  // {
  //   //Автоматически устанавливает datetime с разницей в 30 минут (не обязательно) и маркером для учитывания
  //   //времени этой даты при расчётах (не обязательно. если 00 секунд - время учитывается. если 01 - нет)
  //   settype($marker, 'bool');
  //   $k = $k === 0 ? 0 : ($k > 0 ? 1 : -1);
  //   $year = (int) substr($date, 0, 4);
  //   $month = (int) substr($date, 5, 2);
  //   $day = (int) substr($date, 8, 2);
  //   $minut = (int) substr($time, 3, 2);
  //   $hour = (int) substr($time, 0, 2);
  //   $dt = date('Y-m-d H:i:s', mktime($hour, $minut + (30 * $k), $marker ? 0 : 1, $month, $day, $year));
  //   return $dt;
  // }
  // public function store(Request $request)
  // {
  //   // $task = new Task;

  //   $task = TaskController::upDataTask(new Task, $request);
  //   return response()->json($task);

  //   // return response()->json($request);
  // }

  // public function show($id)
  // {
  //   $task_data = Task::findOrFail($id);
  //   return response()->json($task_data);
  // }
  // public function edit(Task $task)
  // {
  //   $task = Task::find(1);
  //   $task->update(['Column_num' => 2,]);
  // }
  // public function update(Request $request)
  // {
  //   // return $request;
  //   $task = TaskController::upDataTask(Task::findOrFail($request->id), $request);
  //   return response()->json($task);
  // }

  // public function delete(Request $request)
  // {
  //   $task = Task::find($request->id);
  //   $task->delete();
  //   // $task = Task::withTrashed()->find($task->id);
  //   // $task->restore();
  // }
}
