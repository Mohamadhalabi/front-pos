<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PosController extends Controller
{
    public function index(Request $request)
    {

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get(env('API_BASE_URL', 'default_value') . '/categories');

        $categories = $response->json();


        $page = $request->input('page', 1); // Get the current page or default to 1

        $selected_category = $request->input('category', 'all');

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get(env('API_BASE_URL', 'default_value') . '/all-products', [
            'page' => $page,
            'selected_category' => $selected_category,
        ]);
    
        $data = $response->json();

        $products = $data['products'];
        $pagination = $data['pagination'];
    
        return view('pos', compact('products', 'pagination','categories'));
    }
    public function getProductsByCategory($categoryId)
    {
        $response_products = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get(env('API_BASE_URL', 'default_value') . '/category-products', [
            'category_id' => $categoryId,
        ]);

        $products = $response_products->json();

        return response()->json(['products' => $products]);
    }   

}
