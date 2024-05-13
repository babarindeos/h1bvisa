<?php 
    namespace App\Http\Interfaces;

    interface SectionFilledInterface{
        public static function sectionFilledState($user_id);

        public static function applicationCompletion($user_id);
    }