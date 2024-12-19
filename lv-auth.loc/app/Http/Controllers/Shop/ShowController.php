<?php

namespace App\Http\Controllers\Shop;

// use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
  public function __invoke($id)
  {
    $task = Inventory::findOrFail($id);
    return response()->json($task);
  }
}