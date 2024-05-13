<?php
    namespace App\Http\Classes;

    use App\Http\Interfaces\SectionFilledInterface;

    use App\Models\Personal;
    use App\Models\Professional;
    use App\Models\Passport;
    use App\Models\Payment;
    use App\Models\Photograph;
    use App\Models\Signature;
    use App\Models\ApplicationCompletion;
    

    class Section implements SectionFilledInterface{


        public static function sectionFilledState($user_id){

            $personal = Personal::where('user_id', $user_id)->exists();
            $professional = Professional::where('user_id', $user_id)->exists();
            $passport = Passport::where('user_id', $user_id)->exists();
            $payment = Payment::where('user_id', $user_id)->exists();
            $photograph = Photograph::where('user_id', $user_id)->exists();
            $signature = Signature::where('user_id', $user_id)->exists();

            $data = [
                'personal' => $personal,
                'professional' =>$professional,
                'passport' => $passport,
                'payment' => $payment,
                'photograph' => $photograph,
                'signature' => $signature               
            ];

            $dataObj = new Data($personal, $professional, $passport, $payment, $photograph, $signature);

            
            return $dataObj;
        }

        public static function applicationCompletion($user_id){
            $isCompleted = ApplicationCompletion::where('user_id', $user_id)->exists();
            return $isCompleted;
        }


    }


    class Data{
        public $personal;
        public $professional;
        public $passport;
        public $payment;
        public $photograph;
        public $signature;

        public function __construct($personal, $professional, $passport, $payment, $photograph, $signature){
            $this->personal = $personal;
            $this->professional = $professional;
            $this->passport = $passport;
            $this->payment = $payment;
            $this->photograph = $photograph;
            $this->signature = $signature;
        }
    }
    
