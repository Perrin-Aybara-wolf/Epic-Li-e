<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\Task\UpdateRequest;

class UpdateController extends BaseController
{
  public function __invoke(UpdateRequest $request)
  {
    // $task = $request->validated();

    $task = $this->service->update($request);

    return response()->json($task);
  }
}
