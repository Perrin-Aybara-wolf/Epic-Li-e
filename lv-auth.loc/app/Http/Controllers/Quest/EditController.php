<?php

namespace App\Http\Controllers\Quest;

// use App\Models\Category;
use App\Models\Quest;
use Illuminate\Http\Request;

class EditController extends BaseController
{
  public function __invoke(Task $task)
  {
    $task = Task::find(1);
    $task->update(['Column_num' => 2,]);
  }
}
