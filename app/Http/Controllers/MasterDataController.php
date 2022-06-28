<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\Isotank;
use App\Models\Transport;
use App\Models\Locations;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Str;

use DB;

use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MasterDataController extends Controller
{    
    public function dataCustomer(){
        $cust = Customers::all('id', 'code', 'customername', 'aktif');
        return view('partial.master.data-customer', compact('cust'))->with('i');
    }

    public function storedataCustomer(Request $req){
        $lastest = Customers::latest('id')->first();

        $data = new Customers;
        $data->code = 'CUST-'.str_pad($lastest->id + 1, 4, '0', STR_PAD_LEFT);
        $data->customername = $req->customer;
        $data->aktif = $req->aktif;
        $data->createdBy = Auth::user()->name;
        $data->save();

        return redirect()->route('masterdata.customer')->with('success','Customer Berhasil Di Buat.');
        }

    public function updatedataCustomer(Request $req, $id){
        $data = Customers::find($id);
        $data->code = $req->code;
        $data->customername = $req->customer;
        $data->aktif = $req->aktif;
        $data->update();

        return redirect()->route('masterdata.customer')->with('success','Data Customer Berhasil Di Update.');
        }        

    public function deletedataCustomer($id){
        $data = Customers::find($id);
        $data->delete();
    
        return redirect()->route('masterdata.customer')->with('success','Data Customer Berhasil Di Hapus.');
    }   
    
    public function dataIsotank(){
        $data = Isotank::all('id', 'code', 'plat_no', 'status');
        return view('partial.master.data-isotank', compact('data'))->with('i');
    }

    public function storedataIsotank(Request $req){
        $data = new Isotank;
        $data->code = $req->code;
        $data->plat_no = $req->plat_no;
        $data->status = $req->status;
        $data->createdBy = Auth::user()->name;
        $data->save();

        return redirect()->route('masterdata.isotank')->with('success','Customer Berhasil Di Buat.');
        }

    public function updatedataIsotank(Request $req, $id){
        $data = Isotank::find($id);
        $data->code = $req->code;
        $data->plat_no = $req->plat_no;
        $data->status = $req->status;
        $data->update();

        return redirect()->route('masterdata.isotank')->with('success','Data Customer Berhasil Di Update.');
        }        

    public function deletedataIsotank($id){
        $data = Isotank::find($id);
        $check = DB::select('SELECT t.id FROM isotanks s JOIN tr_isotank t ON s.id = t.iso_id WHERE s.id = (?)',array($id));
        if ($check == NULL) {
            $data->delete();
            return redirect()->route('masterdata.isotank')->with('success','Data Customer Berhasil Di Hapus.');
        }
        return redirect()->route('masterdata.isotank')->with('Gagal','Isotank telah digunakan.');
    }

    public function dataLocation(){
        $loc = DB::select('SELECT id, code, SUBSTRING(NAME, 6, LENGTH(NAME)) name FROM location');
        return view('partial.master.data-location', compact('loc'))->with('i');
    }

    public function storedataLocation(Request $req){
        $data = new Locations;
        $data->code = $req->code;
        $data->name = $req->code.' - '.$req->name;
        $data->createdBy = Auth::user()->name;
        $data->save();

        return redirect()->route('masterdata.location')->with('success','Customer Berhasil Di Buat.');
        }

    public function updatedataLocation(Request $req, $id){
        $data = Locations::find($id);
        $data->code = $req->code;
        $data->name = $req->code.' - '.$req->name;
        $data->modifyBy = Auth::user()->name;
        $data->update();

        return redirect()->route('masterdata.location')->with('success','Data Customer Berhasil Di Update.');
        }        

    public function deletedataLocation($id){
        $data = Locations::find($id);
        $data->delete();
        return redirect()->route('masterdata.location')->with('success','Isotank telah digunakan.');
    }


    public function dataTransport(){
        $tra = Transport::all('id', 'code', 'name');
        return view('partial.master.data-transport', compact('tra'))->with('i');
    }

    public function storedataTransport(Request $req){
        $data = new Transport;
        $data->code = $req->code;
        $data->name = $req->name;
        $data->save();

        return redirect()->route('masterdata.transport')->with('success','Customer Berhasil Di Buat.');
        }

    public function updatedataTransport(Request $req, $id){
        $data = Transport::find($id);
        $data->code = $req->code;
        $data->name = $req->name;
        $data->update();

        return redirect()->route('masterdata.transport')->with('success','Data Customer Berhasil Di Update.');
        }        

    public function deletedataTransport($id){
        $data = Transport::find($id);
        $data->delete();
        return redirect()->route('masterdata.transport')->with('success','Isotank telah digunakan.');
    }

    public function dataUser(){
        if ($this->isAdmin()) {
            $data = Users::all('id', 'name', 'username', 'email', 'password', 'role', 'NA', 'changepass', 'dept')->sortByDesc('NA');
            return view('partial.master.data-user', compact('data'))->with('i');
        } else {
            return view('partial.error.404');
        }
    }

    public function storedataUser(Request $req){
        $token_ = Str::random(17);
        $data = new Users;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->role = $req->role;
        $data->NA = 2;
        $data->token = $token_;
        $data->dept = $req->dept;
        $data->expire_date = Carbon::now()->addDays(2);
        $data->save();
        
        $enk = Crypt::encrypt($token_ . $req->email);
        $this->sentEmail($req->email, $enk, 'Email ini dari aplikasi CIMI-APPS','Silahkan klik link dibawah ini untuk melakukan pendaftaran','apps.cakraindo.com/register/user/'.$enk);

        return redirect()->route('masterdata.user')->with('success','Customer Berhasil Di Buat.');
        }

    public function updatedataUser(Request $req, $id){
        $data = Users::find($id);
        $data->name = $req->name;
        $data->username = $req->username;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->role = $req->role;
        $data->NA = $req->NA;
        $data->dept = $req->dept;
        $data->update();

        return redirect()->route('masterdata.user')->with('success','Data Customer Berhasil Di Update.');
    }        

    public function deletedataUser($id){
        $data = Users::find($id);
        $data->delete();
        return redirect()->route('masterdata.user')->with('success','Isotank telah digunakan.');
    }

    public function updatedatauserbyemail($id){
        $data = Users::find($id);
        $token = Crypt::encrypt($id .'/'. $data->token);
        $data->changepass = 1;
        $data->update();

        $this->sentEmail($data->email, $token, 'Email ini dari aplikasi CIMI-APPS','Silahkan klik link dibawah ini untuk mengatur ulang password','apps.cakraindo.com/master/data/password/update/'.$token);

        return redirect()->route('masterdata.user')->with('success','Customer Berhasil Di Buat.');
    }

    public function updatedatauserbyemail_set($token){
        $denk = Crypt::decrypt($token);
        $id = strstr($denk, '/', true);
        $user = Users::find($id);

        return view('partial.portal.updatepass', compact('user'));
    }

    public function updatedatauserbyemail_done(Request $req, $id){
        $data = Users::find($id);
        $data->password = $req->password;
        $data->token = Str::random(17);
        $data->changepass = 0;
        $data->update();

        return redirect()->route('Logout');
    } 

    public function sentEmail($email, $enk, $title, $body, $link){
        $details = [
            'title' => $title,
            'body' => $body,
            'link' =>  $link
        ];
    
        \Mail::to($email)->send(new \App\Mail\SupportMail($details));
    }

    public function dataview(){
        $data = Users::all('id', 'name', 'username', 'email', 'password', 'role', 'NA', 'changepass')->sortByDesc('NA');
        return view('partial.master.data-user', compact('data'))->with('i');
    }

    public function otoritas(){
        if ($this->isAdmin()) {
            $user = Users::all('id', 'name', 'role');
            $menu = DB::select('SELECT * from menu');
            $menus_det = DB::select('SELECT * FROM menu_users');
            return view('partial.master.otoritas', compact('menus_det', 'menu', 'user'))->with('i');
        } else {
            return view('partial.error.404');
        }
        
    }

    public function otoritasUpdate(Request $request){
        if ($this->isAdmin()) {
            $data = $request->all();
            $b = false;

            // Delete All rows
            DB::select('TRUNCATE TABLE menu_users');
            foreach ($data as $key => $value) {
                if(!$b) { 
                    $b = true;
                    continue;
                    }
                
                if ($value = 'on') {
                    DB::table('menu_users')->insert(array('id_user'=>strtok($key, '-'), 'id_menu'=>substr($key, strpos($key, "-") + 1)));
                    continue;
                    }
                return $value;
            }
            return redirect()->route('masterdata.otoritas')->with('success','Customer Berhasil Di Buat.');
        } else {
            return view('partial.error.404');
        }
    }

    public function isAdmin(){
        if (Auth::user()->role == 'Administrator') {
            return true;
        }
    }
}
