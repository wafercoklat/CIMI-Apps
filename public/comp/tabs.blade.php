<div class="row">
    <div class="col-lg-3 col-md-12 col-sm-12">
        <h5 class="card-title">Pilih Jadwal</h5>
        <div class="col-lg-12 col-md-12 col-sm-12 form-group"> <label for="exampleInputName1">Tanggal OutDepo*</label> <input type="date" class="form-control fix1 p-hor" id="startDate" placeholder="start" name="outdepo[]"> </div>
        <div class="col-lg-12 col-md-12 col-sm-12 form-group"> <label for="exampleInputName1">Prediksi Tanggal Indepo*</label> <input type="date" class="form-control fix1 p-hor" id="endDate" placeholder="start" name="indepo[]"> </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group row"> <label for="exampleInputName1">Pilih Lokasi Isotank di Ambil*</label>
                <select id="origin_" class="col-12" name="origin[]"> <option selected="true" disabled="disabled">Pilih Lokasi . . .</option> @foreach ($loc as $location => $id) <option value="{{$id}}">{{$location}}</option> @endforeach </select>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group row"> <label for="exampleInputName1">Pilih Lokasi Tujuan Isotank*</label> <select id="destinasi_" class="col-12" name="destinasi[]"> <option selected="true" disabled="disabled">Pilih Lokasi . . .</option> @foreach ($loc as $location => $id) <option value="{{$id}}">{{$location}}</option> @endforeach </select>                </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12"> <button type="button" id="checkISO" class="btn btn-primary me-2">Check</button> </div>
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12 ml-4" id="disable-">
        <h5 class="card-title">Isi Detail</h5>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group row mr-2"> <label for="exampleInputName1">Pilih Isotank*</label> <select id="isotank_" class="disabled col-12" name="isotank[]"> <option></option> </select> </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group row"> <label for="exampleInputName1">Pilih Customer*</label> <select id="cust_" class="col-12" name="customer[]"> <option selected="true" disabled="disabled">Pilih Customer . . .</option> @foreach ($cust as $customer => $id) <option value="{{$id}}">{{$customer}}</option> @endforeach </select>                    </div>
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">Lokasi Pabrik (Loading)*</label> <input type="text" class="form-control fix1" id="exampleSelectGender" placeholder="PABRIK A" name="loading[]"> </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">Lokasi Pabrik (Bongkar)*</label> <input type="text" class="form-control fix1" id="exampleSelectGender" placeholder="PABRIK B" name="bongkar[]"> </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">No. Packing List*</label> <input type="text" class="form-control fix1" id="exampleSelectGender" placeholder="PL-SO/0001/CMI/22" name="packinglist[]"> </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">Cargo</label> <input type="text" class="form-control fix1" id="exampleSelectGender" placeholder="GLYCERIN/" name="cargo[]"> </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group row mr-2"> <label for="exampleInputName1">Pilih Transport*</label> <select id="transport_" class="col-12" name="transport[]"> <option selected="true" disabled="disabled">Pilih Transport . . .</option> @foreach ($tra as $trasnsport => $id) <option value="{{$id}}">{{$trasnsport}}</option> @endforeach </select>                    </div>
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">No Transport</label> <input type="text" class="form-control fix1 mr-2" id="exempleInputName1" placeholder="TEMAS/001" name="notransport[]"> </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12"> <label for="exampleInputName1">Remark</label> <textarea class="form-control h-auto" rows="5" placeholder="Remark" name="remark[]"></textarea> </div>
            <div class="form-group">
                <hr class="my-2 devider"> </div>
            <div class="row col-lg-12 col-md-12 col-sm-12 mr-2">
                <div class="form-group col-lg-3"> <label for="exampleInputName1">Tanggal Muat / Loading</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_muat[]"> </div>
                <div class="form-group col-lg-3"> <label for="exampleInputName1">Tanggal ETD</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_etd[]"> </div>
                <div class="form-group col-lg-3"> <label for="exampleInputName1">Tanggal ETA</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_eta[]"> </div>
                <div class="form-group col-lg-3"> <label for="exampleInputName1">Tanggal Bongkar / Dooring</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_bongkar[]"> </div>
                <div class="form-group col-lg-3"> <label for="exampleInputName1">Tanggal InDepo</label> <input type="date" class="form-control fix1" id="exampleInputName1" placeholder="start" name="tgl_indepo[]"> </div>
            </div>
        </div>
    </div>
</div>