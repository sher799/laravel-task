<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    public function main()
    {
        return view('welcome');
    }

    public function dashboard()
    {
     

        return view('dashboard')->with([
            'applications'=>Application::latest()->paginate(8),
        ]);
    }


}
