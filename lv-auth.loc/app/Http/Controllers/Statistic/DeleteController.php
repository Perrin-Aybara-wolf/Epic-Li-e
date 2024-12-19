<?php

namespace App\Http\Controllers\Statistic;

// use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
  public function __invoke(Request $request)
  {
    $task = Task::findOrFail($request->id);
    $task->delete();
    // $task = Task::withTrashed()->find($task->id);
    // $task->restore();
  }
}
