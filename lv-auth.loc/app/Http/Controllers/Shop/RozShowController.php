<?php

namespace App\Http\Controllers\Task;

use App\Models\Category;
use App\Models\Statistic;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RozShowController extends BaseController
{
    public function __invoke(Request $request)
    {
        // $task = Task::findOrFail($id);
        // return response()->json($task);
        dd($request);

        $date_ = $request ? $request->date : date('Y-m-d');

        $records = Statistic::select('task_id')->where('date_set', $date_)->distinct()->get();
        $tasks_all = Task::all()->where('user_id', auth()->id());

        $tasks = collect([]);
        foreach ($tasks_all as $task) {
            // foreach ($task->recordsToday('2024-09-30') as $record) {
            foreach ($records as $record) {
                if ($task->id === $record->task_id)
                    $tasks->push($task);
            }
        }
        // $categories = Category::all();
        // return response()->json($tasks);
    }
}
