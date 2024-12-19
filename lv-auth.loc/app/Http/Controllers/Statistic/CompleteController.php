<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Requests\Statistic\UpdateRequest;

class CompleteController extends BaseController
{
  public function __invoke(UpdateRequest $request)
  {
    // $request = $request->validated();

    $record = $this->service->complete($request);

    return response()->json($record);
  }
}
