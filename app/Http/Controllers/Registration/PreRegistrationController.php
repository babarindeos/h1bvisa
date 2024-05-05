<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreRegistrationController extends Controller
{
    //

    public function index(){
        return view('pre-registration.index');
    }
}
