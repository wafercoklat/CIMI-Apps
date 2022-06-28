@extends('main') @section('content')
<div class="content-wrapper justify-content-center">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center">
                            <div class="ml-2 col-lg-12 col-md-12 col-sm-12 align-items-center">
                                <h2>Master Data <b>Location</b></h2>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-lg-3 col-md-6 col-sm-12">
                                    <a class="btn btn-success btn-block col-12" type="button"  href="#" data-target="#masterData" data-toggle="modal" style="margin-top: 10px">
                                        <i class="fa fa-filter"></i> Tambah Lokasi
                                    </a>
                                </div>
                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <label class="filter-set">Pencarian</label>
                                    <br>
                                    <input class="clearable col-12" type="text" id="search-filter" class="form-control filter-set" aria-label="Pencarian">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover pb-2" width="100%" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loc as $loc)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$loc->code}}</td>
                                    <td>{{$loc->name}}</td>
                                    <td><a href="#" type="button" data-target="#editCustomer{{$loc->id}}" data-toggle="modal"><span class="badge  bg-info">Edit</span></a> <a type="button"><span class="badge bg-danger" onclick="showSwal({{$loc->id}},'{{$loc->name}}', 'location')">Delete</span></a></td>
                                </tr>

                                <div class="modal fade" id="editCustomer{{$loc->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <form action="{{ route('masterdata.location.update', $loc->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header ph-modal">
                                                    <div class="modal-title">
                                                        <div class="mb-30">
                                                            <h5>Master Data</h5>
                                                            <h2>Update Data Location</h2>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><h1>&times;</h1></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Code</label>
                                                            <select class="form-select form-select-sm col-12" aria-label="Default select example" id="loc-filter" name="code"> 
                                                                <option value="MDN" @if ($loc->code == 'MDN') selected @endif>Medan</option>
                                                                <option value="JKT" @if ($loc->code == 'JKT') selected @endif>Jakarta</option>
                                                                <option value="SBY" @if ($loc->code == 'SBY') selected @endif>Surabaya</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                            <label class="filter-set">Lokasi</label>
                                                            <input type="text" class="form-control filter-set" aria-label="Nama Lokasi" name="name" value="{{$loc->name}}" style="text-transform:uppercase">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="masterData" tabindex="-1" role="dialog" aria-hidden="true">
                            <form action="{{ route('masterdata.location.add') }}" method="POST">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ph-modal">
                                            <div class="modal-title">
                                                <div class="mb-30">
                                                    <h5>Master Data</h5>
                                                    <h2>Tambah Data Lokasi</h2>
                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><h1>&times;</h1></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                    <label class="filter-set">Code</label>
                                                    <select class="form-select form-select-sm col-12" aria-label="Default select example" id="loc-filter" name="code"> 
                                                        <option value="MDN" selected>Medan</option>
                                                        <option value="JKT">Jakarta</option>
                                                        <option value="SBY">Surabaya</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                    <label class="filter-set">Lokasi</label>
                                                    <input type="text" class="form-control filter-set" aria-label="Nama Customer" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Tambah</button>
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
</div>
@endsection