@extends('main') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="row col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <h4 class="card-title">Detail Penjadwalan Isotank</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <a class="btn btn-success btn-block col-12" type="button" href="{{ route('duplicateSetValue', Crypt::encrypt($iso[0]->uid)) }}" name="filter" id="filter"  style="margin-top:10px" target="_blank">
                                <i class="fa fa-filter"></i> Buat Jadwal
                            </a>
                        </div>
                        <div class="form-group col-lg-1">
                        </div>
                        <div class="form-group col-lg-3 col-md-12 col-sm-12">
                            <h4 class="card-title">No. Packing List</h4>
                            <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->packinglist_no}}" disabled/>
                        </div>
                        <div class="form-group col-lg-2 col-md-12 col-sm-12">
                            <h4 class="card-title">Jumlah Partai</h4>
                            <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->jlh_Partai}}" disabled/>
                        </div>                        
                    </div>
                    <div class="table-responsive overflow-hidden">
                        <div class="table-responsive overflow-hidden">
                            <table class="table table-hover pb-2" width="100%" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>No. Transaksi</th>
                                        <th>No. Isotank</th>
                                        <th>Customer</th>
                                        <th>Tgl OutDepo</th>
                                        <th>Tgl InDepo</th>
                                        <th>Fix Tgl InDepo</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Lokasi Loading</th>
                                        <th>Lokasi Bongkar</th>
                                        <th>Transport</th>
                                        <th>No Partai</th>
                                        <th>Batal Tanggal</th>
                                        <th>Alasan Batal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($iso as $iso)
                                    <tr @if ($iso->stats == 'Void') class="strikeout" @endif>
                                        <td>{{$iso->stats}}</td>
                                        <td><a href="#" type="button" data-target="#modalshow{{$iso->transid}}" data-toggle="modal"><span class="badge  bg-info">{{$iso->transnumber}} <i class="mdi mdi-arrow-right"></i></span></a></td>
                                        <td>{{$iso->code}}</td>
                                        <td>{{$iso->customername}}</td>
                                        <td>{{$iso->tgl_outdepo}}</td>
                                        <td>{{$iso->tgl_indepo}}</td>
                                        <td>{{$iso->tgl_indepo_real}}</td>
                                        <td>{{$iso->ori}}</td>
                                        <td>{{$iso->des}}</td>
                                        <td>{{$iso->lokasi_loading}}</td>
                                        <td>{{$iso->lokasi_bongkar}}</td>
                                        <td>{{$iso->vessel}}</td>
                                        <td>{{$iso->partai}}</td>
                                        <td>{{$iso->void_date}}</td>
                                        <td>{{$iso->void_reason}}</td>
                                    </tr>
                                    <div class="modal fade" id="modalshow{{$iso->transid}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <form action="{{ url('/isotank/updateIsotank/'.$iso->transid) }}" method="POST">
                                            @csrf @method('PUT')
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ph-modal">
                                                        <div class="modal-title">
                                                            <div class="mb-30">
                                                                <h4><b>No. {{$iso->code}} - {{$iso->transnumber}}</b></h4>
                                                                <h6>Cust : {{$iso->customername}} - Tujuan : {{$iso->des}}</h6>
                                                                <h6>No Packing List : {{$iso->packinglist_no}}</h6>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><h1>&times;</h1></span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label class="filter-set">Tanggal Muat / Loading</label>
                                                                <input type="date" @if ($iso->tgl_muat
                                                                <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_muat)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_muat">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label class="filter-set">Tanggal ETD</label>
                                                                <input type="date" @if ($iso->tgl_ETD
                                                                <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_ETD)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_ETD">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label class="filter-set">Tanggal ETA</label>
                                                                <input type="date" @if ($iso->tgl_ETA
                                                                <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_ETA)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_ETA">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label class="filter-set">Tanggal Bongkar / Dooring</label>
                                                                <input type="date" @if ($iso->tgl_bongkar
                                                                <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_bongkar)->format('Y-m-d')}}" @else value="" @endif name="tgl_bongkar" class="form-control filter-set" aria-label="Tanggal Awal">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                <label class="filter-set">Tanggal InDepo*</label>
                                                                <input type="date" @if ($iso->tgl_indepo_real
                                                                <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_indepo_real)->format('Y-m-d')}}" @else value="" @endif name="tgl_indepo_real" class="form-control filter-set">
                                                            </div>
                                                        </div>
                                                        <div class="row parent">
                                                            @if ($iso->transid
                                                            <> NULL)
                                                                <a class="btn btn-info col-lg-5 col-md-12 col-sm-12 mb-2" target="_blank">Print - {{$iso->transnumber}}</a> @if (($iso->stats != "Finish") && ($iso->stats != "Void"))
                                                                <a href="{{ route('isotank.modify', Crypt::encrypt($iso->transid)) }}" class="btn btn-primary col-lg-6 col-md-12 col-sm-12 mb-2" target="_blank" style="float:right">More Edit - {{$iso->transnumber}}</a>                                                                                @endif @endif
                                                        </div>
                                                    </div>
                                                    @if (($iso->stats != "Finish") && ($iso->stats != "Void"))
                                                    <div class="modal-footer">
                                                        <a data-dismiss="modal" href="#" type="button" data-target="#modalvoid{{$iso->transid}}" data-toggle="modal" class="btn btn-danger">Void</a> @if ($iso->uid
                                                        <> NULL)
                                                            <a type="button" href="{{ route('duplicateSetValue', Crypt::encrypt($iso->uid)) }}" class="btn btn-dark" target="_blank">Duplicate</a> @endif
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal fade bd-example-modal-sm" id="modalvoid{{$iso->transid}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <form action="{{ url('isotank/void/'.$iso->transid) }}" method="POST">
                                            @csrf @method('PUT')
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-title">
                                                            <div class="mb-30">
                                                                <h6>Apakah Anda Yakin Ingin Membatalkan Transaksi</h6>
                                                                <h2>{{$iso->transnumber}}</h2>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><h1>&times;</h1></span>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                            <label for="exampleInputName1">Deskripsi</label>
                                                            <textarea class="form-control h-auto" rows="5" placeholder="Deskripsi Pembatalan" name="void_reason"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" type="submit">Proses Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection