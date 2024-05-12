<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{
    //

    private $section;

    public function __construct(){
        $this->section = "B";
    }

    public function professional()
    {
        $user = Auth::user();
        //dd($user);
        return view('application.professional')->with(['section' => $this->section, 'user'=> $user]);
    }
}
