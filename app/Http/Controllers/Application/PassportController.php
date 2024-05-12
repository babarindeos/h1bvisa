<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PassportController extends Controller
{
    //
    private $section;

    public function __construct(){
        $this->section = "C";
    }

    public function passport()
    {
        $user = Auth::user();
        //dd($user);
        return view('application.passport')->with(['section' => $this->section, 'user'=> $user]);
    }
}
