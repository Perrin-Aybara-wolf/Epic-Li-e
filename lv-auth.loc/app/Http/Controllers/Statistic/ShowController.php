<?php

namespace App\Http\Controllers\Statistic;

// use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
  public function __invoke($id)
  {
    $task = Task::findOrFail($id);
    return response()->json($task);
  }
}