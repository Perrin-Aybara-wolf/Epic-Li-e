<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\UserData;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function show()
    {
        // $tasks = UserData::where('id', 1);
        $tasks = Task::where('id', 1)->get();
        foreach ($tasks as $task) {
            dump($task);
        }
    }
    public function create()
    {

        $tasksArr = [
            [
                'User_id' => 1,
                'Column_num' => 1,
                'Сomplexity' => 1,
            ],
            [
                'User_id' => 2,
                'sub_id' => null,
                'Column_num' => 3,
                'Name' => 'fdfd',
                'Description' => 'fdfdfdf',
                'Seria_now' => 3,
                'Max_seria' => 3,
                'Datetime_start' => null,
                'Datetime_finish' => null,
                'Сomplexity' => 1,
                'Rep_days_week' => null,
                'Rep_val' => null,
                'Val_to_rep' => null,
            ],
        ];

        foreach ($tasksArr as $task) {
            dump($task);
            Task::create($task);
        }
    }

    public function update(){
        $task = Task::find(1);
        $task->update(['Column_num' => 2,]);
    }
    public function delete(){
        // $task = Task::find(1);
        // $task->delete();
        $task = Task::withTrashed()->find(1);
        $task->restore();
    }
}
