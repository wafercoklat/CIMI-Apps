@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif @if(session()->has('duplicate'))<span id="alert_" style="visibility:hidden">duplicate</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center">
                            <div class="ml-2 col-lg-4 col-md-12 col-sm-12 align-items-center">
                                <h2>Daftar <b>Form Karyawan</b></h2>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="col-lg-2 col-md-6 col-sm-12 my-2 me-3"><a class="btn btn-primary col-lg-12 col-md-12 col-sm-12" type="button" href="{{ route('karyawan.cuti') }}" name="filter" id="filter" target="_blank"><i class="fa fa-filter"></i> Buat Form Cuti</a></div>
                                <div class="col-lg-2 col-md-6 col-sm-12 my-2"><a class="btn btn-warning col-lg-12 col-md-12 col-sm-12" type="button" href="{{ route('karyawan.izin') }}" name="filter" id="filter" target="_blank"><i class="fa fa-filter"></i> Buat Form Izin</a></div>
                            </div>
                        </div>
                        <table class="table table-hover pb-2" width="100%" id="datatable">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Tipe</th>
                                    <th>No. Form</th>
                                    <th>Tanggal Form</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Total</th>
                                    <th>Approve By</th>
                                    <th>Dibuat</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>
                                            @if ($data->stats == 'Rejected' || $data->stats == 'Void')
                                                <span class="badge bg-danger">{{$data->stats}}</span>
                                            @elseif ($data->stats == 'Approve')
                                                <span class="badge bg-success">{{$data->stats}}</span>
                                            @else
                                                <span class="badge bg-secondary text-black">{{$data->stats}}</span>
                                            @endif
                                        </td>
                                        <td>{{$data->type}}</td>
                                        <td>
                                            @if ($data->type == 'Cuti') <span class="badge bg-primary"><a class="boxhead" href="{{route('karyawan.formcuti_view', [Crypt::encrypt($data->form_id), Crypt::encrypt($data->cuti_id)]) }}">{{$data->no_form}}</a><span> @endif 
                                            @if ($data->type == 'Izin') <span class="badge bg-warning"><a class="boxhead" href="{{route('karyawan.formizin_view', [Crypt::encrypt($data->form_id), Crypt::encrypt($data->cuti_id)]) }}">{{$data->no_form}}</a><span> @endif
                                        </td>
                                        <td>{{$data->tgl_pengajuan_s}} &nbsp @if($data->tgl_link == 'Sampai') S/D @endif @if($data->tgl_link == 'Dan') DAN @endif  &nbsp {{$data->tgl_pengajuan_e}}</td>
                                        <td>@if($data->tgl_kembali_kerja == NULL) - @else {{$data->tgl_kembali_kerja}} @endif</td>
                                        <td>{{$data->total_cuti}} Hari</td>
                                        <td>{{$data->approve_by}}</td>
                                        <td>{{$data->created_by}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection