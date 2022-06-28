@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card px-5">
            <div class="col-12 grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="col-12">
                        <div class="col-lg-4 col-md-12 col-sm-12 row">
                            <span class="card-title">Form Cuti Karyawan No. <h3>{{$Kayr[0]->no_form}}</h3></span>
                            <h5 class="card-title">Status : @if ($Kayr[0]->approved == 'Y') Approved @elseif($Kayr[0]->approved == 'R') Rejected @else Pending @endif</h5>
                        </div>
                            <form method="POST" action="{{ route('karyawan.formizin_revisi', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_iz[0]->id)]) }}" class="col-12">
                                @csrf
                                @method('PUT')
                                <div class="mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <h4 class="card-title">Data Karyawan</h4>
                                                        <label for="exampleInputName1">Nama*</label>
                                                        <input type="text" class="form-control" disabled name="nama" value="{{Auth::user()->name}}" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Jabatan*</label>
                                                        <input type="text" class="form-control"  placeholder="Jabatan Karyawan" name="jabatan" value="{{$Kayr_iz[0]->jabatan}}" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Departemen*</label>
                                                        <input type="text" class="form-control"  placeholder="Departemen Karyawan" name="departement" value="{{$Kayr_iz[0]->departement}}"/>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-5">
                                                        <label for="exampleInputName1">Atasan*</label>
                                                        <input type="text" class="form-control"  placeholder="Atasan Karyawan" name="atasan" value="{{$Kayr_iz[0]->atasan}}" />
                                                    </div>
    
                                                    <div class="form-group border-bottom"></div>
    
                                                    <div class="row col-lg-12 col-md-12 col-sm-12">
                                                        <h4 class="card-title">Catatan</h4>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                                            <label for="exampleInputName1" class="text-small">* Mohon input dengan lengkap tanggal dan jam pada kolom Waktu Pengajuan Izin</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                                            <label for="exampleInputName1" class="text-small">* Wajib Melampirkan Dokumen Pendukung</label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="ml-1 col-lg-8 col-md-12 col-sm-12">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <h4 class="card-title">Informasi Izin</h4>
                                                        <label for="exampleInputName1">Jenis Izin Yang Diajukan*</label>
                                                        <div class="ml-1 row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox"  class="form-check-input" name="izin_pekerjaan" @if($Kayr_iz[0]->izin_pekerjaan == "Y")checked @endif>Pekerjaan/Dinas
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox"  class="form-check-input" name="izin_pribadi"  @if($Kayr_iz[0]->izin_pribadi == "Y")checked @endif>Pribadi
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group border-bottom"></div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="row w-100 form-group">
                                                            <h4 class="card-title">Alasan Izin</h4>
                                                            <div class="ml-1 row">
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox"  class="form-check-input" name="terlambat" @if($Kayr_iz[0]->terlambat == "Y")checked @endif>Terlambat
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox"  class="form-check-input" name="keluarkantor" @if($Kayr_iz[0]->keluarkantor == "Y")checked @endif>Keluar Kantor
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox"  class="form-check-input" name="pulangcepat" @if($Kayr_iz[0]->pulangcepat == "Y")checked @endif>Pulang Cepat
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox"  class="form-check-input" name="tidakclock" @if($Kayr_iz[0]->tidakclock == "Y")checked @endif>Tidak Clock In / Out
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox"  class="form-check-input" name="sakit" @if($Kayr_iz[0]->sakit == "Y")checked @endif>Sakti (Ada / Tidak Ada Surat)
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox"  class="form-check-input" name="sebablain" @if($Kayr_iz[0]->sebablain == "Y")checked @endif>Sebab Lain
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row w-100 form-group">
                                                            <label for="exampleInputName1">Waktu Pengajuan Izin (Mohon isi tanggal dan jam)*</label>
                                                            <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input id="tpc1"  class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_izin" value="{{$Kayr_iz[0]->tgl_izin}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <input type="text"  class="form-control" id="single-input" placeholder="" name="jam_1" value="{{$Kayr_iz[0]->jam_s}}">
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <select id="tlink"  class="col-12" name="tgl_link" > 
                                                                    <option value="sampai" selected> Sampai </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <input type="text"  class="form-control" id="second-input" value="{{$Kayr_iz[0]->jam_e}}" placeholder="" name="jam_2">
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                                    <label for="exampleInputName1">Keterangan Izin*</label>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <textarea class="form-control h-auto"  rows="5" placeholder="Alasan Izin" name="keteranganizin">{{$Kayr_iz[0]->keteranganizin}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-2">
                                    <div class="card-body row">
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <label>Apakah ada yakin untuk merevisi izin anda? </label>
                                            <span class="card-description"></span>
                                        </div>
    
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary me-2">Revisi Izin</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection