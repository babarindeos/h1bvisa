<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Signature;
use App\Http\Classes\Section;

class SignatureController extends Controller
{
    //
    private $section;
    private $isfilled;

    public function __construct(){
        $this->section = "F";
        $this->isfilled = false;
    }

    public function signature()
    {
        $user = Auth::user();
        //dd($user);

        $signatureExist = Signature::where('user_id', auth()->user()->id)->exists();
        $this->isfilled = Section::sectionFilledState($user->id);

        if ($signatureExist){
            $signature = Signature::where('user_id', auth()->user()->id)->first();

        }else{
            $signature = new Signature([
                'signature' => ''
            ]);
        }

        return view('application.signature')->with(['section' => $this->section, 
                                                    'user'=> $user,
                                                    'signature' => $signature,
                                                    'isfilled' => $this->isfilled
                                                    ]);
    }


    public function store(Request $request){
        $formFields = $request->validate([
            'signature' => 'required'
        ]);

       

        if ($request->hasFile('signature')){
            $signature = $request->file('signature');

            $surname = strtolower(auth()->user()->surname);
            $firstname = strtolower(auth()->user()->firstname);
            $filename = $surname.$firstname.auth()->user()->id.".";

            $signature_new_name = $filename.$signature->getClientOriginalExtension();

            $signature->move('signature', $signature_new_name);

            $formFields['signature'] = "signature/".$signature_new_name;
            $formFields['user_id'] = auth()->user()->id;

            $signatureExist = Signature::where('user_id', auth()->user()->id)->exists();

            if ($signatureExist){
                // update
                $signature = Signature::where('user_id', auth()->user()->id)->first();
                $op_status = $signature->update($formFields);

                if (!$op_status){
                    $data = [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'An error occurred updating your Signature'
                    ];
                }else{
                    $data = [
                        'error' => true,
                        'status' => 'success',
                        'message' => 'Your Signature is successfully updated'
                    ];
                }
            
            }else{
                // save
                $op_status = Signature::create($formFields);

                if (!$op_status){
                    $data = [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'An error occurred updating your Signature'
                    ];
                }else{
                    $data = [
                        'error' => true,
                        'status' => 'success',
                        'message' => 'Your Signature is successfully saved'
                    ];
                }

                
            }
                return redirect()->back()->with($data);
                
        }

        return redirect()->back();

       

    }
}
