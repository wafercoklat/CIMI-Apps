<?php
    namespace App\Helpers;
    use DB;
    use Illuminate\Support\Facades\Auth;
    
    class _Menus {
        public static function menu(){
            return Auth::user()->role == 'Administrator' ? DB::select('SELECT * FROM v_allmenus') : DB::select('CALL pr_Menus_main('.Auth::user()->id.')');
        }

        public static function sub_menu(){
            return Auth::user()->role == 'Administrator' ? DB::select('SELECT m.menu, m.sub_menu, m.link FROM menu m') : DB::select('CALL pr_Menus_sub('.Auth::user()->id.')');;
        }
    }
    
?>