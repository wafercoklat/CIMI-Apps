<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('comp.header-script')

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper ">
            <div class="content-wrapper d-flex align-items-center auth px-0 background-login">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 col-md-6 col-sm-10 mx-auto">
                        <div class="auth-form-light text-left py-4 px-4 px-sm-5 rad">
                            <div class="brand-logo text-center">
                                <img class="resize-logo" src="{{asset('/images/logo-full-mini.png')}}" alt="logo" />
                                <h4>{{$info->Company}}</h4>
                            </div>
                            <h4>Selamat Datang di CIMI-APPS</h4>
                            <h6 class="fw-light">Silahkan Login Untuk Melanjutkan</h6>
                            <form class="pt-3" action="{{route('loginconnect')}}" method="POST">
                                @csrf
                                @if(session('errors'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Peringatan : 
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</a>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <label class="form-check-label text-muted">
                                        Lupa password?
                                    </label>
                                    <a href="#" class="auth-link text-black">Ubah Sekarang</a>
                                </div>
                                <div class="text-center mt-3 fw-light">
                                    Tidak Punya Akun? <br><a href="#" class="text-primary">Silahkan Hubungi Administrator</a>
                                </div>
                                <div class="text-center mt-2 mb-auto"><p>versi {{$info->Versi}}</p></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('comp.footer-script')
</body>
</html>