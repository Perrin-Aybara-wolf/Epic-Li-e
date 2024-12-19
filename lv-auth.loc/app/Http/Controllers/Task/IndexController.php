<?php

namespace App\Http\Controllers\Task;

use App\Models\Category;
use App\Models\Statistic;
use App\Models\Task;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        // $task = Task::findOrFail($id);
        // return response()->json($task);

        $date = $request->date ? $request->date : date('Y-m-d');




        $sub = DB::table('Statistic')
            ->selectRaw('task_id, time_start, time_finish, MAX(id) as m, date_set, datetime_completed')
            ->where('date_set', $date)
            ->groupBy('task_id')
            ->orderBy('task_id', 'desc');

        $tasks = DB::table('Tasks')
            ->joinSub($sub, 'st', function ($join) {
                $join->on('Tasks.id', '=', 'task_id');
            })
            ->selectRaw('Tasks.*, date_set, datetime_completed, time_start, time_finish')
            ->where('user_id', auth()->id())
            ->where('date_set', $date)

            ->where('Tasks.deleted_at', null)
            ->groupBy('Tasks.id')
            ->distinct();


        if (Route::currentRouteName() !== 'main')
            $tasks->where('column', '<>', 1);

            $tasks = $tasks->get();








        // $tasks = Task::whereIn('id', function(Builder $query){
        //     $query->select('task_id, MAX(Statistic.id)')
        //     ->from('Statistic')
        //     ->whereColumn('task_id', 'Tasks.id')
        // })
        //     ->join('Statistic', 'Tasks.id', 'Statistic.task_id')
        //     ->selectRaw('Tasks.*, date_set, datetime_completed, time_start, time_finish, MAX(Statistic.id)')
        //     ->where('user_id', auth()->id())
        //     ->where('date_set', $date)
        //     ->where('column', '<>', 1)
        //     ->where('Tasks.deleted_at', null)
        //     ->groupBy('Tasks.id')
        //     ->distinct()
        //     ->get();


        $categories = Category::all();


        // dd($request->date);
        // dd($date);
        // dd($tasks);
        // dd(Route::currentRouteName());





        if (Route::currentRouteName() === 'main') {
            $link = 'main';
            return view('main.main_tasks', compact(['tasks', 'categories', 'link']));
        } else if (Route::currentRouteName() === 'rozpisanie.day') {
            for ($i = 0; $i < count($tasks); $i++) {
                $date = explode(' ', $tasks[$i]->datetime_start)[0];
                $tasks[$i]->datetime_start = $date . ' ' . $tasks[$i]->time_start;
                $date = explode(' ', $tasks[$i]->datetime_finish)[0];
                $tasks[$i]->datetime_finish = $date . ' ' . $tasks[$i]->time_finish;
            }
            return response()->json($tasks);
        } else if (Route::currentRouteName() === 'rozpisanie') {
            $habbits = Task::all('id', 'user_id', 'sub_id', 'column', 'name', 'description')
                ->where('user_id', auth()->id())
                ->where('sub_id', 0)
                ->where('column', 1);
            // dd($tasks);
            $link = 'rozpisanie';
            return view('main.rozpisanie', compact(['tasks', 'categories', 'habbits', 'link', 'date']));
        }
        // else if (Route::currentRouteName() === 'rozpisanie.day')
        //     return response()->json($tasks);
    }
}
