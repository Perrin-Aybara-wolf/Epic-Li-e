<?php

namespace App\Services\Task;

use App\Models\Category;
use App\Models\Task;
use App\Models\Statistic;
use Illuminate\Http\Request;

class Service
{
    public function store(Request $request)
    {

        $task = new Task;

        $task->user_id = auth()->id();
        $task->sub_id = (int) $request->sub_id;
        $task->column = (int) $request->column;
        $task->category_id = (int) ($request->grp_tsk);
        $task->name = $request->name ? $request->name : 'Безымянная';
        $task->description = $request->description ? $request->description : 'Без описания';
        if ($request->column === 1) {
            $task->datetime_start = date('Y:m:d h:i:s');
            $task->datetime_finish = '9999-12-31 23:59:59';
        } else {
            correctTime($request);
            $task->datetime_start = $request['datestart'];
            $task->datetime_finish = $request['datefinish'];
        }
        $task->complexity = (int) $request->complexity;
        if (!$request->week_days) {
            if ($request->column == 1) {
                $task->rep_val = 1;
                $task->val_to_rep = 1;
            } else {
                $task->rep_val = (int) $request->rep_int;
                $task->val_to_rep = (int) $request->sel_rep_int;
            }
        } else
            $task->rep_days_week = $request->week_days;



        // dd($task);
        $task->save();

        if (!addRecord($task)) {
            $task->delete();
            dd($task);
        }

        // return response()->json($task);
        return $task;
    }

    public function show($id)
    {
        $task_data = Task::findOrFail($id);
        return response()->json($task_data);
    }
    public function edit(Task $task)
    {
        $task = Task::find(1);
        $task->update(['Column_num' => 2,]);
    }
    public function update(Request $request)
    {
        correctTime($request);

        $task = Task::findOrFail($request->id);

        $task->category_id = (int) ($request->grp_tsk);
        $task->name = $request->name ? $request->name : 'Безымянная';
        $task->description = $request->description ? $request->description : 'Без описания';
        $task->datetime_start = $request['datestart'];
        $task->datetime_finish = $request['datefinish'];
        $task->complexity = (int) $request->complexity;
        if (!$request->week_days) {
            $task->rep_val = (int) $request->rep_int;
            $task->val_to_rep = (int) $request->sel_rep_int;
        } else
            $task->rep_days_week = $request->week_days;

        $task->save();

        // $record = Statistic::first()

        addRecord($task);
        // return $task;
        // return $request;
        return response()->json($task);
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();
        // $task = Task::withTrashed()->find($task->id);
        // $task->restore();
    }
}
function correctTime(Request $request)
{
    $request['datestart'] = $request['datestart'] ? $request['datestart'] : date('Y-m-d');
    $request['datefinish'] = $request['datefinish'] ? $request['datefinish'] : date('Y-m-d');

    if ($request['timestart']) {
        $request['datestart'] = get_datatime($request['datestart'], $request['timestart'], 0, true);
        if ($request['timefinish'])
            $request['datefinish'] = get_datatime($request['datefinish'], $request['timefinish'], 0, true);
        else
            $request['datefinish'] = get_datatime($request['datestart'], $request['timestart'], 1, true);
    } else {
        if ($request['timefinish']) {
            $request['datefinish'] = get_datatime($request['datefinish'], $request['timefinish'], 0, true);
            $request['datestart'] = get_datatime($request['datefinish'], $request['timefinish'], -1, true);
        } else {
            $request['datestart'] = get_datatime($request['datestart'], date('H:i'), 0, false);
            $request['datefinish'] = get_datatime($request['datefinish'], date('H:i'), 1, false);
        }
    }
}

function get_datatime($date, $time, $k = 0, $marker = false)
{
    //Автоматически устанавливает datetime с разницей в 30 минут (не обязательно) и маркером для учитывания
    //времени этой даты при расчётах (не обязательно. если 00 секунд - время учитывается. если 01 - нет)
    settype($marker, 'bool');
    $k = $k === 0 ? 0 : ($k > 0 ? 1 : -1);
    $year = (int) substr($date, 0, 4);
    $month = (int) substr($date, 5, 2);
    $day = (int) substr($date, 8, 2);
    $minut = (int) substr($time, 3, 2);
    $hour = (int) substr($time, 0, 2);
    $dt = date('Y-m-d H:i:s', mktime($hour, $minut + (30 * $k), $marker ? 0 : 1, $month, $day, $year));
    return $dt;
}

function addRecord(Task $task)
{

    if (!isset($task['id']))
        return false;
    $record = new Statistic;

    $record->task_id = $task->id;
    $record->status = 0;
    // $record->date_set = strtotime($task->datetime_start) > strtotime(date('Y-m-d'))?
    // substr($task->datetime_start, 0, 10) : date('Y-m-d');

    $str_dt = strtotime(substr($task->datetime_start, 0, 10));
    if (isset($task['rep_days_week'])) {
        for ($i = 0; $i < 7; $i++) {
            $arr = explode(',', $task->rep_days_week);
            if (array_search(date('w', $str_dt + (86400 * $i)), $arr) === 0) {
                if (strtotime(substr($task->datetime_finish, 0, 10)) < $str_dt + (86400 * ($i - 1))) {
                    return false;
                }
                $record->date_set = date("Y-m-d", $str_dt + (86400 * ($i - 1)));
                break;
            }
        }
    } else
        $record->date_set = date("Y-m-d", $str_dt);
    $record->time_start = substr($task->datetime_start, 11);
    $record->time_finish = substr($task->datetime_finish, 11);

    $record->save();
    // dd($record->save());
    return $record;
}