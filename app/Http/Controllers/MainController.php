<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $applications=Application::paginate(10);


        return view('dashboard')->with('applications',$applications);
    }


}
