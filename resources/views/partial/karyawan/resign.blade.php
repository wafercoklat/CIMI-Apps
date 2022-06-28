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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection