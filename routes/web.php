<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IsotankController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MasterDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Portal
Route::get('/', [PortalController::class, 'loginBase']);

    // Login
    Route::resource('/login', PortalController::class);
    Route::get('/register/user/{token}', [PortalController::class, 'register'])->name('registerwithToken');
    Route::put('/register/user/done/{id}', [PortalController::class, 'storeRegisterUser'])->name('register.done');

    Route::post('/membuat-koneksi-login', [PortalController::class, 'login'])->name('loginconnect');

    //Register

        // Success Login
        Route::group(['middleware' => 'auth'], function () {
            // Dashboard   
                Route::resource('/dashboard', IsotankController::class);
            
            // Isotank
                Route::resource('/isotank', IsotankController::class);
                Route::get('/isotank/calendar/{id}', [IsotankController::class, 'fecthIsotankMonth']);
                Route::get('/isotank/info/{id}', [IsotankController::class, 'show'])->name('isotank.info');
                Route::get('/isotank/fecthIsotankMonth/{id}', [IsotankController::class, 'fecthIsotankMonth']);
                Route::get('/isotank/edit/{id}', [IsotankController::class, 'edit'])->name('isotank.modify');
                Route::get('/isotank/checkPlist/{PL}', [IsotankController::class, 'checkPList'])->name('isotank.checkPList');
                Route::put('/isotank/editIsotank/full/{id}', [IsotankController::class, 'updateModify'])->name('isotank.updatemodify');
                Route::get('/isotank/checkiso/{start}/{end}/{loc}', [IsotankController::class, 'checkIsotank']);
                Route::put('/isotank/updateIsotank/{id}', [IsotankController::class, 'updateModal']);
                Route::get('/isotank/duplicate/{id}', [IsotankController::class, 'duplicateSetValue'])->name('duplicateSetValue');
                Route::put('/isotank/void/{id}', [IsotankController::class, 'void'])->name('isotank.void');
                
                // All Transaction
                Route::get('/isotank/transaksi/all', [IsotankController::class, 'transaksiIsotank'])->name('isotank.transaksi');
                Route::get('/isotank/transaksi/detail/{packinglist}', [IsotankController::class, 'transaksiIsotankDetail'])->name('isotank.transaksidet');
                Route::get('/isotank/transaksi/export-excel/{tgl1}/{tgl2}/{loc}/{stats}', [IsotankController::class, 'exportTransaksiIsotank'])->name('isotank.export');

            // Master Data
                Route::get('/master/data/user', [MasterDataController::class, 'dataUser'])->name('masterdata.user');
                Route::post('/master/data/user/add', [MasterDataController::class, 'storedataUser'])->name('masterdata.user.add');
                Route::put('/master/data/user/edit/{id}', [MasterDataController::class, 'updatedataUser'])->name('masterdata.user.update');
                Route::get('/master/data/user/delete/{id}', [MasterDataController::class, 'deletedataUser'])->name('masterdata.user.delete');
                Route::get('/master/data/user/update/{id}', [MasterDataController::class, 'updatedatauserbyemail'])->name('masterdata.user.updatewithToken');
                Route::get('/master/data/password/update/{token}', [MasterDataController::class, 'updatedatauserbyemail_set'])->name('masterdata.user.setupdatewithToken');
                Route::put('/master/data/user/update/{id}', [MasterDataController::class, 'updatedatauserbyemail_done'])->name('masterdata.user.updatepassword');
                Route::get('/master/data/view', [MasterDataController::class, 'dataUser'])->name('masterdata.user');

                Route::get('/master/data/otoritas', [MasterDataController::class, 'otoritas'])->name('masterdata.otoritas');
                Route::post('/master/data/otoritas/update', [MasterDataController::class, 'otoritasUpdate'])->name('masterdata.otoritasUpdate');

                Route::get('/master/data/location', [MasterDataController::class, 'dataLocation'])->name('masterdata.location');
                Route::post('/master/data/location/add', [MasterDataController::class, 'storedataLocation'])->name('masterdata.location.add');
                Route::put('/master/data/location/edit/{id}', [MasterDataController::class, 'updatedataLocation'])->name('masterdata.location.update');
                Route::get('/master/data/location/delete/{id}', [MasterDataController::class, 'deletedataLocation'])->name('masterdata.location.delete');

                Route::get('/master/data/transport', [MasterDataController::class, 'dataTransport'])->name('masterdata.transport');
                Route::post('/master/data/transport/add', [MasterDataController::class, 'storedataTransport'])->name('masterdata.transport.add');
                Route::put('/master/data/transport/edit/{id}', [MasterDataController::class, 'updatedataTransport'])->name('masterdata.transport.update');
                Route::get('/master/data/transport/delete/{id}', [MasterDataController::class, 'deletedataTransport'])->name('masterdata.transport.delete');


                Route::get('/master/data/isotank', [MasterDataController::class, 'dataIsotank'])->name('masterdata.isotank');
                Route::post('/master/data/isotank/add', [MasterDataController::class, 'storedataIsotank'])->name('masterdata.isotank.add');
                Route::put('/master/data/isotank/edit/{id}', [MasterDataController::class, 'updatedataIsotank'])->name('masterdata.isotank.update');
                Route::get('/master/data/isotank/delete/{id}', [MasterDataController::class, 'deletedataIsotank'])->name('masterdata.isotank.delete');

                Route::get('/master/data/customer', [MasterDataController::class, 'dataCustomer'])->name('masterdata.customer');
                Route::post('/master/data/customer/add', [MasterDataController::class, 'storedataCustomer'])->name('masterdata.customer.add');
                Route::put('/master/data/customer/edit/{id}', [MasterDataController::class, 'updatedataCustomer'])->name('masterdata.customer.update');
                Route::get('/master/data/customer/delete/{id}', [MasterDataController::class, 'deletedataCustomer'])->name('masterdata.customer.delete');

            // Karyawan 
                Route::resource('/karyawan', KaryawanController::class);
                Route::view('/karyawan/form/cuti', 'partial.karyawan.cuti')->name('karyawan.cuti');
                Route::post('/karyawan/form/cuti/store', [KaryawanController::class, 'formcuti_store'])->name('karyawan.formcuti_store');
                Route::get('/karyawan/form/cuti/view/{id_k}/{id_c}', [KaryawanController::class, 'formCuti_view'])->name('karyawan.formcuti_view');
                Route::get('/karyawan/form/cuti/edit/{id_k}/{id_c}', [KaryawanController::class, 'formCuti_edit'])->name('karyawan.formcuti_edit');
                Route::put('/karyawan/form/cuti/revisi/{id_k}/{id_c}', [KaryawanController::class, 'formCuti_update'])->name('karyawan.formcuti_revisi');
                Route::get('/karyawan/form/cuti/approval/{id_k}/{val}/{id_c}', [KaryawanController::class, 'formCuti_approval'])->name('karyawan.formCuti_approval');
                Route::get('/karyawan/form/cuti/verif/{id_k}/{val}/{id_c}', [KaryawanController::class, 'formCuti_verif'])->name('karyawan.formCuti_verif');
                Route::get('/karyawan/form/print/{id_k}/{id_c}', [KaryawanController::class, 'formCuti_print'])->name('karyawan.print');

                Route::view('/karyawan/form/izin', 'partial.karyawan.izin')->name('karyawan.izin');
                Route::post('/karyawan/form/izin/store', [KaryawanController::class, 'formizin_store'])->name('karyawan.formizin_store');
                Route::get('/karyawan/form/izin/view/{id_k}/{id_c}', [KaryawanController::class, 'formIzin_view'])->name('karyawan.formizin_view');
                Route::get('/karyawan/form/izin/edit/{id_k}/{id_c}', [KaryawanController::class, 'formIzin_edit'])->name('karyawan.formizin_edit');
                Route::put('/karyawan/form/izin/revisi/{id_k}/{id_c}', [KaryawanController::class, 'formIzin_update'])->name('karyawan.formizin_revisi');
                Route::get('/karyawan/form/izin/approval/{id_k}/{val}/{id_c}', [KaryawanController::class, 'formIzin_approval'])->name('karyawan.izin_approval');
                Route::get('/karyawan/form/izin/verif/{id_k}/{val}/{id_c}', [KaryawanController::class, 'formIzin_verif'])->name('karyawan.formIzin_verif');
                Route::get('/karyawan/form/izin/print/{id_k}/{id_c}', [KaryawanController::class, 'formIzin_print'])->name('karyawan.Izin_print');
            
            // User
                Route::get('/user/{id_k}', [KaryawanController::class, 'user_view'])->name('user.view');
                Route::post('/user/upload_signature', [KaryawanController::class, 'user_upload_signature'])->name('user.uploadsignature');
            
            // Portal
                Route::get('/portal', function () {return view('partial.portal.portal');})->name('portal.show');

            //Logout
            Route::get('/Logout', [PortalController::class, 'logout'])->name('Logout');
        });
