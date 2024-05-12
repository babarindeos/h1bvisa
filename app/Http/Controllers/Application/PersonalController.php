<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class PersonalController extends Controller
{
    //
    private $section;

    public function __construct(){
        $this->section = "A";
    }

    public function personal(){
        $user = Auth::user();
        //dd($user);
        return view('application.personal')->with(['section' => $this->section, 'user'=> $user]);
    }
}
