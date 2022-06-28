@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card px-5">
            <div class="col-12 grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="col-12">
                        <h4 class="card-title">Form Izin Karyawan</h4>
                        <p class="card-description">
                            Mohon diperhatikan dengan seksama
                        </p>
                            <form method="POST" action="{{ route('karyawan.formizin_store') }}" class="col-12">
                                @csrf
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
                                                        <input type="text" class="form-control" placeholder="Jabatan Karyawan" name="jabatan" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Departemen*</label>
                                                        <input type="text" class="form-control" placeholder="Departemen Karyawan" name="departement" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-5">
                                                        <label for="exampleInputName1">Atasan*</label>
                                                        <input type="text" class="form-control" placeholder="Atasan Karyawan" name="atasan" />
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
                                                                    <input type="checkbox" class="form-check-input" name="izin_pekerjaan">Pekerjaan/Dinas
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" class="form-check-input" name="izin_pribadi">Pribadi
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
                                                                        <input type="checkbox" class="form-check-input" name="terlambat">Terlambat
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox" class="form-check-input" name="keluarkantor">Keluar Kantor
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox" class="form-check-input" name="pulangcepat">Pulang Cepat
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox" class="form-check-input" name="tidakclock">Tidak Clock In / Out
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox" class="form-check-input" name="sakit">Sakti (Ada / Tidak Ada Surat)
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                                    <div class="form-check form-check-primary">
                                                                        <input type="checkbox" class="form-check-input" name="sebab lain">Sebab Lain
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row w-100 form-group">
                                                            <label for="exampleInputName1">Waktu Pengajuan Izin (Mohon isi tanggal dan jam)*</label>
                                                            <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input id="tpc1" class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_izin" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <input type="text" class="form-control" id="single-input" value="08:30" placeholder="" name="jam_1">
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <select id="tlink" class="col-12" name="tgl_link" disabled> 
                                                                    <option value="sampai" selected> Sampai </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <input type="text" class="form-control" id="second-input" value="" placeholder="" name="jam_2">
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                                    <label for="exampleInputName1">Keterangan Izin*</label>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <textarea class="form-control h-auto" rows="5" placeholder="Alasan Izin" name="keteranganizin"></textarea>
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
                                            <label>Apakah ada yakin untuk mengajukan izin? </label>
                                            <span class="card-description"></span>
                                        </div>
    
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary me-2">Ajukan Izin</button>
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