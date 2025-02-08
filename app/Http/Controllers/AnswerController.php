<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Application $application)
    {
        return view('answer.create',['application'=>$application]);
    }
}
