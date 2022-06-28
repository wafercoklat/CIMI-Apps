<?php
    namespace App\Helpers;
    use Carbon\Carbon;

    trait _Greetings {
        public static function sayHai() {
            $time  = (int)Carbon::now()->timezone('Asia/Phnom_Penh')->format('H');
            $greets = (($time <= 10) ? 'pagi' : (($time > 10 and $time < 15) ? 'siang' : (($time > 14 and $time < 18) ? 'sore' : 'malam')));
            return $greets;
        }
    }
?>