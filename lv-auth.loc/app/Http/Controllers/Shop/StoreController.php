<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
// use App\Http\Requests\Shop\StoreRequest;

class StoreController extends BaseController
{
  public function __invoke(Request $request)
  {
    // $task = $request->validated();
    $record = $this->service->store($request);

    return response()->json($record);
    // return response()->json($request);
  }
}
