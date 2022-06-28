<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,
         shrink-to-fit=no">
      <title>CMI APPS - PT Cakraindo Mitra Internasional </title>
      <!-- plugins:css -->
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/feather/feather.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/typicons/typicons.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/simple-line-icons/css/simple-line-icons.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/css/vendor.bundle.base.css">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/vendors/selectize/css/selectize.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/js/select.dataTables.min.css">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/css/vertical-layout-light/style.css">
      <link rel="stylesheet"
         href="http://127.0.0.1:8000/css/datatable/datatables.css">
      <!-- endinject -->
      <link rel="shortcut icon" href="http://127.0.0.1:8000/images/favicon.png"
         />
   </head>
   <body>
      <div class="content-wrapper">
         <div class="row d-flex align-items-center">
            <div class="d-flex justify-content-center">
               <h4>Silahkan Pilih Menu Di Bawah Ini</h4>
            </div>
            <div class="col-lg-8">
               <div class="row portfolio-grid">
                  @foreach ($data as $item)
                     @if ($item->menu == 'Dashboard' || Auth::user()->role == 'Administrator')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                           <figure class="effect-text-in">
                              <img
                                 src="http://127.0.0.1:8000/images/icons/dashboard.png"
                                 alt="image" />
                              <figcaption>
                                 <p class="text-black">Menu : Dashboard</p>
                              </figcaption>
                           </figure>
                           <h4 class="text-center">Dashboard</h4>
                        </div>
                     @endif
                     @if ($item->menu == 'Isotank' || Auth::user()->role == 'Administrator')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                           <figure class="effect-text-in">
                              <img
                                 src="http://127.0.0.1:8000/images/icons/Isotank.png"
                                 alt="image" />
                              <figcaption>
                                 <p class="text-black">Menu : Penjadwalan, Daftar Transaksi</p>
                              </figcaption>
                           </figure>
                           <h4 class="text-center">Isotank</h4>
                        </div>
                     @endif
                     @if ($item->menu == 'Revisi' || Auth::user()->role == 'Administrator')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                           <figure class="effect-text-in">
                              <img
                                 src="http://127.0.0.1:8000/images/icons/revision.png"
                                 alt="image" />
                              <figcaption>
                                 <p class="text-black">Masih Dalam Pengerjaan</p>
                              </figcaption>
                           </figure>
                           <h4 class="text-center">Revisi</h4>
                        </div>
                     @endif
                     @if ($item->menu == 'Karyawan' || Auth::user()->role == 'Administrator')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                           <figure class="effect-text-in">
                              <img
                                 src="http://127.0.0.1:8000/images/icons/karyawan.png"
                                 alt="image" />
                              <figcaption>
                                 <p class="text-black">Menu : Form Kepegawaian</p>
                              </figcaption>
                           </figure>
                           <h4 class="text-center">Kepegawaian</h4>
                        </div>
                     @endif
                     @if ($item->menu == 'Master' || Auth::user()->role == 'Administrator')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                           <figure class="effect-text-in">
                              <img
                                 src="http://127.0.0.1:8000/images/icons/masterdata.png"
                                 alt="image" />
                              <figcaption>
                                 <p class="text-black">Menu : Pengguna, Isotank, Karyawan, Otoritas</p>
                              </figcaption>
                           </figure>
                           <h4 class="text-center">Master Data</h4>
                        </div>
                     @endif
                  @endforeach
                  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                     <figure class="effect-text-in">
                        <img
                           src="http://127.0.0.1:8000/images/icons/logout.png"
                           alt="image" />
                     </figure>
                     <h4 class="text-center">Logout</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer class="footer fixed-bottom">
         <div class="d-sm-flex justify-content-center justify-content-sm-between">
               <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> Official Website <a href="https://www.cakraindo.com/" target="_blank">
                  <span class="badge bg-danger"><b>PT Cakraindo Mitra Internasional</b></span></a></span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <span class="badge bg-success"><b>IT Departement</b></span> at 2021. All rights reserved.</span>
         </div>
      </footer> 
   </body>
   <!-- plugins:js -->
   <script src="http://127.0.0.1:8000/js/jquery-3.3.1.min.js"></script>
   <script src="http://127.0.0.1:8000/js/plugins-jquery.js"></script>
   <script src="http://127.0.0.1:8000/js/modal-demo.js"></script>
   <script src="http://127.0.0.1:8000/js/sweetalert.js"></script>
   <script src="http://127.0.0.1:8000/js/alerts.js"></script>
   <script src="http://127.0.0.1:8000/js/form-cuti.js"></script>
   <script src="http://127.0.0.1:8000/js/datatables.js"></script>
   <script src="http://127.0.0.1:8000/js/datatables.min.js"></script>
   <script src="http://127.0.0.1:8000/js/dataTables.dateTime.min.js"></script>
   <script src="http://127.0.0.1:8000/js/moments.js"></script>
   <script
      src="http://127.0.0.1:8000/vendors/selectize/js/standalone/selectize.js"></script>
   <script type="text/javascript"
      src="http://127.0.0.1:8000/js/jquery.repeater.js"></script>
   <script type="text/javascript" src="http://127.0.0.1:8000/js/custom.js"></script>
   <script src="http://127.0.0.1:8000/js/dashboard.js"></script>
</html>
