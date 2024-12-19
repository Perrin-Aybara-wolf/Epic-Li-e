<?php

namespace App\Services\Statistic;

use App\Models\User;
use App\Models\Task;
use App\Models\Statistic;
use Date;
use Illuminate\Http\Request;



// $query = "INSERT INTO `Statistic`(`task_id`, `status`, `date_set`,`time_start`,`time_finish`)
// VALUE ($task_id, 0, CURDATE(), DATE_FORMAT('{$data['dt_start']}', '%H:%i:%s'), DATE_FORMAT('{$data['dt_finish']}', '%H:%i:%s'))";

class Service
{
    public function store(Task $task)
    {

        dd($task);
        $record = new Statistic;
        $record->task_id = $task->id;


        $record->status = (bool) false;
        $record->date_set = strtotime($task->datetime_start) > strtotime(date('Y-m-d')) ?
            substr($task->datetime_start, 0, 10) : date('Y-m-d');

        // $record->time_start = $request['datestart'];
        // $record->time_finish = $request['datefinish'];

        $record->time_start = substr($task->datetime_start, 11);
        $record->time_finish = substr($task->datetime_finish, 11);


        $record->save();

        // return response()->json($task);
        return $task;
    }

    public function show($id)
    {
        $task_data = Task::findOrFail($id);
        return response()->json($task_data);
    }
    public function complete(Request $request)
    {
        $dateSet = isset($request->date) ? $request->date : date('Y-m-d');
        $records = Statistic::all()->where('task_id', $request->id)->where('date_set', $dateSet)->first();

        $complexity = Task::find($request->id)->complexity;

        $user = User::find(auth()->user()->id);
        if ($request->complete === 'true') {
            if (rand(0, 10000) === 0)
                $user->DM = auth()->user()->DM + 1;
            else
                $user->GM = auth()->user()->GM + $complexity * 2;

            if ($user->Fight_Soul <= 100)
                $user->increment('Fight_Soul');
            
            $records->update(['datetime_completed' => date('Y-m-d H:i:s')]);
        } else {
            if (rand(0, 10000) === 0)
                $user->DM = auth()->user()->DM - 1;
            else
                $user->GM = auth()->user()->GM - $complexity * 2;
            $records->update(['datetime_completed' => null]);
        }
        $user->save();

        return response()->json(['gm' => $user->GM, 'dm' => $user->DM]);
    }
    public function update(Request $request)
    {

        foreach ($request->data as $task) {
            $task = correctTime($task);
            $record = Statistic::where('task_id', $task['task_id'])->firstWhere('date_set', $task['date_set']);

            $record->time_start = $task['timestart'];
            $record->time_finish = $task['timefinish'];

            $record->save();
        }
        // return response()->json($task);
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();
        // $task = Task::withTrashed()->find($task->id);
        // $task->restore();
    }
}
function correctTime($request)
{
    if ($request['timestart'])
        $request['timestart'] .= ':00';
    else
        $request['timestart'] = '00:00:01';
    if ($request['timefinish'])
        $request['timefinish'] .= ':00';
    else
        $request['timefinish'] = '00:00:01';
    return $request;
}

function get_time($time, $k = 0, $marker = false)
{
    //Автоматически устанавливает datetime с разницей в 30 минут (не обязательно) и маркером для учитывания
    //времени этой даты при расчётах (не обязательно. если 00 секунд - время учитывается. если 01 - нет)
    settype($marker, 'bool');
    $k = $k === 0 ? 0 : ($k > 0 ? 1 : -1);
    $minut = (int) substr($time, 3, 2);
    $hour = (int) substr($time, 0, 2);
    $dt = date('H:i:s', mktime($hour, $minut + (30 * $k), $marker ? 0 : 1, 0, 0, 0));
    return $dt;
}