<?php

namespace App\Http\Controllers\Task;

// use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class EditController extends BaseController
{
  public function __invoke(Task $task)
  {
    $task = Task::find(1);
    $task->update(['Column_num' => 2,]);
  }
}
