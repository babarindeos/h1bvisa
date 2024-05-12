<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaymentController extends Controller
{
    //
    private $section;

    public function __construct(){
        $this->section = "D";
    }

    public function payment()
    {
        $user = Auth::user();
        //dd($user);
        return view('application.payment')->with(['section' => $this->section, 'user'=> $user]);
    }
}
