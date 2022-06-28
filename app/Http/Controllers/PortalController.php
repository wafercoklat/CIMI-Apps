<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use App\Models\Users;
use App\Models\LoginInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) { 
            //login Success
            $data = DB::select('SELECT m.menu FROM menu_users mu LEFT JOIN menu m ON m.id = mu.id_menu WHERE mu.id_user ='.Auth::user()->id.' GROUP BY m.menu LIMIT 1');
            if ($data <> NULL) {
                if (Auth::user()->role == 'Administrator') { return redirect()->route('dashboard.index');};
                    if ($data[0]->menu == 'Dashboard') { return redirect()->route('dashboard.index');};
                    if ($data[0]->menu == 'Isotank') { return redirect()->route('isotank.index');};
                    if ($data[0]->menu == 'Revisi') { return redirect()->route('dashboard.index');};
                    if ($data[0]->menu == 'Karyawan') { return redirect()->route('karyawan.index');};
                    if ($data[0]->menu == 'Master') { return redirect()->route('masterdata.isotank');};
            } else {
                return view('partial.error.353');
            }
        } 
        $info = LoginInfo::first();
        return view('partial.portal.login', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create login Connection
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loginBase()
    {
        return redirect()->route('login.index');
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login.index');
    }

    public function login(Request $request)
    {
            // Check to database
            $user = Users::where(['username' => $request->username,'password' => $request->password, 'NA' => 1])->first();

            if($user){
                Auth::loginUsingId($user->id);
                $request->session()->regenerate();
                return Redirect::intended();  //redirect()->route('isotank.index');
            } else {
                $e = Users::select('NA','username')->where(['username' => $request->username])->first();
                if($e == NULL) { $error = 'User tidak ada';} elseif ($e->NA == 0){ $error = 'User tidak aktif';} else {$error = 'Password yang diinput salah';};
                Session::flash('error',  $error);
                return redirect()->route('login.index');
            }
    }

    public function register($token)
    {
        $denk = Crypt::decrypt($token);
        $token = substr($denk, 0, 17);
        
        $user = Users::select('id', 'name', 'username', 'email', 'password', 'role', 'NA', 'expire_date')
            ->where('token', substr($denk, 0, 17))->first();

        if ($user == NULL or ($user->expire_date < Carbon::now() and $user->NA == 2)) {
            return view('partial.error.404');
        }
        return view('partial.portal.register', compact('user'));
    }

    public function storeRegisterUser(Request $req, Users $data, $id)
    {
        $data = Users::find($id);
        $data->name = ucfirst($req->name);
        $data->username = $req->username;
        $data->password = $req->password;
        $data->NA = 1;
        $data->token = Str::random(15);
        $data->update();
        
        return redirect()->route('login.index');
    }

}
