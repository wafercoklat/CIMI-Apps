@extends('main') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center">
                            <div class="ml-2 col-lg-12 col-md-12 col-sm-12 align-items-center">
                                <h2>Daftar <b>Transaksi Isotank</b></h2>
                            </div>
                            <div class="row"> 
                                <div class="mb-2 col-lg-2 col-md-6 col-sm-12">
                                    <button class="btn btn-success btn-block col-12" name="filter" id="export" style="margin-top: 10px" target="_blank">
                                        <i class="fa fa-filter"></i> Export Transaksi
                                    </button>
                                </div>
                                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                    <label class="filter-set">Tanggal Awal</label>
                                    <input type="date" id="min" name="min" class="form-control filter-set" aria-label="Tanggal Awal">
                                </div>
                                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                    <label class="filter-set">Tanggal Akhir</label>
                                    <input type="date" id="max" name="max" class="form-control filter-set" aria-label="Tanggal Akhir">
                                </div>
                                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                    <label class="filter-set">Lokasi</label>
                                    <div class="dropdown">
                                        <select class="form-select form-select-sm col-12" aria-label="Default select example" id="loc-filter" name="origin">
                                            <option selected value="SMA">Semua Lokasi</option>
                                            <option value="JKT">Jakarta</option>
                                            <option value="MDN">Medan</option>
                                            <option value="SBY">Surabaya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                    <label class="filter-set">Status</label>
                                    <select id="stats-filter" class="form-select form-select-sm col-12" aria-label="Default select example" aria-labelledby="dropdownMenuSizeButton1" name="status">                         
                                        <option selected value="SMA">Semua Status</option>
                                        <option value="On Schedule">On Schedule</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Suspend">Suspend</option>
                                        <option value="Void">Void</option>
                                        <option value="Finish">Finish</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                    <label class="filter-set">Pencarian</label>
                                    <br>
                                    <input class="clearable col-12" type="text" id="search-filter" class="form-control filter-set" aria-label="Pencarian">
                                </div> --}}
                            </div>
                        </div>
                        <table class="table table-hover pb-2" width="100%" id="datatable">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Packing List</th>
                                    <th>Customer</th>
                                    <th>Partai</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Prediksi Tgl Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iso as $iso)
                                <tr @if ($iso->stats == 'Void') class="strikeout" @endif>
                                    <td>{{$iso->stats}}</td>
                                    <td><a href="{{ route('isotank.transaksidet', Crypt::encrypt($iso->packinglist_no)) }}" type="button"><span class="badge  bg-info">{{$iso->packinglist_no}} <i class="mdi mdi-arrow-right"></i></span></a></td>
                                    <td style="max-width: 200px; overflow: hidden;">{{$iso->customername}}</td>
                                    <td>{{$iso->partai}} / {{$iso->jlh_Partai}} Partai</td>
                                    <td>{{$iso->tgl_outdepo}}</td>
                                    <td>@if ($iso->tgl_indepo_real <> NULL)
                                        {{$iso->tgl_indepo_real}}
                                    @else
                                        {{$iso->tgl_indepo}}
                                    @endif</td>
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