@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card px-5">
            <div class="col-12 grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="col-12">
                        <div class="row col-12 mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 col-sm-12 row">
                                <span class="card-title">Form Cuti Karyawan No. <h3>{{$Kayr[0]->no_form}}</h3></span>
                                <h5 class="card-title">Status : @if ($Kayr[0]->approved == 'Y') Approved @elseif($Kayr[0]->approved == 'R') Rejected @else Pending @endif / @if ($Kayr[0]->verif == 1) Verified By HRD @endif</h5>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 row justify-content-end row-no-gutters">
                                    @if ((Auth::user()->role == 'Approver' || Auth::user()->dept == 'HRD' ||  Auth::user()->role == 'Administrator') && $Kayr[0]->verif == 0)
                                        <a href="{{ route('karyawan.formCuti_verif', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('1'), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-success col-lg-2 col-md-6 col-sm-6 mx-1" onclick="return confirm('Apakah Anda Yakin Menyetujui Form Cuti Ini?');">Validate HRD</a>
                                    @endif

                                    @if(Auth::user()->role <> 'Operasional')
                                        @if ($Kayr[0]->approved == 'P')
                                            @if ((Auth::user()->dept == 'HRD' && Auth::user()->role == 'Approver') || Auth::user()->role == 'Approver' ||  Auth::user()->role == 'Administrator')
                                                <a href="{{ route('karyawan.formCuti_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('Y'), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-success col-lg-2 col-md-3 col-sm-3 mx-1" onclick="return confirm('Apakah Anda Yakin Menyetujui Form Cuti Ini?');">Approve</a>
                                                <a href="{{ route('karyawan.formCuti_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('R'), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-danger col-lg-2 col-md-3 col-sm-3 mx-1" onclick="return confirm('Apakah Anda Yakin Menolak Form Cuti Ini?');">Reject</a>
                                            @endif
                                            @if (Auth::user()->name == $Kayr[0]->created_by)
                                                <a href="{{ route('karyawan.formcuti_edit', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-primary col-lg-1 col-md-3 col-sm-3">Edit</a>
                                            @endif
                                        @elseif($Kayr[0]->approved == 'Y')
                                            @if ((Auth::user()->dept <> 'HRD' && Auth::user()->role == 'Approver') || Auth::user()->role == 'Approver' ||  Auth::user()->role == 'Administrator')
                                                <a href="{{ route('karyawan.formCuti_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('R'), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-danger col-lg-2 col-md-3 col-sm-3 mx-1" onclick="return confirm('Apakah Anda Yakin Menolak Form Cuti Ini?');">Reject</a>
                                            @endif
                                        @else
                                            @if ((Auth::user()->dept <> 'HRD' && Auth::user()->role == 'Approver') || Auth::user()->role == 'Approver' ||  Auth::user()->role == 'Administrator')
                                                <a href="{{ route('karyawan.formCuti_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('Y'), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-success col-lg-1 col-md-3 col-sm-3 mx-1" onclick="return confirm('Apakah Anda Yakin Menyetujui Form Cuti Ini?');">Approve</a>
                                            @endif
                                            @if (Auth::user()->name == $Kayr[0]->created_by)
                                                <a href="{{ route('karyawan.formcuti_edit', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-primary col-lg-1 col-md-3 col-sm-3 mx-1">Edit</a>
                                            @endif
                                        @endif                                       
                                    @endif

                                    @if (Auth::user()->role == 'Operasional' && $Kayr[0]->approved == 'P')
                                        <a href="{{ route('karyawan.formcuti_edit', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_ct[0]->id)])}}" class="btn btn-primary col-lg-1 col-md-3 col-sm-3 mx-1">Edit</a>
                                    @endif
                                    
                                    <a href="#" class="btn btn-primary col-lg-1 col-md-3 col-sm-3 mx-1" type="button" data-target="#modalshow" data-toggle="modal"><span><i class="mdi mdi mdi-dots-vertical"></i></span></a>
                            </div>
                        </div>
                            <form class="col-12">
                                <div class="mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <h4 class="card-title">Data Karyawan</h4>
                                                        <label for="exampleInputName1">Nama*</label>
                                                        <input type="text" class="form-control" disabled name="nama" value="{{$Kayr[0]->created_by}}" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Jabatan*</label>
                                                        <input type="text" class="form-control"disabled placeholder="Jabatan Karyawan" name="jabatan" value="{{$Kayr_ct[0]->jabatan}}" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Departemen*</label>
                                                        <input type="text" class="form-control" disabled placeholder="Departemen Karyawan" name="departemen" value="{{$Kayr_ct[0]->departement}}" />
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-5">
                                                        <label for="exampleInputName1">Atasan*</label>
                                                        <input type="text" class="form-control" disabled placeholder="Atasan Karyawan" name="atasan" value="{{$Kayr_ct[0]->atasan}}" />
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
                                                                    <input type="checkbox" class="form-check-input" disabled name="ct" checked>Cuti Tahunan
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" class="form-check-input" disabled name="cdt" @if ($Kayr_ct[0]->cuti_diluar_tanggungan == "Y")checked @endif>Cuti Diluar Tanggungan
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input id="check-ck" type="checkbox" class="form-check-input" disabled name="ck" @if ($Kayr_ct[0]->cuti_khusus == "Y")checked @endif>Cuti Khusus
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
                                                                <input id="csh" type="checkbox" class="form-check-input" disabled name="cuti_setengah_hari" @if ($Kayr_ct[0]->total_cuti == 0.5)checked @endif> Ya
                                                            </div>
                                                        </div>
                                                        <div class="row w-100">
                                                            <label for="exampleInputName1">Tanggal Pengajuan Cuti*</label>
                                                            <div class="col-lg-5 col-md-12 col-sm-12 form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input id="tpc1" class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="tgl_pengajuan_1" value="{{$Kayr_ct[0]->tgl_pengajuan_s}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                                <select id="tlink" class="col-12" name="tgl_link" disabled> 
                                                                    <option value="sampai" @if ($Kayr_ct[0]->tgl_link == "sampai")selected @endif> Sampai </option>
                                                                    <option value="dan" @if ($Kayr_ct[0]->tgl_link == "dan")selected @endif> Dan </option>  
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                                <input id="tpc2" class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_pengajuan_2" value="{{$Kayr_ct[0]->tgl_pengajuan_e}}" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="row w-100 form-group">
                                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Tanggal Kembali Bekerja*</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input id="tgl_kembali_" class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_kembali_kerja" value="{{$Kayr_ct[0]->tgl_kembali_kerja}}" disabled/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row w-100 form-group">
                                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Estimasi Total Cuti</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input name="total_cuti" id="tc_real" value="0" hidden/>
                                                                    <h4 class="card-title"><span>@if ($Kayr_ct[0]->total_cuti < 1) Setengah Hari @else {{$Kayr_ct[0]->total_cuti}} Hari @endif</span> </h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group border-bottom"></div>

                                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                            <h4 class="card-title">Alasan Cuti</h4>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Alasan Pengambilan Cuti*</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <textarea class="form-control h-auto" rows="5" disabled placeholder="Alasan Cuti" name="alasancuti">{{$Kayr_ct[0]->alasan}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="col">
                                                            <div class="form-group border-bottom"></div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <h4 class="card-title">Catatan Khusus </h4>
                                                                <label for="exampleInputName1">Cuti Menikah</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cm_1" {{$Kayr_ct[0]->cuti_menikah_st}}/>
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cm_2" {{$Kayr_ct[0]->cuti_menikah_en}} />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Cuti Membaptiskan Anak / Khitanan Anak</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cmaka_1" {{$Kayr_ct[0]->cuti_anak_st}} />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cmaka_2" {{$Kayr_ct[0]->cuti_anak_en}} />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Cuti Dukacita</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cd_1" {{$Kayr_ct[0]->cuti_dukacita_st}} />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cd_2" {{$Kayr_ct[0]->cuti_dukacita_en}} />
                                                                </div>
                                                            </div>
                                                            <label for="exampleInputName1">Cuti Melahirkan</label>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Sebelum Melahirkan</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cmsm_b1" {{$Kayr_ct[0]->uti_sblm_melahirkan_st}} />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cmsm_b2" {{$Kayr_ct[0]->uti_sblm_melahirkan_en}} />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Setelah Melahirkan</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cmsm_a1" {{$Kayr_ct[0]->cuti_stlh_melahirkan_st}} />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cmsm_a2" {{$Kayr_ct[0]->cuti_stlh_melahirkan_en}} />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 row form-group">
                                                                <label for="exampleInputName1">Cuti Istri Melahirkan / Keguguran</label>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cimk_a1" {{$Kayr_ct[0]->cuti_istri_st}} />
                                                                </div>
                                                                <div class="col-lg-1 col-md-12 col-sm-12">
                                                                    <span>s/d</span>
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                                    <input class="form-control fix1 p-hor" disabled type="date" placeholder="..." name="cimk_a2" {{$Kayr_ct[0]->cuti_istri_en}} />
                                                                </div>
                                                            </div>
                                                            <div class="form-group border-bottom"></div>
                                                        </div>
                                                        <div class="row col-lg-12 col-md-12 col-sm-12">
                                                            <h4 class="card-title">Keterangan Tambahan</h4>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">PIC Pengganti Selama Cuti</label>
                                                                <div class="form-group">
                                                                    <input class="form-control" disabled type="text" class="form-control fix1" placeholder="..." name="penggantipic" {{$Kayr_ct[0]->pengganti_pic}} />
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Jabatan PIC Pengganti</label>
                                                                <div class="form-group">
                                                                    <input class="form-control" disabled type="text" class="form-control fix1" placeholder="..." name="jabatanpenggantipic" {{$Kayr_ct[0]->jabatan_pic}} />
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
                                            <a href="{{ url()->previous() }}" class="btn btn-light">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal fade" id="modalshow" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header ph-modal">
                                                <div class="modal-title">
                                                    <div class="mb-30">
                                                        <h2>Fitur Tambahan </h2>
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><h1>&times;</h1></span>
                                          </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                        <button onclick="loadOtherPage()" class="btn btn-info col-8">Print</button>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                        <a target="blank" href="https://wa.me/?text=Selamat%20{{\App\Helpers\_Greetings::sayHai()}}%20pak/bu.
                                                %0ASaya%20ingin%20mengajukan%20cuti%20pada%20tanggal%20*{{\Carbon\Carbon::parse($Kayr_ct[0]->tgl_pengajuan_s)->format('Y-m-d')}}*.%0ADibawah%20ini%20adalah%20link%20form%20saya,%20mohon%20di%20check%20terlebih%20dahulu%20pak/bu.%0ATerima%20Kasih%0A%0ALink%20:%20{{Request::url()}}" class="btn btn-primary col-8">Share ke Whatsapp</a>
                                                    </div>
                                                    <div class="form-group col-lg-126 col-md-12 col-sm-12 text-center">
                                                        <a target="blank" href="https://secure293.inmotionhosting.com:2096/cpsess6505722121/webmail/paper_lantern/mail/addars.html?action=create" class="btn btn-warning text-black col-8">Setting Cuti Di Email</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
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
    @endsection

    @section('print')
    <script>
        function loadOtherPage() {
            $("<iframe>")                             // create a new iframe element
                .hide()                               // make it invisible
                .attr("src", "{{ route('karyawan.print', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_ct[0]->id)])}}") // point the iframe to the page you want to print
                .appendTo("body");                    // add iframe to the DOM to cause it to load the page
                }
    </script>
    @endsection
