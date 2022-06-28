@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('duplicate'))<span id="alert_" style="visibility:hidden">duplicate</span>@endif @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card px-5">
            <div class="col-12 grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="row">
                        <h3 class="card-title">Duplicate Penjadwalan Isotank</h3>
                        <h3>Partai {{$iso[0]->partai + 1}} / {{$iso[0]->jlh_Partai}}</h3>
                        <form id="add-isotank_" action="{{ route('isotank.store') }}" method="POST"> 
                            @csrf
                            <div class="col-xl-12 mb-30">
                                <div class="card card-statistics h-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                <h4 class="card-title">No. Packing List*</h4>
                                                <input type="text" hidden name="nopartai" value="{{$iso[0]->partai + 1}}">
                                                <input type="text" hidden name="PL" value="{{$iso[0]->packinglist_no}}">
                                                <input type="text" hidden name="jlhpartai" value="{{$iso[0]->jlh_Partai}}">
                                                <input type="text" hidden name="customer" value="{{$iso[0]->cust_id}}">
                                                <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->packinglist_no}}" disabled/>
                                            </div>
                                            <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                                <h4 class="card-title">Jumlah Partai</h4>
                                                <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->jlh_Partai}}" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <h5 class="card-title">Pilih Jadwal</h5>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group"> <label for="exampleInputName1">Prediksi Tanggal OutDepo*</label> <input type="date" class="form-control fix1 p-hor" value="{{$iso[0]->tgl_outdepo}}" name="outdepo" id="startDate_"> </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label for="exampleInputName1">Prediksi Tanggal Indepo*</label> <input type="date" class="form-control fix1 p-hor" value="{{$iso[0]->tgl_indepo}}" name="indepo" id="endDate_"> </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group row"> 
                                                        <label for="exampleInputName1">Pilih Lokasi Isotank di Ambil*</label> 
                                                        <select id="select_opt_origin" class="col-12" name="origin">
                                                            @foreach ($loc as $item)
                                                                <option value="{{$item->id}}" @if ($iso[0]->ori_id == $item->id) Selected @endif>{{$item->code}}</option>
                                                            @endforeach   
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group row"> 
                                                        <label for="exampleInputName1">Pilih Lokasi Tujuan Isotank*</label> 
                                                        <select id="select_opt_destination" class="col-12" name="destinasi">
                                                            @foreach ($loc as $item)
                                                                <option value="{{$item->id}}" @if ($iso[0]->des_id == $item->id) Selected @endif>{{$item->code}}</option>
                                                            @endforeach   
                                                        </select>     
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12" id="btn-cl"> <button type="button" id="checkISO_" class="btn btn-primary me-2">Check</button> </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-sm-12 ml-4">
                                                <h5 class="card-title">Isi Detail</h5>
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Pilih Isotank*</label>
                                                        <select id="select_opt_isotank" placeholder="Silahkan Pilih Jadwal Dahulu" class="disabled col-12" name="isotank"> <option></option> </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Pilih Customer*</label>
                                                        <input type="text" class="form-control fix1" value="{{$iso[0]->customername}}" disabled>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Lokasi Pabrik (Loading)*</label>
                                                        <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->lokasi_loading}}" name="loading">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Lokasi Pabrik (Bongkar)*</label>
                                                        <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->lokasi_bongkar}}" name="bongkar">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group row mr-2">
                                                            <label for="exampleInputName1">Pilih Transport*</label>
                                                            <select id="select_opt_transport" class="col-12" name="transport"> 
                                                                @foreach ($tra as $item)
                                                                    <option value="{{$item->id}}" @if ($iso[0]->transport_id == $item->id) Selected @endif>{{$item->code}}</option>
                                                                @endforeach   
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">No Transport</label>
                                                        <input type="text" class="form-control fix1 mr-2" id="exempleInputName1" value="{{$iso[0]->transport_no}}" name="notransport">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Cargo</label>
                                                        <input type="text" class="form-control fix1" id="exampleSelectGender" value="{{$iso[0]->cargo}}" name="cargo">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Remark</label>
                                                        <textarea class="form-control h-auto" rows="5" value="{{$iso[0]->deskripsi}}"" name="remark"></textarea> 
                                                        </div>
                                                    <div class="form-group ">
                                                        <hr class="my-2 devider "> 
                                                    </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 mr-2 ">
                                                    <div class="form-group col-lg-3 "> 
                                                        <label for="exampleInputName1 ">Tanggal Muat / Loading</label> 
                                                        <input type="date" class="form-control fix1" value="{{$iso[0]->tgl_muat}}"  id="exampleInputName1" name="tgl_muat">
                                                    </div>
                                                    <div class="form-group col-lg-3">
                                                        <label for="exampleInputName1">Tanggal ETD</label>
                                                        <input type="date" class="form-control fix1" value="{{$iso[0]->tgl_ETD}}"  id="exampleInputName1"  name="tgl_etd">
                                                    </div>
                                                    <div class="form-group col-lg-3">
                                                        <label for="exampleInputName1">Tanggal ETA</label>
                                                        <input type="date" class="form-control fix1" value="{{$iso[0]->tgl_ETA}}"  id="exampleInputName1"  name="tgl_eta">
                                                    </div>
                                                    <div class="form-group col-lg-3">
                                                        <label for="exampleInputName1">Tanggal Bongkar / Dooring</label>
                                                        <input type="date" class="form-control fix1" value="{{$iso[0]->tgl_bongkar}}"  id="exampleInputName1"  name="tgl_bongkar">
                                                    </div>
                                                    <div class="form-group col-lg-3">
                                                        <label for="exampleInputName1">Tanggal InDepo</label>
                                                        <input type="date" class="form-control fix1" value="{{$iso[0]->tgl_indepo_real}}"  id="exampleInputName1"  name="tgl_indepo_real">
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
                                <label>Apakah ada yakin untuk men-duplicate data ini? </label>
                                <span class="card-description">Gandakan Jadwal Ini Untuk Partai {{$iso[0]->partai + 2}}?</span>
                                <input type="checkbox" class="form-check-input" name="duplicate">                                            
                                          <i class="input-helper"></i></label>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary me-2">Duplicate Data</button>
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