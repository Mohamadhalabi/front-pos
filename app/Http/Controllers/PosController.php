<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PosController extends Controller
{
    public function index()
    {

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get(env('API_BASE_URL', 'default_value') . '/categories');

        $categories = $response->json();


        $response_products = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get(env('API_BASE_URL', 'default_value') . '/all-products');

        $products = $response_products->json();

        return view('pos',compact('categories','products'));
    }
}
