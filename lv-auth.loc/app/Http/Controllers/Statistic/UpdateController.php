<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Requests\Task\UpdateRequest;

class UpdateController extends BaseController
{
  public function __invoke(UpdateRequest $request)
  {
    // $task = $request->validated();
    $record = $this->service->update($request);

    return response()->json($record);
  }
}
