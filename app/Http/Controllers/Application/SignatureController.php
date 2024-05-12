<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SignatureController extends Controller
{
    //
    private $section;

    public function __construct(){
        $this->section = "F";
    }

    public function signature()
    {
        $user = Auth::user();
        //dd($user);
        return view('application.signature')->with(['section' => $this->section, 'user'=> $user]);
    }
}
