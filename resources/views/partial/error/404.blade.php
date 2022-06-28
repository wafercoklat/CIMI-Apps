<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('comp.header-script')
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper py-0">
                <div class="main-panel">
                <div class="container-scroller">
                    <div class="container-fluid page-body-wrapper full-page-wrapper">
                      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
                        <div class="row flex-grow">
                          <div class="col-lg-7 mx-auto text-white">
                            <div class="row align-items-center d-flex flex-row">
                              <div class="col-lg-6 text-lg-right pr-lg-4">
                                <h1 class="display-1 mb-0">404</h1>
                              </div>
                              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                <h2>MAAF!</h2>
                                <h3 class="fw-light">Halaman Yang Anda Cari Tidak Ditemukan Atau Dibatasi.</h3>
                              </div>
                            </div>
                            <div class="row mt-5">
                              <div class="col-12 text-center mt-xl-2">
                                <a class="text-white font-weight-medium" href="{{route('login.index')}}">Kembali Ke Halaman Utama</a>
                              </div>
                            </div>
                            <div class="row mt-5">
                              <div class="col-12 mt-xl-2">
                                <p class="text-white font-weight-medium text-center">Copyright &copy; 2021  All rights reserved.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- content-wrapper ends -->
                    </div>
                    <!-- page-body-wrapper ends -->
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>