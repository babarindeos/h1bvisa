<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PreRegistrationRequest;
use Illuminate\Support\Str;
use App\Models\PreRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PreRegistrationController extends Controller
{
    //

    public function index(){
        return view('pre-registration.index');
    }

    public function store(PreRegistrationRequest $request){
        // Generate a uuid
        $uuid = Str::uuid();
        //dd($uuid);
        //dd($request->only('surname', 'firstname'));
        //dd($request->all());

        $formFields = $request->validate([            
            'email' => [ 'unique:'.User::class]
        ]);
        $formFields['surname'] = $request->input('surname');
        $formFields['firstname'] = $request->input('firstname');
        $formFields['middlename'] = $request->input('middlename');
        $formFields['phone'] = $request->input('phone');
        $formFields['password'] = bcrypt('123456');
        $formFields['uuid'] = $uuid;
        
        
       


        //storing data into pre-registration table
        $preRegistration = new PreRegistration();
        $preRegistration->surname = ucfirst($request->input('surname'));
        $preRegistration->firstname = ucfirst($request->input('firstname'));
        $preRegistration->middlename = ucfirst($request->input('middlename'));
        $preRegistration->email = $request->input('email');
        $preRegistration->phone = $request->input('phone');
        $preRegistration->uuid = $uuid;

        $isPreRegistrationSaved = $preRegistration->save();


        if (!$isPreRegistrationSaved){
            $data = [
                'error' => true,
                'status' => 'fail',
                'message' => 'An error occurred creating your pre-registration information'
            ];

            return redirect()->back()->with($data);
        }

        // create user account for the user into the user table
        $user = User::create($formFields);
      

        $data = [
            'error' => true,
            'status' => 'success',
            'message' =>  "Your pre-registration is successful. A message has been 
                            sent to your email to proceed with your application"
        ];

        return redirect()->back()->with($data);
    }
}
