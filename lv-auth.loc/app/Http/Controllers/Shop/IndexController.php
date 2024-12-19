<?php

namespace App\Http\Controllers\Shop;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\InventoryUser;
use App\Models\Quest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends BaseController
{    
  public function __invoke()
  {
    $inventories = Inventory::all();
    $inventories_user = InventoryUser::all()->where('user_id', auth()->user()->id);
    $quests = Quest::all();
    // dd($inventories_user);
            $link = 'shop';
    return view('main.shop', compact('inventories', 'inventories_user', 'quests', 'link'));
  }
}
