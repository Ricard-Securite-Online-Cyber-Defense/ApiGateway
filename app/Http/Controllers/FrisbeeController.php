<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrisbeeController extends Controller
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'http://localhost:3001';
    }

    public function index(){
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])
        ->post($this->apiUrl);

        return response()->json($res);
    }

    public function update(){
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->patch($this->apiUrl);

        return response()->json($res);
    }

    public function create(){
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->post($this->apiUrl);

        return response()->json($res);
    }

    public function delete(){
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])
        ->delete($this->apiUrl);

        return response()->json($res);
    }
}
