<?php

namespace App\Services\Shop;

use App\Models\InventoryUser;
use App\Models\User;
use Date;
use Illuminate\Http\Request;



// $query = "INSERT INTO `Statistic`(`task_id`, `status`, `date_set`,`time_start`,`time_finish`)
// VALUE ($task_id, 0, CURDATE(), DATE_FORMAT('{$data['dt_start']}', '%H:%i:%s'), DATE_FORMAT('{$data['dt_finish']}', '%H:%i:%s'))";

class Service
{
    public function store($request)
    {

        $record = InventoryUser::updateOrCreate([
            'user_id' => auth()->user()->id,
            'inventory_id' => $request->id,
        ]);
        $record->count_things++;
        $record->save();

        // dump($request);
        $user = User::find(auth()->user()->id);
        $user->GM = $request->user_gm;
            // $user->DM = $request->user_dm;
            //     $user->update([
            // "GM" => $request->user_gm,
            // "DM" => $request->user_gm,],);

            $user->save();
        // return response()->json($task);
        // return $task;
    }

    public function show($id)
    {
        $task_data = Task::findOrFail($id);
        return response()->json($task_data);
    }
    public function update(Request $request)
    {
        // dd($request);
        InventoryUser::where('is_wear', 1)->update(['is_wear' => 0]);
        $items = InventoryUser::where('inventory_id', $request->body)
        ->orWhere('inventory_id', $request->head)
        ->orWhere('inventory_id', $request->legs)
        ->orWhere('inventory_id', $request->foots)
        ->orWhere('inventory_id', $request->r_arm)
        ->orWhere('inventory_id', $request->l_arm)
        ->update(['is_wear' => 1]);

        // dd($items);

    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();
        // $task = Task::withTrashed()->find($task->id);
        // $task->restore();
    }
}