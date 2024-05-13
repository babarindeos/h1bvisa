<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Passport;
use App\Http\Classes\Section;
use App\Models\ApplicationCompletion;
use App\Models\Personal;
use App\Models\Professional;

class PassportController extends Controller
{
    //
    private $section;
    private $isfilled;

    public function __construct(){     

        $this->section = "C";
        $this->isfilled = false;
    }

    public function passport()
    {

        //------ check if application has been completed by the user
        $isCompleted = Section::applicationCompletion(auth()->user()->id);
    
        if ($isCompleted){
            return redirect()->route('application.completed');
        }else{
            // check if the previous section has been filled
            $isPersonalFilled = Personal::where('user_id', auth()->user()->id)->exists();
            $isProfessionalFilled = Professional::where('user_id', auth()->user()->id)->exists();
            
            if (!$isPersonalFilled){
                return redirect()->route('application.personal');
            }

            if (!$isProfessionalFilled){
                return redirect()->route('application.professional');
            }
        }



        $user = Auth::user();
        //dd($user);
        $passportExist = Passport::where('user_id', auth()->user()->id)->exists();
        $this->isfilled = Section::sectionFilledState($user->id);

        $passport = '';
        if($passportExist){
            $passport = Passport::where('user_id', auth()->user()->id)->first();
        }else{
            $passport = new Passport([
                'passport_no' => '',
                'issued_date' => '',
                'issued_month' => '',
                'issued_year' => '',
                'data_page' => ''
            ]);
        }

        return view('application.passport')->with(['section' => $this->section, 
                                                   'user'=> $user,
                                                   'passport' => $passport,
                                                   'isfilled' => $this->isfilled]);
    }


    public function store(Request $request){
        $formFields = $request->validate([
            'passport_no' => ['required'],
            'issued_day' => 'required',
            'issued_month' => 'required',
            'issued_year' => 'required'
        ]);

       

        if ($request->hasFile('data_page')){
            $data_page = $request->file('data_page');

            $surname = strtolower(auth()->user()->surname);
            $firstname = strtolower(auth()->user()->firstname);
            $filename = $surname.$firstname.auth()->user()->id.".";


            $data_page_new_name = $filename.$data_page->getClientOriginalExtension();
            $data_page->move('passport', $data_page_new_name);
            $formFields['data_page'] = 'passport/'.$data_page_new_name;
        }

        $passportExist = Passport::where('user_id', auth()->user()->id)->exists();

        $passport = '';
        $data = '';

        if ($passportExist){
            // Passport already exist, do an update
            $passport = Passport::where('user_id', auth()->user()->id)->first();
            $op_status = $passport->update($formFields);

            if (!$op_status){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating your Passport Information'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Your Passort Information has been successfully updated'
                ];
            }

        }else{
            // Passport does not exist, create a record
            $formFields['user_id'] = auth()->user()->id;

            $op_status = Passport::create($formFields);

            if (!$op_status){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred saving your Passport Information'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Your Passport Information has been successfully saved.'
                ];
            }

        }       

        return redirect()->back()->with($data);

    }
}
