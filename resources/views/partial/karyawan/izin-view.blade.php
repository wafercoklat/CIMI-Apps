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
                                <span class="card-title">Form Izin Karyawan No. <h3>{{$Kayr[0]->no_form}}</h3></span>
                                <h5 class="card-title">Status : @if ($Kayr[0]->approved == 'Y') Approved @elseif($Kayr[0]->approved == 'R') Rejected @else Pending @endif / @if ($Kayr[0]->verif == 1) Verified By HRD @endif</h5>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 row justify-content-end row-no-gutters">
                                @if ((Auth::user()->role == 'Administrator' || Auth::user()->dept == 'HRD') && $Kayr[0]->verif == 0)
                                    <a href="{{ route('karyawan.formIzin_verif', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('1'), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-success col-lg-2 col-md-6 col-sm-6 mx-1" onclick="return confirm('Apakah Anda Yakin Menyetujui Form Izin Ini?');">Validate HRD</a>
                                @endif

                                @if(Auth::user()->role <> 'Operasional')
                                    @if ($Kayr[0]->approved == 'P')
                                        @if ((Auth::user()->dept == 'HRD' && Auth::user()->role == 'Approver') || Auth::user()->role == 'Approver' ||  Auth::user()->role == 'Administrator')
                                            <a href="{{ route('karyawan.izin_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('Y'), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-success col-lg-2 col-md-6 col-sm-6 mx-1" onclick="return confirm('Apakah Anda Yakin Menyetujui Form Izin Ini?');">Approve</a>
                                            <a href="{{ route('karyawan.izin_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('R'), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-danger col-lg-2 col-md-6 col-sm-6 mx-1" onclick="return confirm('Apakah Anda Yakin Menolak Form Izin Ini?');">Reject</a>
                                        @endif
                                        @if (Auth::user()->name == $Kayr[0]->created_by)
                                            <a href="{{ route('karyawan.formizin_edit', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-primary col-lg-1 col-md-6 col-sm-6">Edit</a>
                                        @endif
                                    @elseif($Kayr[0]->approved == 'Y')
                                        @if ((Auth::user()->dept <> 'HRD' && Auth::user()->role == 'Approver') || Auth::user()->role == 'Approver' ||  Auth::user()->role == 'Administrator')
                                            <a href="{{ route('karyawan.izin_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('R'), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-danger col-lg-2 col-md-6 col-sm-6 mx-1" onclick="return confirm('Apakah Anda Yakin Menolak Form Izin Ini?');">Reject</a>
                                        @endif
                                    @else
                                        @if ((Auth::user()->dept <> 'HRD' && Auth::user()->role == 'Approver') || Auth::user()->role == 'Approver' ||  Auth::user()->role == 'Administrator')
                                            <a href="{{ route('karyawan.izin_approval', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt('Y'), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-success col-lg-1 col-md-6 col-sm-6 mx-1" onclick="return confirm('Apakah Anda Yakin Menyetujui Form Izin Ini?');">Approve</a>
                                        @endif
                                        @if (Auth::user()->name == $Kayr[0]->created_by)
                                            <a href="{{ route('karyawan.formizin_edit', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-primary col-lg-1 col-md-6 col-sm-6">Edit</a>
                                        @endif
                                    @endif
                                    @endif

                                    @if (Auth::user()->role == 'Operasional' && $Kayr[0]->approved == 'P')
                                        <a href="{{ route('karyawan.formizin_edit', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_iz[0]->id)])}}" class="btn btn-primary col-lg-1 col-md-6 col-sm-6 mx-1">Edit</a>
                                    @endif
                                    <a href="#" class="btn btn-primary col-lg-1 col-md-3 col-sm-3 mx-1" type="button" data-target="#modalshow" data-toggle="modal"><span><i class="mdi mdi mdi-dots-vertical"></i></span></a>
                            </div>
                        </div>
                        <form class="col-12">
                            @csrf
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
                                                    <input type="text" class="form-control" disabled placeholder="Jabatan Karyawan" name="jabatan" value="{{$Kayr_iz[0]->jabatan}}" />
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                    <label for="exampleInputName1">Departemen*</label>
                                                    <input type="text" class="form-control" disabled placeholder="Departemen Karyawan" name="departement" value="{{$Kayr_iz[0]->departement}}"/>
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-5">
                                                    <label for="exampleInputName1">Atasan*</label>
                                                    <input type="text" class="form-control" disabled placeholder="Atasan Karyawan" name="atasan" value="{{$Kayr_iz[0]->atasan}}" />
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
                                                                <input type="checkbox" disabled class="form-check-input" name="izin_pekerjaan" @if($Kayr_iz[0]->izin_pekerjaan == "Y")checked @endif>Pekerjaan/Dinas
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="form-check form-check-primary">
                                                                <input type="checkbox" disabled class="form-check-input" name="izin_pribadi"  @if($Kayr_iz[0]->izin_pribadi == "Y")checked @endif>Pribadi
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
                                                                    <input type="checkbox" disabled class="form-check-input" name="terlambat" @if($Kayr_iz[0]->terlambat == "Y")checked @endif>Terlambat
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" disabled class="form-check-input" name="keluarkantor" @if($Kayr_iz[0]->keluarkantor == "Y")checked @endif>Keluar Kantor
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" disabled class="form-check-input" name="pulangcepat" @if($Kayr_iz[0]->pulangcepat == "Y")checked @endif>Pulang Cepat
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" disabled class="form-check-input" name="tidakclock" @if($Kayr_iz[0]->tidakclock == "Y")checked @endif>Tidak Clock In / Out
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" disabled class="form-check-input" name="sakit" @if($Kayr_iz[0]->sakit == "Y")checked @endif>Sakti (Ada / Tidak Ada Surat)
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                                <div class="form-check form-check-primary">
                                                                    <input type="checkbox" disabled class="form-check-input" name="sebablain" @if($Kayr_iz[0]->sebablain == "Y")checked @endif>Sebab Lain
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row w-100 form-group">
                                                        <label for="exampleInputName1">Waktu Pengajuan Izin (Mohon isi tanggal dan jam)*</label>
                                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <input id="tpc1" disabled class="form-control fix1 p-hor" type="date" placeholder="..." name="tgl_izin" value="{{$Kayr_iz[0]->tgl_izin}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                            <input type="text" disabled class="form-control" id="single-input" placeholder="" name="jam_1" value="{{$Kayr_iz[0]->jam_s}}">
                                                        </div>
                                                        <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                            <select id="tlink" disabled class="col-12" name="tgl_link" disabled> 
                                                                <option value="sampai" selected> Sampai </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-2 col-md-12 col-sm-12 form-group">
                                                            <input type="text" disabled class="form-control" id="second-input" value="{{$Kayr_iz[0]->jam_e}}" placeholder="" name="jam_2">
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                                <label for="exampleInputName1">Keterangan Izin*</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <textarea class="form-control h-auto" disabled rows="5" placeholder="Alasan Izin" name="keteranganizin">{{$Kayr_iz[0]->keteranganizin}}</textarea>
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
                                                    %0ASaya%20ingin%20mengajukan%20izin%20pada%20tanggal%20*{{\Carbon\Carbon::parse($Kayr_iz[0]->tgl_izin)->format('Y-m-d')}}*.%0ADibawah%20ini%20adalah%20link%20form%20izin%20saya,%20mohon%20di%20check%20terlebih%20dahulu%20pak/bu.%0ATerima%20Kasih%0A%0ALink%20:%20{{Request::url()}}" class="btn btn-primary col-8">Share ke Whatsapp</a>
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
                .attr("src", "{{ route('karyawan.Izin_print', [Crypt::encrypt($Kayr[0]->id), Crypt::encrypt($Kayr_iz[0]->id)])}}") // point the iframe to the page you want to print
                .appendTo("body");                    // add iframe to the DOM to cause it to load the page
                }
    </script>
    @endsection
