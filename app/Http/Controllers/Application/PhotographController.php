<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Classes\Section;
use App\Models\Photograph;
use App\Models\ApplicationCompletion;
use App\Models\Personal;
use App\Models\Professional;
use App\Models\Passport;
use App\Models\Payment;

class PhotographController extends Controller
{
    //
    private $section;
    private $isfilled;

    public function __construct(){
        $this->section = "E";
        $this->isfilled  = false;
    }

    public function photograph()
    {
        //------ check if application has been completed by the user
        $isCompleted = Section::applicationCompletion(auth()->user()->id);
        if ($isCompleted){
            return redirect()->route('application.completed');
        }else{
            // check if the previous section has been filled
            $isPersonalFilled = Personal::where('user_id', auth()->user()->id)->exists();
            $isProfessionalFilled = Professional::where('user_id', auth()->user()->id)->exists();
            $isPassportFilled = Passport::where('user_id', auth()->user()->id)->exists();
            $isPaymentFilled = Payment::where('user_id', auth()->user()->id)->exists();
            
            if (!$isPersonalFilled){
                return redirect()->route('application.personal');
            }

            if (!$isProfessionalFilled){
                return redirect()->route('application.professional');
            }

            if (!$isPassportFilled){
                return redirect()->route('application.passport');
            }

            if (!$isPaymentFilled){
                return redirect()->route('application.payment');
            }
        }






        $user = Auth::user();
        //dd($user);
        $photographExist = Photograph::where('user_id', auth()->user()->id)->first();
        $this->isfilled = Section::sectionFilledState($user->id);

        if ($photographExist){
            $photograph = Photograph::where('user_id', auth()->user()->id)->first();
        }else{
            $photograph = new Photograph([
                'photo' => ''                
            ]);
        }

        return view('application.photograph')->with(['section' => $this->section, 
                                                     'user'=> $user,
                                                     'photograph' => $photograph,
                                                     'isfilled' => $this->isfilled
                                                    ]);
    }


    public function store(Request $request){


        $formFields = $request->validate([
            'photo' => 'required'
        ]);

        if ($request->hasFile('photo')){

            $photo = $request->file('photo');

            $surname = strtolower(auth()->user()->surname);
            $firstname = strtolower(auth()->user()->firstname);
            $filename = $surname.$firstname.auth()->user()->id.".";

            $photo_new_name = $filename.$photo->getClientOriginalExtension();

            $photo->move('photograph', $photo_new_name);

            $formFields['photo'] = 'photograph/'.$photo_new_name;
            $formFields['user_id'] = auth()->user()->id;

            $photographExist = Photograph::where('user_id', auth()->user()->id)->exists();

            if ($photographExist){
                // update
                    $photograph = Photograph::where('user_id', auth()->user()->id)->first();
                    $op_status = $photograph->update($formFields);

                    if (!$op_status){
                        $data =  [
                            'error' => true,
                            'status' => 'fail',
                            'message' => 'An error occurred updating your Photograph'
                        ];
                    }else{
                        $data = [
                            'error' => true,
                            'status' => 'success',
                            'message' => 'Your Photograph has been successfully updated'
                        ];
                    }

            }else{
                    // save
                    $op_status = Photograph::create($formFields);

                    if (!$op_status){
                        $data =  [
                            'error' => true,
                            'status' => 'fail',
                            'message' => 'An error occurred saving your Photograph'
                        ];
                    }else{
                        $data = [
                            'error' => true,
                            'status' => 'success',
                            'message' => 'Your Photograph has been successfully saved'
                        ];
                    }

            }
            
            return redirect()->back()->with($data);
            
        }


        return redirect()->back();

    }
}
