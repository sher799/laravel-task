<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('file')){
                $path=$request->file('file')->getClientOriginalName();
                $with=pathinfo($path,PATHINFO_FILENAME);
                $ext=$request->file('file')->getClientOriginalExtension();

                $file_name=$with."_".time().".".$ext;

                $request->file('file')->storeAs('file',$file_name);
        }


        $request->validate([
            'subject'=>'required|max:255',
            'message'=>'required|min:10',
            'file'=>'file|mimes:jpg,pnd,png'
        ]);


        $application=Application::create([
            'user_id'=>auth()->user()->id,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file_url'=>$file_name ?? null
        ]);


        return redirect()->back();



    }

}


