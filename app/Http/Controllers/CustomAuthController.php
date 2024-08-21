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
        
        return view('signin-3');
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
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        if ($response->successful()) {
            // Store the token in the session
            session(['token' => $response->json('token')]);
    
            // Store user info in the session
            $userInfo = $response->json('user'); // Capture the user info from the response
            session(['user' => $userInfo]);
    
            return redirect()->route('pos')->with('message', 'Login successful');
        }
    
        return back()->withErrors(['error' => $response->json('message')]);
    }
    public function logout(Request $request)
    {
        // Clear the session
        $request->session()->flush();
    
        // Optionally, you can also invalidate the session token if you're using API tokens
        // auth()->user()->tokens()->delete();
    
        // Redirect to /pos
        return redirect('/pos')->with('message', 'Successfully logged out.');
    }    
    
    public function registration()
    {
        return view('register-3');
    }
      

    public function customRegister(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'address' => 'required|string|min:5',
            'phone' => 'required',
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
            return redirect()->route('signin')->with('message', 'User registered successfully');
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
}
