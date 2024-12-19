<?php
namespace App\Http\Controllers\Quest;
use App\Http\Controllers\Controller;
use App\Services\Quest\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}