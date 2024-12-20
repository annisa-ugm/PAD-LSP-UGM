<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AsesiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\HomeController;

// LANDING PAGE HOME
Route::get('/', function () {
    return view('home/home');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/masuk', function () {
    return view('home/home-visitor/masuk');
});

Route::get('/reset-password', function () {
    return view('auth/password/reset-password');
});
Route::get('/forget-password', function () {
    return view('auth/password/forget-password');
});
Route::get('/panduan', function () {
    return view('home/home-visitor/panduan');
});
Route::get('/profile', function () {
    return view('home/home-visitor/profile');
});

Route::get('/skema', [HomeController::class, 'index'])->name('skema');

// HOME  ASESI SETELAH MELAKUKAN REGISTER
Route::get('/register', function () {
    return view('home/home-visitor/register');})->name('register');
Route::get('/login', function () {
    return view('home/home-visitor/login');})->name('login');

Route::post('/register', [LoginRegisterController::class, 'store'])->name('register.store');
Route::post('/login', [LoginRegisterController::class, 'authenticate'])->name('login.post');

Route::get('/home', function () {
    return view('home/home-visitor/home');
})->name('home');

Route::post('admin/asesor', [AdminController::class, 'storeDataAsesor'])->name('admin.asesor.store');
Route::get('/admin5', [AdminController::class, 'indexDataAsesor'])->name('admin.asesor.index');
Route::get('/admin5/{id}/edit', [AdminController::class, 'editDataAsesor'])->name('admin.asesor.edit');
Route::put('/admin5/{id}/update', [AdminController::class, 'updateDataAsesor'])->name('admin.asesor.update');
Route::delete('/admin5/{id}', [AdminController::class, 'destroyDataAsesor'])->name('admin.asesor.delete');

Route::get('/admin3', [AdminController::class, 'indexDataSkema'])->name('admin.skema.index');
Route::get('/admin3/create', [AdminController::class, 'createDataSkema'])->name('admin.skema.create'); //karena perlu data uk
Route::post('/admin3/create', [AdminController::class, 'storeDataSkema'])->name('admin.skema.store');
Route::get('/admin3/{id}/edit', [AdminController::class, 'editDataSkema'])->name('admin.skema.edit');
Route::put('/admin3/{id}/update', [AdminController::class, 'updateDataSkema'])->name('admin.skema.update');
Route::delete('/admin3/{id}', [AdminController::class, 'destroyDataSkema'])->name('admin.skema.delete');

Route::get('/admin7', [AdminController::class, 'indexDataUk'])->name('admin.uk.index');
Route::get('/admin7/create', [AdminController::class, 'createDataUk'])->name('admin.uk.create');
Route::post('/admin7/create', [AdminController::class, 'storeDataUk'])->name('admin.uk.store');
Route::get('/admin7/{id}/edit', [AdminController::class, 'editDataUk'])->name('admin.uk.edit');
Route::put('/admin7/{id}/update', [AdminController::class, 'updateDataUk'])->name('admin.uk.update');
Route::delete('/admin7/{id}', [AdminController::class, 'destroyDataUk'])->name('admin.uk.delete');

Route::get('/admin2', [AdminController::class, 'indexDataEvent'])->name('admin.event.index');
Route::get('/admin2/create', [AdminController::class, 'createDataEvent'])->name('admin.event.create'); //karena perlu data skema
Route::post('/admin2/create', [AdminController::class, 'storeDataEvent'])->name('admin.event.store');
Route::get('/admin2/{id}/edit', [AdminController::class, 'editDataEvent'])->name('admin.event.edit');
Route::put('/admin2/{id}/update', [AdminController::class, 'updateDataEvent'])->name('admin.event.update');
Route::delete('/admin2/{id}', [AdminController::class, 'destroyDataEvent'])->name('admin.event.delete');

Route::get('/admin4', [AdminController::class, 'indexDataAsesi'])->name('admin.asesi.index');
Route::get('/admin4/{id}/edit', [AdminController::class, 'detailDataAsesi'])->name('admin.detail.asesi');
Route::post('/admin4/approve-asesi/{id_pengajuan}', [AdminController::class, 'approveAsesi'])->name('admin.approve.asesi');
Route::post('/assign-asesor', [AdminController::class, 'assignAsesor'])->name('assign.asesor');

Route::get('/pengguna', function () {
    return view('home/home-admin/pengguna');
});

Route::get('/tambah-pengguna', function () {
    return view('home/home-admin/tambah-pengguna');
});

// HOME - ASESI
// Route::get('/home-asesi', function () {
//     return view('home/home-asesi/home-asesi');
// });

Route::get('/assesi', function () {
    return view('home/home-asesi/assesi');
});

Route::get('/apl2', [AsesiController::class, 'asesmenMandiri'])->name('asesmen.mandiri');

// ALUR FR.APL-01
Route::get('/apl1/1', function () {
    return view('home/home-asesi/APL-01/data-pribadi');
});
Route::get('/apl1/2', function () {
    return view('home/home-asesi/APL-01/data-sertifikasi');
});
Route::get('/apl1/3', function () {
    return view('home/home-asesi/APL-01/bukti-pemohon');
});
Route::get('/apl1/4', function () {
    return view('home/home-asesi/APL-01/konfirmasi');
});

// Bagian 1 APL-01 yang sudah ada data pekerjaan sekarang
Route::get('/apl1/bg1', function () {
    return view('home/home-visitor/APL-01/bagian1');
});
// BAGIAN PILIH AKSI HOME -ASESI

Route::get('/aksi', function () {
    return view('home/home-asesi/pilih-aksi');
});

Route::get('/persetujuan', function () {
    return view('home/home-asesi/persetujuan');
});

Route::get('/ak1', function () {
    return view('home/home-asesi/FRAK-01/frak01');
});

Route::get('/ak3', function () {
    return view('home/home-asesi/FRAK-03/frak3');
});

Route::get('/ia2', function () {
    return view('home/home-asesi/FRIA-02/soal-praktek-upload-jawaban');
});



// HOME - ASESOR
Route::get('/home-asesor', function () {
    return view('home/home-asesor/home-asesor');
})->name('home-asesor');
Route::get('/asesor1', function () {
    return view('home/home-asesor/asesor');
});
Route::get('/aksi2', function () {
    return view('home/home-asesor/aktif');
});
Route::get('/aksi3', function () {
    return view('home/home-asesor/tutup');
});
Route::get('/frak5', function () {
    return view('home/home-asesor/FRAK-05/frak05');
});

Route::get('/home-admin', [AdminController::class, 'index'])->name('home-admin');
Route::get('/btn-asesi', function () {
    return view('home/home-admin/button-asesi');
});
Route::get('/assign-asesor', function () {
    return view('home/home-admin/assign-asesor');
});
// Route::get('/admin4', function () {
//     return view('home/home-admin/daftar-asesi');
// });

Route::get('/admin6', function () {
    return view('home/home-admin/settings');
});
Route::get('/form', function () {
    return view('home/home-admin/form-asesor');
});
Route::get('/dp', function () {
    return view('home/home-admin/detail-pengajuan');
});
Route::get('/frak1', function () {
    return view('home/home-asesor/frak01');
});

//testing forget password
Route::get('password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.update'); // buat isi token pake post

// //testing home-asesi
Route::get('/home-asesi', [AsesiController::class, 'index'])->name('home-asesi');
Route::get('/assesi', [AsesiController::class, 'indexAssesi'])->name('assesi');


Route::get('/persetujuan/ttd', [PengajuanController::class, 'indexPersetujuan'])->name('persetujuan');
Route::post('/save-data-persetujuan', [PengajuanController::class, 'saveDataPersetujuan'])->name('save.persetujuan');

Route::get('/apl1/b1', function () {
    return view('home/home-visitor/APL-01/data-pribadi');
})->name('pribadi');
Route::post('/save-data-pribadi', [PengajuanController::class, 'saveDataPribadi']);

Route::get('/apl1/b2', function () {
    return view('home/home-visitor/APL-01/data-sertifikasi');
});

Route::get('/apl1/b2', [PengajuanController::class, 'showDataSertifikasi'])->name('sertifikasi');
Route::get('/get-nomor-skema', [PengajuanController::class, 'getNomorSkema']);
Route::get('/get-daftar-uk', [PengajuanController::class, 'showDaftarUK']);
Route::post('/save-data-sertifikasi', [PengajuanController::class, 'saveDataSertifikasi'])->name('save.data.sertifikasi');

Route::post('/save-data-pengajuan', [PengajuanController::class, 'storePengajuan'])->name('save');
Route::get('/apl1/b3', function () {
    return view('home/home-visitor/APL-01/bukti-pemohon');
})->name('bukti');

Route::get('/apl1/b4', function () {
    return view('home/home-visitor/APL-01/konfirmasi');
})->name('konfirmasi');



Route::get('/', function () {
    return view('home/home');
});

Route::get('/masuk', function () {
    return view('home/home-visitor/masuk');
});


// Route::get('/assesi', function () {
//     return view('home/home-asesi/assesi');
// });

Route::get('/aksi', function () {
    return view('home/home-asesi/pilih-aksi');
});

Route::get('/ak1', function () {
    return view('home/home-asesi/FRAK-01/frak01');
});

Route::get('/ak3', function () {
    return view('home/home-asesi/FRAK-03/frak3');
});

Route::get('/ia2', function () {
    return view('home/home-asesi/FRIA-02/soal-praktek-upload-jawaban');
});

Route::get('/jadwal-uji-kompetensi', function () {
    return view('home/home-asesi/APL-02/jadwal-uji-kompetensi');
});

// Route::get('/apl2', function () {
//     return view('home/home-asesi/APL-02/asesmen-mandiri');
// });

Route::get('/admin6', function () {
    return view('home/home-admin/settings');
});
Route::get('/form', function () {
    return view('home/home-admin/form-asesor');
});
Route::get('/dp', function () {
    return view('home/home-admin/detail-pengajuan');
});
Route::get('/frak1', function () {
    return view('home/home-asesor/frak01');
});


Route::get('password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.update'); // buat isi token pake post
