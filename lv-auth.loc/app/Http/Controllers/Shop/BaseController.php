<?php
namespace App\Http\Controllers\Shop;
use App\Http\Controllers\Controller;
use App\Services\Shop\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}