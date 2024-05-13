<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use illuminate\Support\Facades\Auth;
use App\Models\Personal;
use App\Models\Professional;
use App\Models\Passport;
use App\Models\Payment;
use App\Models\Photograph;
use App\Models\Signature;
use App\Models\ApplicationCompletion;
use App\Http\Classes\Section;


class ApplicationController extends Controller
{
    //
    public function __construct(){

        
        
    }

    
    

    public function index(){

    }

    public function start(){

        $isCompleted = Section::applicationCompletion(auth()->user()->id);
    
        if ($isCompleted){
            return redirect()->route('application.completed');
        }

        return view('application.start');
    }

    public function finish(){
        $error = false;
        $message = '<ul>';

        $user_id = Auth::user()->id;

        $personal = Personal::where('user_id', $user_id)->exists();

        if ($personal==false){
            $error = true;
            $message .= "<li>Personal Information not submitted</l1>";
        }

        $professional = Professional::where('user_id', $user_id)->exists();
        if ($professional==false){
            $error = true;
            $message .= "<li>Professional Information not submitted</li>";
        }

        $passport = Passport::where('user_id', $user_id)->exists();
        if ($passport==false){
            $error = true;
            $message .= "<li>International Passport Information not submitted</li>";
        }

        $payment = Payment::where('user_id', $user_id)->exists();
        if ($payment==false){
            $error = true;
            $message .= "<li>Payment Information not submitted</li>";
        }

        $photograph = Photograph::where('user_id', $user_id)->exists();
        if ($photograph==false){
            $error = true;
            $message .= "<li>Photograph not submitted</li>";
        }

        $signature = Signature::where('user_id', $user_id)->exists();
        if ($signature==false){
            $error = true;
            $message .= "<li>Signature not submitted</li>";
        }

        $message .= "</ul>";

        return view('application.finish')->with(['error' => $error, 'message'=>$message]);
    }


    public function finalize(Request $request){
        
        $user_id = Auth::user()->id;
        $op_status = ApplicationCompletion::create(['user_id' => $user_id]);

        if ($op_status){
            return redirect()->route('application.completed');
        }

        return redirect()->back();
    }

    public function completed(){
        return view('application.completed');
    }
    
}
