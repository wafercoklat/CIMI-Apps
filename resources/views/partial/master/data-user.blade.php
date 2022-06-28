@extends('main') @section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center">
                            <div class="ml-2 col-lg-12 col-md-12 col-sm-12 align-items-center">
                                <h2>Master Data <b>Pengguna</b></h2>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-lg-3 col-md-6 col-sm-12">
                                    <a class="btn btn-success btn-block col-12" type="button"  href="#" data-target="#masterData" data-toggle="modal" style="margin-top: 10px">
                                        <i class="fa fa-filter"></i> Tambah Pengguna
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->password}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>@if ($user->NA == 1) Aktif @elseif($user->NA == 2) Pending @else Non-Aktif @endif</td>
                                    <td>
                                        <a href="#" type="button" data-target="#editUser{{$user->id}}" data-toggle="modal"><span class="badge bg-info">Detail</span></a> 
                                        <a type="button"><span class="badge bg-danger" onclick="showSwal({{$user->id}},'{{$user->name}}', 'user')">Delete</span></a>                                       
                                    </td>
                                </tr>

                                <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <form action="{{ route('masterdata.user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header ph-modal">
                                                    <div class="modal-title">
                                                        <div class="mb-30">
                                                            <h5>Master Data</h5>
                                                            <h2>Update Data Pengguna</h2>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><h1>&times;</h1></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Username</label>
                                                            <input type="text" class="form-control filter-set" aria-label="Nama Isotank" name="username" value="{{$user->username}}">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Nama</label>
                                                            <input type="text" class="form-control filter-set" aria-label="Nama Isotank" name="name" value="{{$user->name}}">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Email</label>
                                                            <input type="text" class="form-control filter-set" aria-label="Nama Isotank" name="email" value="{{$user->email}}">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Password</label>
                                                            <input type="text" class="form-control filter-set" aria-label="Nama Isotank" name="password" value="{{$user->password}}">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Role</label>
                                                            @if ($user->username == 'admin')
                                                                <select class="form-select form-select-sm col-12" aria-label="Default select example" id="stat-filter" name="role" disabled> 
                                                                    <option value="Administrator" selected>Administrator</option>
                                                                </select>
                                                            @else
                                                                <select class="form-select form-select-sm col-12" aria-label="Default select example" id="stat-filter" name="role"> 
                                                                    <option value="Administrator" @if ($user->role == 'Administrator') selected @endif>Administrator</option>
                                                                    <option value="Editor" @if ($user->role == 'Editor') selected @endif>Editor</option>
                                                                    <option value="Validator" @if ($user->role == 'Validator') selected @endif>Validator</option>
                                                                    <option value="Approver" @if ($user->role == 'Approver') selected @endif>Approver</option>
                                                                    <option value="Operasional" @if ($user->role == 'Operasional') selected @endif>Operasional</option>
                                                                </select>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Status</label>
                                                            <select class="form-select form-select-sm col-12" aria-label="Default select example" id="stat-filter" name="NA"> 
                                                                <option value="1" @if ($user->NA == 1) selected @endif>Aktif</option>
                                                                <option value="0" @if ($user->NA == 0) selected @endif>Non-Aktif</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label class="filter-set">Human Resource Departement</label>
                                                            <select class="form-select form-select-sm col-12" aria-label="Default select example" id="stat-filter" name="dept"> 
                                                                <option value="1" @if ($user->dept == 1) selected @endif>Ya</option>
                                                                <option value="0" @if ($user->dept == 0) selected @endif>Tidak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($user->username <> 'admin')
                                                    <div class="modal-footer">
                                                        <a href="{{route('masterdata.user.updatewithToken', $user->id)}}" type="button"><span class="btn btn-info">Update Password by Email</span></a>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="masterData" tabindex="-1" role="dialog" aria-hidden="true">
                            <form action="{{ route('masterdata.user.add') }}" method="POST">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ph-modal">
                                            <div class="modal-title">
                                                <div class="mb-30">
                                                    <h5>Master Data</h5>
                                                    <h2>Tambah Data Pengguna</h2>
                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><h1>&times;</h1></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-lg-8 col-md-12 col-sm-12">
                                                    <label class="filter-set">Email</label>
                                                    <input type="text" class="form-control filter-set" aria-label="Nama Customer" name="email">
                                                </div>
                                                <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                                    <label class="filter-set">Role</label>
                                                    <select class="form-select form-select-sm col-12" aria-label="Default select example" id="stat-filter" name="role"> 
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Editor">Editor</option>
                                                        <option value="Validator">Validator</option>
                                                        <option value="Approver">Approver</option>
                                                        <option value="Operasional" selected>Operasional</option>
                                                    </select>
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