<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Professional;
use App\Http\Classes\Section;

class ProfessionalController extends Controller
{
    //

    private $section;
    private $isfilled;

    public function __construct(){
        $this->section = "B";
        $this->isfilled = false;
    }

    public function professional()
    {
        $user = Auth::user();
        //dd($user);

        $professionalExist = Professional::where('user_id', auth()->user()->id)->exists();
        $this->isfilled = Section::sectionFilledState($user->id);


        $professional = '';
        
        if ($professionalExist){
            $professional = Professional::where('user_id', auth()->user()->id)->first();
        }else{
            $professional = new Professional([
                'profession' => '',
                'educational_level' => '',
                'qualification' => ''
            ]);
        }   

        return view('application.professional')->with(['section' => $this->section, 
                                                       'user'=> $user,
                                                       'professional' => $professional,
                                                       'isfilled' => $this->isfilled]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'profession' => ['required'],
            'educational_level' => ['required'],
            'qualification' => ['required']
        ]);


        $professionalExist = Professional::where('user_id', auth()->user()->id)->exists();
        $this->isfilled = $professionalExist;

        $professional = '';
        $data = '';
        
        if ($professionalExist){
            // Record exist, update record
            $professional = Professional::where('user_id', auth()->user()->id)->first();
            $op_status = $professional->update($formFields);

            if (!$op_status){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating your Professional Information'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Your Professional Information is successfully updated'
                ];

            }

        }else{
            // Record does not exist, create record
            $formFields['user_id'] = auth()->user()->id;
            $op_status = Professional::create($formFields);

            if (!$op_status){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred saving your Professional Information'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Your Professional Information is successfully saved.'
                ];
            }
        }   

        return redirect()->back()->with($data);
        
    }
}
