<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        if (array_key_exists($locale, config('app.locales'))) {
            Session::put('applocale', $locale);
        }
        return Redirect::back();
    }
}
