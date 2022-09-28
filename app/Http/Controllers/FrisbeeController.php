<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrisbeeController extends Controller
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('app.ms_frisbee_url')."/frisbee";
    }

    public function index()
    {
        return Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->get($this->apiUrl)->json();
    }

    public function update(int $id, Request $request)
    {

        // AJOUTER VALIDATE

        return Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->put($this->apiUrl. '/'.$id, $request->all())->json();
    }

    public function create(Request $request)
    {

        // AJOUTER VALIDATE

        return Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->post($this->apiUrl, $request->all())->json();
    }

    public function delete(int $id)
    {
        return Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ])->delete($this->apiUrl. '/'.$id)->json();
    }
}
