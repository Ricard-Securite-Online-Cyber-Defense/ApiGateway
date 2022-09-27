<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IngredientController extends Controller
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
        ])->post($this->apiUrl);

        return response()->json($res);
    }

    public function update(int $id){

        // AJOUTER VALIDATE

        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->patch($this->apiUrl. '/'.$id, [
            // AJOUTER PARAMS
        ]);

        return response()->json($res);
    }

    public function create(){

        // AJOUTER VALIDATE

        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->post($this->apiUrl, [
            // AJOUTER PARAMS
        ]);

        return response()->json($res);
    }

    public function delete(int $id){
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->delete($this->apiUrl. '/'.$id);

        return response()->json($res);
    }
}
