<?php

namespace App\Http\Controllers;

use App\Models\Isotank;
use App\Models\Transport;
use App\Models\Locations;
use App\Models\Trans_Isotank;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\Laporan_Penjadwalan;
use Illuminate\Support\Facades\Crypt;
use Redirect;

use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DB, Datetime; 
use Illuminate\Support\Facades\Auth;

class IsotankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iso = DB::select('select * from v_isotanks_list ORDER BY transnumber DESC, v_transnumber DESC');
        $today = Carbon::now();
        return view('partial.barang.isotank.view', compact('iso','today'));
    }

    public function fecthIsotankMonth($id){
        $a['Month'] = DB::select('CALL pr_GetisotankEach(?)', array($id));
        echo json_encode($a);        
        exit;
    }

    public function FecthIsotank_View(){
        $a['Isotank'] = DB::select('select * from v_isotanks');
        echo json_encode($a);
        exit;
    }
    public function loadlocation(){
        echo json_encode(Locations::pluck('id', 'name'));
        exit;
    }
    public function loadtransport(){
        echo json_encode(Transport::pluck('id', 'name'));
        exit;
    }

    public function loadExternal(){
        $loc['Loc'] = Locations::pluck('id', 'name');
        $cust['Cust'] = Customers::pluck('id', 'customername');
        $tra['Tra'] = Transport::pluck('id', 'name');
        array_push($data['Data'], $loc);
        exit;
    }

    public function checkIsotank($start, $end, $loc){
        $a = DB::select('CALL pr_GetContainers(?,?,?)', array($start, $end, $loc));
        echo json_encode($a);        
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loc = Locations::all('id', 'name as code')->toJson();
        $cust = Customers::all('id', 'customername as code')->toJson();
        $tra = Transport::all('id', 'name as code')->toJson();

        return view('partial.barang.isotank.add', compact('loc','cust', 'tra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if ($this->check($request->isotank, $request->outdepo, $request->indepo) == NULL) {
             // Addtitional
            $year = new Carbon(new DateTime($request->SD));
            $counter = $this->createCounter($year->format('Y'));
            $uid = Str::random(17);

            //Store Data as Trans
            $iso = new Trans_Isotank;
            $iso->transnumber = 'ISO/'.str_pad($counter, 4, '0', STR_PAD_LEFT).'/'.$year->format('y');
            $iso->counter = $counter;
            $iso->packinglist_no = $request->PL;
            $iso->ori_id = $request->origin;
            $iso->des_id = $request->destinasi;
            $iso->tgl_outdepo = $request->outdepo;
            $iso->tgl_indepo = $request->indepo;
            $iso->iso_id = $request->isotank;
            $iso->cust_id = $request->customer;
            $iso->lokasi_bongkar = $request->bongkar;
            $iso->lokasi_loading = $request->loading;
            $iso->transport_id = $request->transport;
            $iso->cargo = $request->cargo;
            $iso->partai = ($request->nopartai == NULL or $request->nopartai == "" ) ? 1 : $request->nopartai;
            $iso->jlh_Partai = $request->jlhpartai;
            $iso->tgl_indepo_real = $request->tgl_indepo_real;
            $iso->transport_no = $request->notransport;
            $iso->tgl_muat = $request->tgl_muat;
            $iso->tgl_ETD = $request->tgl_etd;
            $iso->tgl_ETA = $request->tgl_eta;
            $iso->tgl_bongkar = $request->tgl_bongkar;
            $iso->deskripsi = $request->remark;
            $iso->createdBy = Auth::user()->name;
            $iso->uid = $uid;
            $iso->save();

            if ($request->duplicate == 'on') {
                return $this->duplicateSetValue(encrypt($uid))->with('duplicate', '-');;
            }
            
            return redirect()->route('isotank.index')->with('success', '-');

        } else {
            return redirect()
                        ->back()
                        ->with('error', '-');   
        }
    }

    public function checkPList($PL){
        $PList = str_replace('+', '/', $PL);

        // Check if packing list exists
        $validator = Trans_Isotank::where('packinglist_no', '=', $PList)->first();
        $flag = $validator <> NULL ? 'Ada' : 'Kosong';
        echo ($flag);  
        exit;
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Isotank  $isotank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('partial.barang.isotank.viewdet');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Isotank  $isotank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $iso = DB::select('call pr_Gettrans_Edit(?)', array(Crypt::decrypt($id)));
            $loc = Locations::all('id', 'name as code');
            $tra = Transport::all('id', 'name as code');
            $cust = Customers::all('id', 'customername as code')->toJson();
            return view('partial.barang.isotank.edit', compact('iso','loc','cust', 'tra')); 
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Isotank  $isotank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Isotank $iso)
    {
        
    }

    public function updateModify(Request $request, $id)
    {
        $Utrans = Trans_Isotank::find($id);
        $Utrans->tgl_outdepo = $request->outdepo;
        $Utrans->tgl_indepo = $request->indepo;
        $Utrans->lokasi_bongkar = $request->bongkar;
        $Utrans->lokasi_loading = $request->loading;
        $Utrans->transport_id = $request->transport;
        $Utrans->cargo = $request->cargo;
        $Utrans->tgl_indepo_real = $request->tgl_indepo_real;
        $Utrans->transport_no = $request->notransport;
        $Utrans->tgl_muat = $request->tgl_muat;
        $Utrans->tgl_ETD = $request->tgl_etd_;
        $Utrans->tgl_ETA = $request->tgl_eta_;
        $Utrans->tgl_bongkar = $request->tgl_bongkar;
        $Utrans->deskripsi = $request->remark;
        $Utrans->update_date = Carbon::now();
        $Utrans->updateBy = Auth::user()->name;
        $Utrans->update();

        DB::table('tr_isotank')->where('packinglist_no', $Utrans->packinglist_no)->update(['jlh_Partai' => $request->jlhpartai, 'packinglist_no' => $request->PL]);
        return redirect()->route('isotank.modify', Crypt::encrypt($id));
    }

    public function updateModal(Request $request, $id)
    {
        $Utrans =Trans_Isotank::find($id);
        $Utrans->tgl_indepo_real = $request->tgl_indepo_real;
        $Utrans->transport_no = $request->notransport;
        $Utrans->tgl_muat = $request->tgl_muat;
        $Utrans->tgl_ETD = $request->tgl_etd;
        $Utrans->tgl_ETA = $request->tgl_eta;
        $Utrans->tgl_bongkar = $request->tgl_bongkar;
        $Utrans->update();

        return redirect()->route('isotank.index');
    }

    public function duplicateSetValue($uid)
    {
        $iso = DB::select('call pr_Gettrans_Dup(?)', array(Crypt::decrypt($uid)));
        $loc = Locations::all('id', 'name as code');
        $tra = Transport::all('id', 'name as code');

        return view('partial.barang.isotank.duplicate', compact('iso','loc', 'tra'))->with('success', 'Isotank Berhasil di Jadwalkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Isotank  $isotank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Isotank $isotank)
    {
        //
    }

    public function createCounter($start)
    {   
        // dd(DB::select('CALL pr_GetCounter(?)',array($start)), $start);
        return (DB::select('CALL pr_GetCounter(?)',array($start)) != NULL) ? (Trans_Isotank::latest('counter')->first()->counter) + 1 : 1 ;
    }

    public function transaksiIsotank(){
        $iso = DB::select('select * from v_trans_isotanks');
        return view('partial.barang.isotank.view_trans', compact('iso'));
    }

    public function transaksiIsotankDetail($packinglist){
        // $PL = Crypt::decrypt($packinglist);
        $iso = DB::select('select * from v_trans_isotanks_det where packinglist_no = ?', array(Crypt::decrypt($packinglist)));
        return view('partial.barang.isotank.view_trans_det', compact('iso'));
    }

    public function exportTransaksiIsotank(){
        return Excel::download(new Laporan_Penjadwalan, 'Laporan-Penjadwalan.xlsx');
    }

    public function void(Request $req, $id){
        $Utrans =Trans_Isotank::find($id);
        $Utrans->void = 'Y';
        $Utrans->void_date = Carbon::now();
        $Utrans->void_reason = $req->void_reason;
        $Utrans->update();

        return redirect()->route('isotank.index');
    }

    public function check($iso, $first, $second){
        return DB::select("SELECT transnumber FROM tr_isotank WHERE iso_id = '".$iso."' AND tgl_outdepo BETWEEN '".$first."' AND '".$second."' AND CASE WHEN tgl_indepo_real IS NULL then tgl_indepo BETWEEN '".$first."' AND '".$second."' ELSE tgl_indepo_real NOT BETWEEN '".$first."' AND '".$second."' END");
    }
}
