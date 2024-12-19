<?php

namespace App\Http\Controllers\Quest;

// use App\Models\Category;
use App\Models\Quest;
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
