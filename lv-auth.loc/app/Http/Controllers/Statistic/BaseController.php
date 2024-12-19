<?php
namespace App\Http\Controllers\Statistic;
use App\Http\Controllers\Controller;
use App\Services\Statistic\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}