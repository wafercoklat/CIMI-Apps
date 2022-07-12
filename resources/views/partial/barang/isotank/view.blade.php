@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif @if(session()->has('duplicate'))<span id="alert_" style="visibility:hidden">duplicate</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center">
                            <div class="ml-2 col-lg-12 col-md-12 col-sm-12 align-items-center">
                                <h2>Daftar <b>Isotank</b></h2>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-lg-2 col-md-6 col-sm-12">
                                    <a class="btn btn-success btn-block col-12" type="button" href="{{ route('isotank.create') }}" name="filter" id="filter" style="margin-top: 10px" target="_blank">
                                        <i class="fa fa-filter"></i> Buat Jadwal
                                    </a>
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
                                        <option value="Ready">Ready</option>
                                        <option value="On Schedule">On Schedule</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Suspend">Suspend</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                    <label class="filter-set">Pencarian</label>
                                    <br>
                                    <input class="clearable col-12" type="text" id="search-filter" class="form-control filter-set" aria-label="Pencarian">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover pb-2" width="100%" id="datatable">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Isotank</th>
                                    <th>No. Pakcing List</th>
                                    <th>Tgl OutDepo</th>
                                    <th>Tgl InDepo</th>
                                    <th>Lokasi Isotank</th>
                                    <th>Rute</th>
                                    <th>Pelanggan</th>
                                    <th>Lokasi Loading</th>
                                    <th>Lokasi Bongkar</th>
                                    <th>Transport</th>
                                    <th>No Partai</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iso as $iso) 
                                    @if ($iso->stats <> 'On Schedule')
                                        <tr>
                                            <td>@if ($iso->stats <> 'Ready')<a href="#" id="#stats"type="button" data-target="#modalshow{{$iso->id}}" data-toggle="modal"><span class="badge @if ($iso->stats == 'Ready') bg-success @elseif ($iso->stats == 'In Use' or $iso->stats == 'Suspend' or $iso->stats == 'Void' or $iso->stats == 'In Use - On Schedule')bg-danger @elseif ($iso->stats == 'On Schedule')bg-warning @endif">{{$iso->stats}}</span></a>@endif</td>
                                            <td><a href="{{ route('isotank.info', $iso->id) }}"><span class="badge bg-secondary text-black">{{$iso->code}}</span></a></td>
                                            <td>@if ($iso->stats <> 'Ready')<a href="{{ route('isotank.transaksidet', Crypt::encrypt($iso->packinglist_no)) }}"><span class="badge  bg-info">{{$iso->packinglist_no}} <i class="mdi mdi-arrow-right"></i></span></a>@endif</td>
                                            <td>@if ($iso->stats <> 'Ready')@if ($iso->tgl_outdepo != NULL) {{date('d M Y', strtotime($iso->tgl_outdepo))}} @else <span>-</span> @endif @endif</td>
                                            <td>@if ($iso->tgl_indepo != NULL) {{date('d M Y', strtotime($iso->tgl_indepo))}} @else <span>-</span> @endif</td>
                                            <td>@if ($iso->stats == 'Ready'){{$iso->des}} @else {{$iso->loc}} @endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->ori}} -> {{$iso->des}}@endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->customername}}@endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->lokasi_loading}}@endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->lokasi_bongkar}}@endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->vessel}}@endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->partai}}@endif</td>
                                            <td>@if ($iso->stats <> 'Ready'){{$iso->createdBy}}@endif</td>
                                        </tr>
                                        <div class="modal fade" id="modalshow{{$iso->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <form action="{{ url('/isotank/updateIsotank/'.$iso->transid) }}" method="POST">
                                                @csrf @method('PUT')
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header ph-modal">
                                                            <div class="modal-title">
                                                                <div class="mb-30">
                                                                    <h4><b>No. {{$iso->code}} - {{$iso->transnumber}}</b></h4>
                                                                    <h6>Cust : {{$iso->customername}} </h6>
                                                                    <h6>Origin : {{$iso->des}} -> Tujuan : {{$iso->des}}</h6>
                                                                    <h6>No PL : {{$iso->packinglist_no}} -> Partai : {{$iso->partai}} / {{$iso->jlh_Partai}}</h6>
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
                                                                    <input type="date" @if ($iso->tgl_muat <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_muat)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_muat">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal ETD</label>
                                                                    <input type="date" @if ($iso->tgl_ETD <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_ETD)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_ETD">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal ETA</label>
                                                                    <input type="date" @if ($iso->tgl_ETA <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_ETA)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_ETA">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal Bongkar / Dooring</label>
                                                                    <input type="date" @if ($iso->tgl_bongkar <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_bongkar)->format('Y-m-d')}}" @else value="" @endif name="tgl_bongkar" class="form-control filter-set" aria-label="Tanggal Awal">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal InDepo*</label>
                                                                    <input type="date" @if ($iso->tgl_indepo_real <> NULL) value="{{\Carbon\Carbon::parse($iso->tgl_indepo_real)->format('Y-m-d')}}" @else value="" @endif name="tgl_indepo_real" class="form-control filter-set">
                                                                </div>
                                                            </div>
                                                            <div class="row parent">
                                                                @if ($iso->transid <> NULL) 
                                                                    <a class="btn btn-info col-lg-5 col-md-12 col-sm-12 mb-2" target="_blank">Print - {{$iso->transnumber}}</a> 
                                                                    <a href="{{ route('isotank.modify', Crypt::encrypt($iso->transid)) }}" class="btn btn-primary col-lg-6 col-md-12 col-sm-12 mb-2" target="_blank" style="float:right">More Edit - {{$iso->transnumber}}</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-dismiss="modal" href="#" type="button" data-target="#modalvoid{{$iso->id}}" data-toggle="modal" class="btn btn-danger">Void</a>
                                                            @if ($iso->uid <> NULL)
                                                                <a type="button" href="{{ route('duplicateSetValue', Crypt::encrypt($iso->uid)) }}" class="btn btn-dark" target="_blank">Duplicate</a> 
                                                            @endif
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal fade bd-example-modal-sm" id="modalvoid{{$iso->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    @else
                                    <tr>
                                        <td>@if ($iso->stats <> 'Ready')<a href="#" id="#stats" type="button" data-target="#modalshow{{$iso->id}}" data-toggle="modal"><span class="badge @if ($iso->stats == 'Ready')bg-success @elseif ($iso->stats == 'In Use' or $iso->stats == 'Suspend' or $iso->stats == 'Void' or $iso->stats == 'In Use - On Schedule')bg-danger @elseif ($iso->stats == 'On Schedule')bg-warning @endif">{{$iso->stats}}</span></a>@endif</td>
                                        <td><a href="{{ route('isotank.info', $iso->id) }}"><span class="badge bg-secondary text-black">{{$iso->code}}</span></a></td>
                                        <td>@if ($iso->stats <> 'Ready')<a href="{{ route('isotank.transaksidet', Crypt::encrypt($iso->v_packinglist_no))}}"><span class="badge bg-info">{{$iso->v_packinglist_no}} <i class="mdi mdi-arrow-right"></i></span></a>@endif</td>
                                        <td>@if ($iso->stats <> 'Ready')@if ($iso->v_tgl_outdepo != NULL) {{date('d M Y', strtotime($iso->v_tgl_outdepo))}} @else <span>-</span> @endif @endif</td>
                                        <td>@if ($iso->v_tgl_indepo != NULL) {{date('d M Y', strtotime($iso->v_tgl_indepo))}} @else <span>-</span> @endif</td>
                                        <td>@if ($iso->stats == 'Ready'){{$iso->v_des}} @else {{$iso->v_ori}} @endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_ori}} -> {{$iso->v_des}}@endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_customername}}@endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_lokasi_loading}}@endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_lokasi_bongkar}}@endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_vessel}}@endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_partai}}@endif</td>
                                        <td>@if ($iso->stats <> 'Ready'){{$iso->v_createdby}}@endif</td>
                                    </tr>
                                        <div class="modal fade" id="modalshow{{$iso->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <form action="{{ url('/isotank/updateIsotank/'.$iso->v_transid) }}" method="POST">
                                                @csrf @method('PUT')
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header ph-modal">
                                                            <div class="modal-title">
                                                                <div class="mb-30">
                                                                    <h4><b>No. {{$iso->code}} - {{$iso->v_transnumber}}</b></h4>
                                                                    <h6>Cust : {{$iso->v_customername}} </h6>
                                                                    <h6>Origin : {{$iso->v_des}} -> Tujuan : {{$iso->v_des}}</h6>
                                                                    <h6>No PL : {{$iso->v_packinglist_no}} -> Partai : {{$iso->v_partai}} / {{$iso->v_jlhPartai}}</h6>
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
                                                                    <input type="date" @if ($iso->v_tgl_muat <> NULL) value="{{\Carbon\Carbon::parse($iso->v_tgl_muat)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_muat">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal ETD</label>
                                                                    <input type="date" @if ($iso->v_tgl_ETD <> NULL) value="{{\Carbon\Carbon::parse($iso->v_tgl_ETD)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_etd">
                                                                    <div>
                                                                        <input type="checkbox" class="form-check-input" name="tgl_etds"><i class="input-helper"></i></label>
                                                                        <span class="card-description">Update Semua PL</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal ETA</label>
                                                                    <input type="date" @if ($iso->v_tgl_ETA <> NULL) value="{{\Carbon\Carbon::parse($iso->v_tgl_ETA)->format('Y-m-d')}}" @else value="" @endif class="form-control filter-set" aria-label="Tanggal Awal" name="tgl_eta">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal Bongkar / Dooring</label>
                                                                    <input type="date" @if ($iso->v_tgl_bongkar <> NULL) value="{{\Carbon\Carbon::parse($iso->v_tgl_bongkar)->format('Y-m-d')}}" @else value="" @endif name="tgl_bongkar" class="form-control filter-set" aria-label="Tanggal Awal">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                                    <label class="filter-set">Tanggal InDepo*</label>
                                                                    <input type="date" @if ($iso->v_tgl_indepo_real <> NULL) value="{{\Carbon\Carbon::parse($iso->v_tgl_indepo_real)->format('Y-m-d')}}" @else value="" @endif name="tgl_indepo_real" class="form-control filter-set">
                                                                </div>
                                                            </div>
                                                            <div class="row parent">
                                                                <a class="btn btn-info text-black col-lg-5 col-md-12 col-sm-12 mb-2" target="_blank">Print - {{$iso->v_transnumber}}</a> 
                                                                <a href="{{ route('isotank.modify', Crypt::encrypt($iso->v_transid)) }}" class="btn btn-primary col-lg-6 col-md-12 col-sm-12 mb-2" target="_blank">More Edit - {{$iso->v_transnumber}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-dismiss="modal" href="#" type="button" data-target="#modalvoid{{$iso->id}}" data-toggle="modal" class="btn btn-danger">Void</a>
                                                            <a type="button" href="{{ route('duplicateSetValue', Crypt::encrypt($iso->v_uid)) }}" class="btn btn-dark" target="_blank">Duplicate</a>
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal fade bd-example-modal-sm" id="modalvoid{{$iso->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    @endif 
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