<?php

namespace App\Http\Controllers;

use DB, Datetime; 
use Carbon\Carbon;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\KaryawanCuti;
use App\Models\KaryawanIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->name;
        if (Auth::user()->role == 'Administrator') {
            $data = DB::select("select * from v_karyawan_forms");
        }else if (Auth::user()->role == 'Approver' || Auth::user()->role == 'Validator' ) {
            $data = DB::select("CALL pr_KaryawanForms_all('".Auth::user()->cabang."')");
        } else { 
            $data = DB::select("CALL pr_KaryawanForms_get('".Auth::user()->name."')");
        };
        return view('partial.karyawan.allform', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }

    // public function formCuti()
    // {
    //     return view('partial.karyawan.cuti');
    // }

    // FORM CUTI =====================================================

    public function formCuti_print($id_k, $id_c)
    {
        $Kayr = Karyawan::select('id','no_form','void','approved','created_by','verif', 'verified_by', 'verified_by_id')->where('id', '=', Crypt::decrypt($id_k))->get();
        $Kayr_ct = DB::select('SELECT kc.id, id_form, kc.cuti_tahunan, kc.jabatan, kc.departement, kc.atasan, kc.cuti_diluar_tanggungan, kc.cuti_khusus, kc.total_cuti, kc.tgl_pengajuan_s, kc.tgl_pengajuan_e, kc.tgl_kembali_kerja, kc.alasan, kc.pengganti_pic, kc.jabatan_pic, kc.cuti_menikah_st, kc.cuti_menikah_en, kc.cuti_sblm_melahirkan_st, kc.cuti_sblm_melahirkan_en, kc.cuti_stlh_melahirkan_st, kc.cuti_stlh_melahirkan_en, kc.cuti_anak_st, kc.cuti_anak_en, kc.cuti_dukacita_st, kc.cuti_dukacita_en, kc.cuti_istri_st, kc.cuti_istri_en, us.id atasanid FROM karyawan_cuti kc LEFT JOIN users us ON us.name = kc.atasan where kc.id = '.Crypt::decrypt($id_c));
        return view('partial.export.form_cuti', compact('Kayr', 'Kayr_ct'));
    }

    public function formCuti_approval($id_k, $val, $id_c)
    {
        $karyawan = Karyawan::find(Crypt::decrypt($id_k));
        $karyawan->approved = Crypt::decrypt($val);
        $karyawan->approve_by = Auth::user()->name;
        $karyawan->approve_date = Carbon::now();
        $karyawan->update();
        return redirect()->route('karyawan.formcuti_view', [$id_k, $id_c]);
    }

    public function formCuti_verif($id_k, $val, $id_c)
    {
        $karyawan = Karyawan::find(Crypt::decrypt($id_k));
        $karyawan->verif = Crypt::decrypt($val);
        $karyawan->verifed_by = Auth::user()->name;
        $karyawan->verified_by_id = Auth::user()->id;
        $karyawan->verifed_date = Carbon::now();
        $karyawan->update();
        return redirect()->route('karyawan.formcuti_view', [$id_k, $id_c]);
    }

    public function formCuti_view($id_k, $id_c)
    {
        $Kayr = Karyawan::select('id','no_form','void','approved','created_by', 'verif')->where('id', '=', Crypt::decrypt($id_k))->get();
        $Kayr_ct = KaryawanCuti::where('id', '=', Crypt::decrypt($id_c))->get();
        return view('partial.karyawan.cuti-view', compact('Kayr', 'Kayr_ct'));
    }

    public function formCuti_edit($id_k, $id_c)
    {
        $Kayr = Karyawan::select('id','no_form','void','approved','created_by')->where('id', '=', Crypt::decrypt($id_k))->get();
        $Kayr_ct = KaryawanCuti::where('id', '=', Crypt::decrypt($id_c))->get();
        return view('partial.karyawan.cuti-edit', compact('Kayr', 'Kayr_ct'));
    }

    public function formcuti_store(Request $request)
    {
        // Get counter
        $year = new Carbon(new DateTime($request->SD));
        $getCounter = Karyawan::latest('counter')->first();
        $counter = $this->createCounter($year->format('Y'), 'karyawan', ($getCounter = NULL ? 0 : $getCounter) + 1);

        // Input form
        // dd($request);
        $form = new Karyawan;
        $form->no_form = 'HRD/CK/F'.str_pad($counter, 4, '0', STR_PAD_LEFT).'/'.$year->format('y');
        $form->counter = $counter;
        $form->type = 1;
        $form->date = $request->tgl_pengajuan_1;
        $form->created_by = Auth::user()->name;
        $form->cabang = Auth::user()->cabang;
        $form->total_cuti = $request->total_cuti;
        $form->save();

        // Input detail
        $det = new KaryawanCuti;
        $det->id_form = $form->id;
        $det->tgl_link = $request->tgl_link;
        $det->cuti_tahunan = $request->ct == 'on' ? 'Y' : 'N';
        $det->cuti_diluar_tanggungan = $request->cdt == 'on' ? 'Y' : 'N';
        $det->cuti_khusus = $request->ck == 'on' ? 'Y' : 'N';
        $det->total_cuti = $request->total_cuti;
        $det->jabatan = $request->jabatan;
        $det->atasan = $request->atasan;
        $det->departement = $request->departement;
        $det->tgl_pengajuan_s = $request->tgl_pengajuan_1;
        $det->tgl_pengajuan_e = $request->tgl_pengajuan_2;
        $det->tgl_kembali_kerja = $request->tgl_kembali_kerja;
        $det->alasan = $request->alasancuti;
        $det->pengganti_pic = $request->penggantipic;
        $det->jabatan_pic = $request->jabatanpenggantipic;
        $det->cuti_menikah_st = $request->cm_1;
        $det->cuti_menikah_en = $request->cm_2;
        $det->cuti_sblm_melahirkan_st = $request->cmsm_b1;
        $det->cuti_sblm_melahirkan_en = $request->cmsm_b2;
        $det->cuti_stlh_melahirkan_st = $request->cmsm_a1;
        $det->cuti_stlh_melahirkan_en = $request->cmsm_a2;
        $det->cuti_anak_st = $request->cmaka_1;
        $det->cuti_anak_en = $request->cmaka_2;
        $det->cuti_dukacita_st = $request->cd_1;
        $det->cuti_dukacita_en = $request->cd_2;
        $det->cuti_istri_st = $request->cimk_a1;
        $det->cuti_istri_en = $request->cimk_a2;
        $det->save();

        return redirect()->route('karyawan.index');
    }

    public function formCuti_update($id_k, $id_c, Request $request)
    {
        $cuti = KaryawanCuti::find(Crypt::decrypt($id_c));
        $cuti->tgl_link = $request->tgl_link;
        $cuti->cuti_tahunan = $request->ct == 'on' ? 'Y' : 'N';
        $cuti->cuti_diluar_tanggungan = $request->cdt == 'on' ? 'Y' : 'N';
        $cuti->cuti_khusus = $request->ck == 'on' ? 'Y' : 'N';
        $cuti->total_cuti = $request->total_cuti;
        $cuti->jabatan = $request->jabatan;
        $cuti->atasan = $request->atasan;
        $cuti->departement = $request->departement;
        $cuti->tgl_pengajuan_s = $request->tgl_pengajuan_1;
        $cuti->tgl_pengajuan_e = $request->tgl_pengajuan_2;
        $cuti->tgl_kembali_kerja = $request->tgl_kembali_kerja;
        $cuti->alasan = $request->alasancuti;
        $cuti->pengganti_pic = $request->penggantipic;
        $cuti->jabatan_pic = $request->jabatanpenggantipic;
        $cuti->cuti_menikah_st = $request->cm_1;
        $cuti->cuti_menikah_en = $request->cm_2;
        $cuti->cuti_sblm_melahirkan_st = $request->cmsm_b1;
        $cuti->cuti_sblm_melahirkan_en = $request->cmsm_b2;
        $cuti->cuti_stlh_melahirkan_st = $request->cmsm_a1;
        $cuti->cuti_stlh_melahirkan_en = $request->cmsm_a2;
        $cuti->cuti_anak_st = $request->cmaka_1;
        $cuti->cuti_anak_en = $request->cmaka_2;
        $cuti->cuti_dukacita_st = $request->cd_1;
        $cuti->cuti_dukacita_en = $request->cd_2;
        $cuti->cuti_istri_st = $request->cimk_a1;
        $cuti->cuti_istri_en = $request->cimk_a2;
        $cuti->update();

        return redirect()->route('karyawan.formcuti_view', [$id_k, $id_c]);
    }

    // FORM IZIN =====================================================

    public function formizin_store(Request $request)
    {
        // Get counter
        $year = new Carbon(new DateTime($request->SD));
        $getCounter = Karyawan::select('counter')->where('type', '=', '2')->orderBy('counter', 'DESC')->first();
        $counter = $this->createCounter($year->format('Y'), 'karyawan', ($getCounter == NULL ? 0 : $getCounter->counter) + 1);

        // Input form
        $form = new Karyawan;
        $form->no_form = 'HRD/IK/F'.str_pad($counter, 4, '0', STR_PAD_LEFT).'/'.$year->format('y');
        $form->counter = $counter;
        $form->type = 2;
        $form->date = $request->tgl_izin;
        $form->created_by = Auth::user()->name;
        $form->cabang = Auth::user()->cabang;
        $form->save();

        // Input detail
        $det = new KaryawanIzin;
        $det->id_form = $form->id;
        $det->izin_pekerjaan = $request->izin_pekerjaan == 'on' ? 'Y' : 'N';
        $det->izin_pribadi = $request->izin_pribadi == 'on' ? 'Y' : 'N';
        $det->terlambat = $request->terlambat == 'on' ? 'Y' : 'N';
        $det->keluarkantor = $request->keluarkantor == 'on' ? 'Y' : 'N';
        $det->pulangcepat = $request->pulangcepat == 'on' ? 'Y' : 'N';
        $det->tidakclock = $request->tidakclock == 'on' ? 'Y' : 'N';
        $det->sakit = $request->sakit == 'on' ? 'Y' : 'N';
        $det->sebab_lain = $request->sebab_lain == 'on' ? 'Y' : 'N';
        $det->tgl_izin = $request->tgl_izin;
        $det->jam_s = $request->jam_1;
        $det->jam_e = $request->jam_2;
        $det->jabatan = $request->jabatan;
        $det->keteranganizin = $request->keteranganizin;
        $det->departement = $request->departement;
        $det->atasan = $request->atasan;
        $det->save();

        return redirect()->route('karyawan.index');
    }

    public function formIzin_view($id_k, $id_c)
    {
        $Kayr = Karyawan::select('id','no_form','void','approved','created_by', 'date', 'verif')->where('id', '=', Crypt::decrypt($id_k))->get();
        $Kayr_iz = KaryawanIzin::where('id', '=', Crypt::decrypt($id_c))->get();
        return view('partial.karyawan.izin-view', compact('Kayr', 'Kayr_iz'));
    }

    public function formIzin_edit($id_k, $id_c)
    {
        $Kayr = Karyawan::select('id','no_form','void','approved','created_by', 'date')->where('id', '=', Crypt::decrypt($id_k))->get();
        $Kayr_iz = KaryawanIzin::where('id', '=', Crypt::decrypt($id_c))->get();
        return view('partial.karyawan.izin-edit', compact('Kayr', 'Kayr_iz'));
    }

    public function formIzin_approval($id_k, $val, $id_c)
    {
        $karyawan = Karyawan::find(Crypt::decrypt($id_k));
        $karyawan->approved = Crypt::decrypt($val);
        $karyawan->approve_by = Auth::user()->name;
        $karyawan->approve_date = Carbon::now();
        $karyawan->update();
        return redirect()->route('karyawan.formizin_view', [$id_k, $id_c]);
    }

    public function formIzin_verif($id_k, $val, $id_c)
    {
        $karyawan = Karyawan::find(Crypt::decrypt($id_k));
        $karyawan->verif = Crypt::decrypt($val);
        $karyawan->verifed_by = Auth::user()->name;
        $karyawan->verified_by_id = Auth::user()->id;
        $karyawan->verifed_date = Carbon::now();
        $karyawan->update();
        return redirect()->route('karyawan.formizin_view', [$id_k, $id_c]);
    }

    public function formIzin_update($id_k, $id_c, Request $request)
    {
        $izin = KaryawanIzin::find(Crypt::decrypt($id_c));
        $izin->izin_pekerjaan = $request->izin_pekerjaan == 'on' ? 'Y' : 'N';
        $izin->izin_pribadi = $request->izin_pribadi == 'on' ? 'Y' : 'N';
        $izin->terlambat = $request->terlambat == 'on' ? 'Y' : 'N';
        $izin->keluarkantor = $request->keluarkantor == 'on' ? 'Y' : 'N';
        $izin->pulangcepat = $request->pulangcepat == 'on' ? 'Y' : 'N';
        $izin->tidakclock = $request->tidakclock == 'on' ? 'Y' : 'N';
        $izin->sakit = $request->sakit == 'on' ? 'Y' : 'N';
        $izin->sebab_lain = $request->sebab_lain == 'on' ? 'Y' : 'N';
        $izin->tgl_izin = $request->tgl_izin;
        $izin->jam_s = $request->jam_1;
        $izin->jam_e = $request->jam_2;
        $izin->jabatan = $request->jabatan;
        $izin->keteranganizin = $request->keteranganizin;
        $izin->departement = $request->departement;
        $izin->atasan = $request->atasan;
        $izin->update();

        return redirect()->route('karyawan.formizin_view', [$id_k, $id_c]);
    }

    public function formIzin_print($id_k, $id_c)
    {
        $Kayr = Karyawan::select('id','no_form','void','approved','created_by','verif', 'verified_by', 'verified_by_id')->where('id', '=', Crypt::decrypt($id_k))->get();
        $Kayr_iz = DB::select('SELECT * , us.id atasanid FROM karyawan_izin kc LEFT JOIN users us ON us.name = kc.atasan where kc.id = '.Crypt::decrypt($id_c));
        return view('partial.export.form_izin', compact('Kayr', 'Kayr_iz'));
    }



    

    public function formDinas()
    {
        return view('partial.karyawan.dinas');
    }

    public function formPenambahanKaryawan()
    {
        return view('partial.karyawan.penambahankaryawan');
    }

    public function formKasbon()
    {
        return view('partial.karyawan.kasbon');
    }

    public function formResign()
    {
        return view('partial.karyawan.resign');
    }

    public function createCounter($start, $table, $model)
    {   
        return (DB::select("SELECT counter FROM $table WHERE YEAR(created_at) = $start LIMIT 1") != NULL) ? $model : 1 ;
    }

    // USER
    public function user_view()
    {
        $user = DB::select('Select * from users where id = '.Auth::user()->id);
        return view('partial.user.user-info', compact('user'));
    }

    public function user_upload_signature(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:max_width=300,max_height=300',
        ]);
        
        $path = User::find(Auth::user()->id);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= Auth::user()->id.'.jpg';
            $path_image = $request->file('image')->move('public/file_tanda_tangan', $filename); // Localhost
            // $path_image = $request->file('image')->move('/home/cakrai6/&apps.cakraindo.com/storage/file_tanda_tangan', $filename); // Server

            $path->path = $path_image;
            $path->update();
        }
        return redirect()->route('user.view', Auth::user()->id)->with('status', 'Image Has been uploaded');
    }
}
