<?php

namespace App\Http\Controllers\Quest;

// use App\Models\Category;
use App\Models\Quest;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
  public function __invoke($id)
  {
    $quest = Quest::findOrFail($id);
    return response()->json($quest);
  }
}