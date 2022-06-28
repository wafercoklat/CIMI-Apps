@extends('main') @section('content')
<div class="content-wrapper">
    @if(session()->has('success'))<span id="alert_" style="visibility:hidden">success</span>@endif @if(session()->has('error'))<span id="alert_" style="visibility:hidden">fail</span>@endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card px-5">
            <div class="col-12 grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="row">
                        <h4 class="card-title">Buat Penjadwalan Isotank</h4>
                        <p class="card-description">
                            Mohon diperhatikan dengan seksama
                        </p>
                        <form id="add-isotank_" action="{{ route('isotank.store') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 mb-30">
                                <div class="card card-statistics h-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                <h4 class="card-title">No. Packing List* - Partai 1</h4>
                                                @if($errors->any())
                                                    <label style="color: red">{{$errors->first()}}</label>
                                                @endif
                                                <input type="text" class="form-control fix1" placeholder="PL-SO/0001/CMI/22" id="PList" name="PL"/>
                                            </div>
                                            <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                                <h4 class="card-title">Jumlah Partai</h4>
                                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control fix1" placeholder="Partai" name="jlhpartai" id="jlhpartai"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <h5 class="card-title">Pilih Jadwal</h5>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group"> <label for="exampleInputName1">Tanggal OutDepo*</label> <input type="date" class="form-control fix1 p-hor" id="startDate" placeholder="start" id="outdepo" name="outdepo"> </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label for="exampleInputName1">Prediksi Tanggal Indepo*</label> <input type="date" class="form-control fix1 p-hor" id="endDate" placeholder="start"  id="indepo" name="indepo"> </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group row"> <label for="exampleInputName1">Pilih Lokasi Isotank di Ambil*</label> <select id="origin" class="col-12 required" name="origin"> <option></option>  </select> </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group row"> <label for="exampleInputName1">Pilih Lokasi Tujuan Isotank*</label> <select id="destinasi" class="col-12 required" name="destinasi"> <option></option>  </select></div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12" id="btn-cl"> <button type="button" id="checkISO" class="btn btn-primary me-2">Check</button> </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-sm-12 ml-4" id="disable-">
                                                <h5 class="card-title">Isi Detail</h5>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group row mr-2"> <label for="exampleInputName1">Pilih Isotank*</label> <select id="isotank" class="disabled col-12 required" name="isotank"> <option></option> </select> </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group row"> <label for="exampleInputName1">Pilih Customer*</label> <select id="customer" class="col-12 required" name="customer"> <option></option></select></div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">Lokasi Pabrik (Loading)*</label><br> <input type="text" class="form-control fix1" placeholder="PABRIK A" name="loading"> </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">Lokasi Pabrik (Bongkar)*</label><br> <input type="text" class="form-control fix1" placeholder="PABRIK B" name="bongkar"> </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="form-group row mr-2"> <label for="exampleInputName1">Pilih Transport*</label> <select id="transport" class="required" name="transport"> <option></option> </select></div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">No Transport</label> <input type="text" class="form-control fix1 mr-2" id="exempleInputName1" placeholder="TEMAS/001" name="notransport"> </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Cargo</label> 
                                                        <input type="text" class="form-control fix1" placeholder="GLYCERIN/" name="cargo"> </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label for="exampleInputName1">Remark</label> <textarea class="form-control h-auto" rows="5" placeholder="Remark" name="remark"></textarea> </div>
                                                    <div class="form-group">
                                                        <hr class="my-2 devider"> </div>
                                                    <div class="row col-lg-12 col-md-12 col-sm-12 mr-2">
                                                        <div class="form-group col-lg-3"> <label for="exampleInputName1">Tanggal Muat / Loading</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_muat"> </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="exampleInputName1">Tanggal ETD</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_etd"> </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="exampleInputName1">Tanggal ETA</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_eta"> </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="exampleInputName1">Tanggal Bongkar / Dooring</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_bongkar"> </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="exampleInputName1">Tanggal InDepo</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_indepo"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-2" id="disable2-">
                                <div class="card-body row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label>Apakah ada yakin untuk mensubmit data ini? </label>
                                        <label class="form-check-label">
                                            <span class="card-description">Gandakan Jadwal Ini Untuk Partai 2?</span>
                                            <input type="checkbox" class="form-check-input" name="duplicate">                                            
                                          <i class="input-helper"></i></label>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary me-2">Submit Data</button>
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
<script type="text/javascript">
    var cust = JSON.parse(@Json($cust));
    var loc = JSON.parse(@Json($loc));
    var tra = JSON.parse(@Json($tra));
</script>
@endsection