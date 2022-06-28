@extends('main') @section('content')
<link rel="stylesheet" href="{{asset('vendors/selectize/css/selectize.css')}}">

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="calendar-main mb-30">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-12 sm-mb-30">
                                        <span><h4 class="text-muted">Nomor Isotank</h4></span>
                                        <div class="m-t-10 mb-2">
                                            <div class="bg-success fc-event" data-class="bg-success">
                                                <i class="fa fa-circle mr-2 vertical-middle"></i><span id="isotankdet"></span>
                                            </div>
                                            <div class="mb-2">
                                                <span>Status</span>
                                                <div id="statusdet"></div>
                                            </div>
                                            <div class="mb-2">
                                                <span>Lokasi Saat ini</span>
                                                <h4 class="mb-0 fw-bold" id="lokasiterakhirdet"></h4>
                                            </div>
                                        </div>
                                        <br>
                                        <span><h4 class="text-muted">Aktifitas Terakhir</h4></span>
                                        <div class="mb-10">
                                            <div class="mb-2">
                                                <span>Transaksi Isotank</span>
                                                <h4 class="mb-0 fw-bold" id="transnodet"></h4>
                                            </div>
                                            <div class="mb-2">
                                                <span>Tanggal Muat</span>
                                                <h4 class="mb-0 fw-bold" id="tgl_muatdet"></h4>
                                            </div>
                                            <div class="mb-2">
                                                <span>Tanggal Indepo</span>
                                                <h4 class="mb-0 fw-bold" id="tgl_indepodet"></h4>
                                            </div>
                                            <div class="mb-2">
                                                <span>Origin</span>
                                                <h4 class="mb-0 fw-bold" id="oridet"></h4>
                                            </div>
                                            <div class="mb-2">
                                                <span>Destinasi</span>
                                                <h4 class="mb-0 fw-bold" id="desdet"></h4>
                                            </div>
                                            <div class="mb-2">
                                                <span>Transport</span>
                                                <h4 class="mb-0 fw-bold" id="transportdet"></h4>
                                            </div>
                                            <div class="mb-2">
                                                <span>Cargo</span>
                                                <h4 class="mb-0 fw-bold" id="cargo"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div id="calendar-list"></div>
                                <div id='calendar-container'>
                                    <div id='calendar-list'></div>
                                </div>
                                <div id="calendarModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 id="modalTitle" class="modal-title"></h4>
                                            </div>
                                            <div id="modalBody" class="modal-body"> </div>
                                            <div id="start" class="modal-body"> </div>
                                            <div id="end" class="modal-body"> </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Add Category -->
                                {{--
                                <div id="modal2" class="modal fade">
                                    <div class="modal-dialog">
                                        <form action="{{ route('Isotank.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Penjadwalan Isotank</b></h4>
                                                </div>
                                                <div class="modal-body fixmodal1">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-2">
                                                            <label class="control-label">Tanggal Mulai</label>
                                                            <input type="date" class="form-control fix1" name="SD" id="startDate" />
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="control-label">Tanggal InDepo</label>
                                                            <input type="date" class="form-control fix1" name="ED" id="endDate" />
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="control-label">Isotank</label>
                                                            <select id="origin" class="w-100" name="ISO">
                                                            <option selected="true" disabled="disabled">Pilih Isotank . . .</option>
                                                                                @foreach ($iso as $isotank => $id)
                                                                                    <option value="{{$id}}">{{$isotank}}</option>
                                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="control-label">No Cargo</label>
                                                            <input class="form-control form-white" placeholder="#CARGO-XXXX" type="text" name="CR" />
                                                        </div>
                                                        <div class="dropdown-divider2"></div>
                                                        <div class="col-md-12 mb-2">
                                                            <label class="control-label">Customer</label>
                                                            <select id="select2" class="w-100" name="CS">
                                                                                <option selected="true" disabled="disabled">Pilih Customer . . .</option>
                                                                                @foreach ($cust as $customer => $id)
                                                                                    <option value="{{$id}}">{{$customer}}</option>
                                                                                @endforeach
                                                                              </select>
                                                        </div>
                                                        <div class="dropdown-divider2"></div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="control-label">Awal</label>
                                                            <select id="origin" class="w-100" name="OR">
                                                                                <option selected="true" disabled="disabled">Pilih Lokasi Awal . . .</option>
                                                                                @foreach ($loc as $location => $id)
                                                                                    <option value="{{$id}}">{{$location}}</option>
                                                                                @endforeach
                                                                              </select>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="control-label">Tujuan</label>
                                                            <select id="destinasi" class="w-100" name="DS">
                                                                                <option selected="true" disabled="disabled">Pilih Lokasi Tujuan . . .</option>
                                                                                @foreach ($loc as $location => $id)
                                                                                    <option value="{{$id}}">{{$location}}</option>
                                                                                @endforeach
                                                                              </select>
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <label class="control-label">No Packing List</label>
                                                            <input class="form-control form-white" placeholder="#PL-SO/LM/XXXX/CMI/XX" type="text" name="PL" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection