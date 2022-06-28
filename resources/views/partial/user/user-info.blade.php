@extends('main') @section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center text-center">
                        <div>
                            <span class="user-circle mb-2">{{strtoupper(substr((Auth::user()->name),0,1))}}</span>
                            <h4>{{Auth::user()->username}}</h4>
                            <p class="text-muted mb-0">{{Auth::user()->role}}</p>
                        </div>
                        <p class="mt-2 card-text"> - </p>
                        <div class="border-top pt-3">
                            <div class="row">
                                <div class="col-4">
                                    <h6>Nama</h6>
                                    <p>{{Auth::user()->name}}</p>
                                </div>
                                <div class="col-4">
                                    <h6>Email</h6>
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                                <div class="col-4">
                                    <h6>Password</h6>
                                    <p>@if(Auth::user()->cabang == 'M')Medan @elseif(Auth::user()->cabang == 'J')Jakarta @elseif(Auth::user()->cabang == 'S')Surabaya @endif</p>
                                </div>
                            </div>
                        </div>
                        <div class="border-top pt-3 text-center">
                            <img class="tandatangan" src={{Asset("storage/file_tanda_tangan/".Auth::user()->id.".jpg")}}>
                        </div>
                       
                        <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('user.uploadsignature') }}" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file" placeholder="Choose image" required name="image">
                                    @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                   
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info btn-sm mt-3 mb-4">Upload Tanda Tangan</button>
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