<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Personal;
use App\Http\Classes\Section;

class PersonalController extends Controller
{
    //
    private $section;
    private $isfilled;
    

    public function __construct(){
        $this->section = "A";
        
        
    }

    public function personal(){
        $user = Auth::user();
        //dd($user);

        $personalExist = Personal::where('user_id', auth()->user()->id)->exists();
        $this->isfilled = Section::sectionFilledState($user->id);

        
          

        if ($personalExist){
            $personal = Personal::where('user_id', auth()->user()->id)->first();
        }else{
            $personal = new Personal([
                'gender' => '',
                'marital_status' => '',
                'nationality' => '',
                'state' => '',
                'dob_day' => '',
                'dob_month' => '',
                'dob_year' => ''
            ]);
        }

        //dd($personal);

        return view('application.personal')->with(['section' => $this->section, 
                                                    'user'=> $user, 
                                                    'personal'=>$personal,
                                                    'isfilled' => $this->isfilled]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'gender' => 'required',
            'marital_status' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'dob_day' => 'required',
            'dob_month' => 'required',
            'dob_year' => 'required'
        ]);

        //dd($formFields);
        
        

        $personalExist = Personal::where('user_id', auth()->user()->id)->exists();

        $data = '';

        if ($personalExist){
            // Record exist. Update record into database
            $personal = Personal::where('user_id', auth()->user()->id)->first();
            
            $op_status = $personal->update($formFields);

            if (!$op_status){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error has occurred updating your Personal Information'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Your Personal Information has been successfully updated'
                ];
            }

        }else{
            // Record does not exist. Insert record into database 
            $formFields['user_id'] = auth()->user()->id;
            $op_status = Personal::create($formFields);

            if (!$op_status){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error has occurred saving the Personal Information'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Your Personal Information has been successfully created'
                ];
            }
        }

        

       

        return redirect()->back()->with($data);

    }
}
