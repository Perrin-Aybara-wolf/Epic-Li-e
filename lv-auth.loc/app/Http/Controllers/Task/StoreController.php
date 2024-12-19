<?php

namespace App\Http\Controllers\Task;
use App\Http\Requests\Task\StoreRequest;

class StoreController extends BaseController
{
  public function __invoke(StoreRequest $request)
  {
    // $task = $request->validated();
    
    $task = $this->service->store($request);

    // dd($request);
    return response()->json($task);
    // return response()->json($request);
  }
}
