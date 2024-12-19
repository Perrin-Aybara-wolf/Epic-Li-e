<?php

namespace App\Http\Controllers;

use App\Models\InventoryUser;
use Illuminate\Http\Request;

class InventoryUserController extends Controller
{
    public function buy(Request $request){
        foreach($request['goods'] as $good){
            InventoryUser::firstOrCreate([
                'user_id' -> auth()->user()->id,
                'inventory_id' -> $good->id,
            ]);

        }
    }
}
