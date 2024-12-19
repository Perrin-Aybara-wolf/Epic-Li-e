<?php

namespace App\Http\Controllers\Statistic;

use App\Models\Category;
use App\Models\Task;

class IndexController extends BaseController
{
    public function __invoke()
    {
        // $task = Task::findOrFail($id);
        // return response()->json($task);
    
        $tasks = Task::all()->where('user_id', auth()->id());
        $categories = Category::all();
        return view('main.main_tasks', compact(['tasks', 'categories']));
    }
}
