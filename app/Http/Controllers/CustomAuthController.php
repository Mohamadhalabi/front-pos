<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CustomAuthController extends Controller
{

    public function index()
    {
        $products = [];
        return view('signin-3',compact('products'));
    }  
      

    public function customSignin(Request $request)
    {
        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->post(env('API_BASE_URL', 'http://backend-url') . '/login', [
            'identifier' => $request->email,
            'password' => $request->password,
        ]);
    
        if ($response->successful()) {
            // Store the token in the session
            session(['token' => $response->json('token')]);
    
            // Store user info in the session
            $userInfo = $response->json('user'); // Capture the user info from the response
            session(['user' => $userInfo]);
    
            return redirect()->route('pos')->with('message', __('messages.login_successful'));
        }
    
        return back()->withErrors(['error' => $response->json('message')]);
    }
    public function logout(Request $request)
    {
        // Clear the session
        $request->session()->flush();

        return redirect('/pos')->with('message', __('messages.logout_successful'));
    }    
    
    public function registration()
    {
        $products = [];
        return view('register-3',compact('products'));
    }
      

    public function customRegister(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'address' => 'required|string|min:5',
            'phone' => 'required|unique:users',
        ]);

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->post(env('API_BASE_URL', 'http://backend-url') . '/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        

        if ($response->successful()) {
            return redirect()->route('signinn')->with('message', __('messages.user_registered'));
        }

        return back()->withErrors(['error' => $response->json('message')]);
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'confirmpassword' => Hash::make($data['confirmpassword'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }
  
        return redirect("signin")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('signin');
    }

    public function profile(){
        $products = [];
        return view('profile',compact('products'));
    }

    public function profile_update(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:6',
            'address' => 'required|string|max:500',
        ]);
    
        // Construct the API URL using double quotes to allow variable interpolation
        $apiUrl = env('API_BASE_URL', 'http://backend-url') . '/profile-update/' . $request->id;
    
        // Send the data to the external API
        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->post($apiUrl, [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);
    
        // Check if the response is successful
        if ($response->successful()) {

            $userInfo = $response->json('user'); // Capture the user info from the response

            session(['user' => $userInfo]);


            return redirect()->route('profile')->with('message', __('messages.updated_successfully'));
        }
    
        // Handle errors and redirect back
        return back()->withErrors(['error' => $response->json('message') ?? __('messages.update_failed')]);
    }

    public function orders()
    {
        $userInfo = Session::get('user');
        $products = [];
    
        if (is_null($userInfo)) {
            return Redirect('login');
        }
        $apiUrl = env('API_BASE_URL', 'http://backend-url') . '/get-user-orders';

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get($apiUrl, [
            'user_id' => $userInfo['id'],
        ]);
    

        $data = $response->json();
        $orders = $data['orders'];

        return view('orders', compact('products','orders'));
    }

    public function order_details($uuid)
    {
        $userInfo = Session::get('user');
        $products = [];
    
        if (is_null($userInfo)) {
            return Redirect('login');
        }
        $apiUrl = env('API_BASE_URL', 'http://backend-url') . '/get-order-details';

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get($apiUrl, [
            'user_id' => $userInfo['id'],
            'order_uuid' => $uuid,
        ]);

        $data = $response->json();

        if(isset($data['orders'])){
            $order_details = $data['orders'];
        }
        else{
            $order_details = [];
        }
        return view('order-details', compact('products','order_details'));
       
    }

    public function complains()
    {
        $products = [];

        return view('complains',compact('products'));
    }

    public function complains_submit()
    {

        return redirect('/complains')->with('message', __('messages.complain_submitted'));
    }
    
    
}
