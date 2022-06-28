@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card px-5">
            <div class="col-12 grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="col-12">
                        <h4 class="card-title">Form Cuti Karyawan</h4>
                        <p class="card-description">
                            Mohon diperhatikan dengan seksama
                        </p>
                            <form method="POST" action="{{ route('karyawan.formcuti_store') }}" class="col-12">
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
                                                            <label for="exampleInputName1" class="text-small">* Hak Cuti Disesuaikan Dengan Ketentuan Yang Berlaku</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                                            <label for="exampleInputName1" class="text-small">* Wajib Melampirkan Dokumen Pendukung</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                                            <label for="exampleInputName1" class="text-small">* Formulir Cuti Wajib Diserahkan Kepada HRD 1 Minggu Sebelum Hari Cuti</label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="ml-1 col-lg-8 col-md-12 col-sm-12">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <h4 class="card-title">Informasi Cuti</h4>
                                                        <label for="exampleInputName1">Jenis Cuti Yang Diajukan*</label>
                                                        <div class="ml-1 row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" class="form-check-input" name="ct" checked>Cuti Tahunan
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" class="form-check-input" name="cdt">Cuti Diluar Tanggungan
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input id="check-ck" type="checkbox" class="form-check-input" name="ck">Cuti Khusus
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group border-bottom"></div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="row w-100 ">
                                                            <h4 class="card-title">Lama Cuti</h4>
                                                            <label for="exampleInputName1" class="col-lg-6">Apakah Anda Mengambil Cuti Setengah Hari?</label>
                                                            <div class="col-lg-3 col-md-12 col-sm-12 form-group">
                                                                <input id="csh" type="checkbox" class="form-check-input" name="cuti_setengah_hari"> Ya
                                                            </div>
                                                        </div>
                                                        <div class="row w-100">
                                                            <label for="exampleInputName1">Tanggal Pengajuan Cuti*</label>
                                                            <div class="col-lg-5 col-md-12 col-sm-12 form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input id="tpc1" class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_pengajuan_1" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <select id="tlink" class="col-12" name="tgl_link"> 
                                                                    <option value="sampai"> Sampai </option>
                                                                    <option value="dan"> Dan </option>  
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                                <input id="tpc2" class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_pengajuan_2" />
                                                            </div>
                                                        </div>
                                                        <div class="row w-100 form-group">
                                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Tanggal Kembali Bekerja*</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input id="tgl_kembali" class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_kembali_kerja" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row w-100 form-group">
                                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Estimasi Total Cuti</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input name="total_cuti" id="tc_real" value="0" hidden/>
                                                                    <h4 class="card-title"><span id="tc_show"></span> </h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group border-bottom"></div>

                                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                            <h4 class="card-title">Alasan Cuti</h4>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Alasan Pengambilan Cuti*</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <textarea class="form-control h-auto" rows="5" placeholder="Alasan Cuti" name="alasancuti"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="div_ck" class="invisible">
                                                            <div class="form-group border-bottom"></div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <h4 class="card-title">Catatan Khusus </h4>
                                                                <label for="exampleInputName1">Cuti Menikah</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cm_1" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cm_2" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Cuti Membaptiskan Anak / Khitanan Anak</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cmaka_1" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cmaka_2" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Cuti Dukacita</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cd_1" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cd_2" />
                                                                </div>
                                                            </div>
                                                            <label for="exampleInputName1">Cuti Melahirkan</label>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Sebelum Melahirkan</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cmsm_b1" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cmsm_b2" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Setelah Melahirkan</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cmsm_a1" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cmsm_a2" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Cuti Istri Melahirkan / Keguguran</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cimk_a1" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" type="date" placeholder="..." name="cimk_a2" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group border-bottom"></div>
                                                        </div>
                                                        <div class="row col-lg-12 col-md-12 col-sm-12">
                                                            <h4 class="card-title">Keterangan Tambahan</h4>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">PIC Pengganti Selama Cuti</label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" class="form-control fix1" placeholder="..." name="penggantipic" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Jabatan PIC Pengganti</label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" class="form-control fix1" placeholder="..." name="jabatanpenggantipic" />
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
                                            <label>Apakah ada yakin untuk mengajukan cuti? </label>
                                            <span class="card-description"></span>
                                        </div>
    
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary me-2">Ajukan Cuti</button>
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