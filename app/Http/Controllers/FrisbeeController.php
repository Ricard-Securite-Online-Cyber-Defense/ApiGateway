<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrisbeeController extends Controller
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('services.microservices.frisbee');
    }

    public function index(){
        return 'Hello from FrisbeeController';
    }
}
