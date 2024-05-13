<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Classes\Section;
use App\Models\Payment;
use App\Models\ApplicationCompletion;
use App\Models\Personal;
use App\Models\Professional;
use App\Models\Passport;

class PaymentController extends Controller
{
    //
    private $section;
    private $isfilled;

    public function __construct(){
        $this->section = "D";
        $this->isfilled = false;
    }

    public function payment()
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
            
            if (!$isPersonalFilled){
                return redirect()->route('application.personal');
            }

            if (!$isProfessionalFilled){
                return redirect()->route('application.professional');
            }

            if (!$isPassportFilled){
                return redirect()->route('application.passport');
            }
        }


        $user = Auth::user();
        //dd($user);

        $paymentExist = Payment::where('user_id', auth()->user()->id)->exists();
        $this->isfilled = Section::sectionFilledState($user->id);

        $payment = '';
        if ($paymentExist){
            $payment = Payment::where('user_id', auth()->user()->id)->first();
        }else{
            $payment = new Payment([
                'user_id' => '',
                'payment_mode' => '',
                'receipt' => '',
                'account_name' => '',
                'bank_name' => '',
                'account_number' => '',
                'reference' => ''
            ]);
        }



        return view('application.payment')->with(['section' => $this->section, 
                                                  'user'=> $user,
                                                  'payment' => $payment,
                                                  'isfilled'=>$this->isfilled]);
    }

    public function store(Request $request)
    {

        $paymentExist = Payment::where('user_id', auth()->user()->id)->exists();

        if ($request->input('payment_mode')=='offline'){
            
            if ($paymentExist){
                //Record already exist. Update
                $formfields = $request->validate([
                    'payment_mode' => 'required',
                    'account_name' => ['required'],
                    'account_number' => ['required'],
                    'bank_name' => ['required']                    
                ]);
            } else{
                // Record do not exist. Create
                    $formfields = $request->validate([
                        'payment_mode' => 'required',
                        'account_name' => ['required'],
                        'account_number' => ['required'],
                        'bank_name' => ['required'],
                        'receipt' => ['required', 'file']
                    ]);
            }
            

            if ($request->hasFile('receipt')){
                $filename = strtolower(auth()->user()->surname).strtolower(auth()->user()->firstname).auth()->user()->id.".";
                
    
                $receipt = $request->file('receipt');
                
                $receipt_new_name = $filename.$receipt->getClientOriginalExtension();
                $receipt->move('payment', $receipt_new_name);
    
                $formfields['receipt'] = 'payment/'.$receipt_new_name;
            }


            if ($paymentExist){
                // update
                $payment = Payment::where('user_id', auth()->user()->id)->first();
                $op_status = $payment->update($formfields);
    
                if (!$op_status){
                    $data = [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'An error occurred updating your Payment Information'
                    ];
                }else{
                    $data = [
                        'error' => true,
                        'status' => 'success',
                        'message' => 'Your Payment Information has been successfully updated'
                    ];
                }
    
            }else{
                // save
                $formfields['user_id'] = auth()->user()->id;
    
                
                $op_status = Payment::create($formfields);
    
                if (!$op_status){
                    $data =  [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'An error occurred saving your Payment Information'
                    ];
                }else{
                    $data = [
                        'error' => true,
                        'status' => 'success',
                        'message' => 'Your Payment Information has been successfully saved.'
                    ];
                }
            }
    
            return redirect()->back()->with($data);


    
        }else{
            return redirect()->back();
        }
        
       
        

        
        
        
    }
}
