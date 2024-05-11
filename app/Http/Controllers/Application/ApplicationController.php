<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    //
    private $section;

    public function __construct(){
        $this->section = "A";
    }


    public function personal(){
        $user = Auth::user();
        //dd($user);
        return view('application.personal_information')->with(['section' => $this->section, 'user'=> $user]);
    }
}
