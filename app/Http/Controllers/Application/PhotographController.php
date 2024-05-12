<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PhotographController extends Controller
{
    //
    private $section;

    public function __construct(){
        $this->section = "E";
    }

    public function photograph()
    {
        $user = Auth::user();
        //dd($user);
        return view('application.photograph')->with(['section' => $this->section, 'user'=> $user]);
    }
}
