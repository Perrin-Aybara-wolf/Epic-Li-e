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
        $habbits = Task::all('id', 'user_id', 'sub_id', 'column', 'name', 'description')
        ->where('user_id', auth()->id())
        ->where('sub_id', 0)
        ->where('column', 1);


        // foreach ($habbits as $habbit) {
        //     dd($habbit->percent);
        // }

        // return response()->json($task);
    }
}
