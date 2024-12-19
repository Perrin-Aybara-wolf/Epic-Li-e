<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\Task\UpdateRequest;

class UpdateController extends BaseController
{
  public function __invoke(UpdateRequest $request)
  {
    // $task = $request->validated();

    // dd($request);
    $task = $this->service->update($request);

    return response()->json($task);
  }
}
