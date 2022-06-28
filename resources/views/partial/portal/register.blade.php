<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('comp.header-script')

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img class="resize-logo2" src="{{asset('/images/logo-quarter.png')}}" alt="logo" />
                            </div>
                            <h4>Pendaftaran User Baru</h4>
                            <h6 class="fw-light">Silahkan Isi Data di Bawah Ini</h6>
                            <form class="pt-3" action="{{route('register.done',  $user->id)}}" method="POST">
                                @csrf @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nama" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{$user->email}}" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                            Saya Setuju Dengan Semua Syarat & Ketentuan
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftarkan</button>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Sudah Punya Akun? <a href="{{route('login.index')}}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('comp.footer-script')
</body>
</html>