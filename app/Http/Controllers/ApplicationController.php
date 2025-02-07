<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\SenEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Illuminate\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
       
       
       if($this->checkdate()){
        return redirect()->back()->with('error','You can create only one application a day');
       };



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

         SendEmailJob::dispatch($application);
      

        return redirect()->back();



    }

    protected function checkdate()
    {

        if(auth()->user()->applications()->latest()->first() == null){
           return false;
        }
         $last_application=auth()->user()->applications()->latest()->first();
        $last_app_date=Carbon::parse($last_application->created_at)->format('Y-m-d');
        $today=Carbon::now()->format('Y-m-d');

        if($last_app_date == $today)
        {
            return true;
        }
    }
}


