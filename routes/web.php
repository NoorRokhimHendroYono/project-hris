<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\LowonganUserController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\ImageUploadController;

// ||====================================||
// || Halaman Utama User + Lowongan User ||
// ||====================================||

// ✔️ Home ➔ /
//OVERIDE Route::get('/', [HomeController::class, 'index'])->name('user.home'); // Tombol Home Navbar Ke Arah Page Home
Route::get('/careers', [LowonganUserController::class, 'index'])->name('lowongan.index'); // Tombol Karir Navbar Ke Arah Page Careers
//OVERIDE Route::get('/', [\App\Http\Controllers\user\HomeController::class,'index'])->name('user.home');

// Home 
Route::get('/', [LowonganUserController::class, 'home'])->name('user.home');
Route::get('/careers', [LowonganUserController::class, 'careers'])->name('lowongan.index');

// Route::get('/', [HomeController::class, 'index'])->name('user.careers');

// ✔️ Daftar lowongan ➔ /careers
// Route::get('/careers', [LowonganUserController::class, 'index'])->name('lowongan.index');
// Route::get('/careers', [\App\Http\Controllers\user\HomeController::class,'list'])->name('lowongan.index'); 
// Route::get('/careers', [HomeController::class,'careers'])->name('lowongan.index'); 

// ✔️ Detail lowongan ➔ /careers/{slug}
Route::get('/careers/{slug}', [LowonganUserController::class, 'show'])->name('lowongan.detail');
// Route::get('/lowongan/{id}', [HomeController::class,'show'])->name('lowongan.detail');
// Route::get('/careers/{slug}', [HomeController::class,'careerDetail'])->name('lowongan.detail');

// Lowongan untuk User
Route::get('/lowongan', [LowonganUserController::class,'index'])->name('user.lowongan.list');
Route::get('/lowongan/{id}', [LowonganUserController::class, 'show'])->name('user.lowongan.show');

// Untuk Careers List + Filter
Route::get('/careers', [LowonganUserController::class,'index'])->name('lowongan.index');

// // Upload gambar Lokal di TinyMCE
// Route::post('/upload-image', [\App\Http\Controllers\TinyMCEController::class, 'upload'])->name('tinymce.upload');
// Route::post('/admin/upload-image', [AdminController::class, 'uploadImage'])->name('admin.upload.image');
// Route::post('/admin/lowongan/upload-image', [LowonganController::class, 'uploadImage'])->name('admin.lowongan.uploadImage');

//Route untuk Upload Gambar
// Route::post('/upload-image', [UploadController::class, 'upload']);
// Route::post('/admin/upload-image', [\App\Http\Controllers\Admin\UploadController::class, 'upload'])->name('admin.upload.image');
Route::post('/admin/upload-image', [ImageUploadController::class, 'upload'])->name('admin.upload.image');
// Route::post('/admin/upload-image', [\App\Http\Controllers\Admin\UploadController::class, 'upload'])->name('admin.upload.image'); //('tinymce.upload'
// Route::post('/admin/upload-image', [ImageUploadController::class, 'upload'])->name('admin.upload-image');

// ||========================||
// ||       Auth Admin       ||
// ||========================||

// Login Admin
Route::get('admin/login', [AuthController::class,'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class,'login'])->name('admin.login.submit');
Route::post('admin/logout', [AuthController::class,'logout'])->name('admin.logout');

// 1️⃣ Register Admin dengan route Normal/Sebelumnya
// Route::get('admin/register', [AdminAuthController::class,'showRegisterForm'])->name('admin.register');
// Route::post('admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

// 2️⃣ Register Admin dengan route dirubah biar gak ada orang sembarangan akses
// Route::get('admin/internal-create-admin', [AdminAuthController::class,'showRegisterForm'])->name('admin.internal-create-admin');
// Route::post('admin/internal-create-admin', [AdminAuthController::class, 'register'])->name('admin.internal-create-admin.submit');

// 3️⃣ Tambahkan Middleware admin di route tersebut: Supaya orang yang belum login sebagai admin gak bisa akses walaupun tahu URL-nya.
Route::middleware(['admin'])->group(function () {
    Route::get('admin/internal-create-admin', [AdminAuthController::class,'showRegisterForm'])->name('admin.internal-create-admin');
    Route::post('admin/internal-create-admin', [AdminAuthController::class, 'register'])->name('admin.internal-create-admin.submit');
});

// Forgot Password (Coming Soon)
Route::get('admin/forgot_password', [ForgotPasswordController::class, 'showForgotForm'])->name('admin.forgot');
Route::post('admin/forgot_password', [ForgotPasswordController::class,'sendResetLink'])->name('admin.forgot.send');
// Route::get('admin/forgot-password', function () {
//     return view('admin.auth.coming_soon');
// })->name('admin.forgot');

// Toggle Status Lowongan (tanpa login middleware, dipakai AJAX)🗿🔥🔥🔥
Route::post('admin/lowongan/{id}/toggle', [LowonganController::class, 'toggle'])->name('admin.lowongan.toggle');

// ||=======================================||
// || Semua Fitur Admin (Butuh Login Admin) ||
// ||=======================================||
                                                             // name | group
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    // GANTI JADI ⬇️ | Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/', fn () => redirect()->route('admin.dashboard'))->name('index'); 
    // ⬆️ Direct ke ➡️ Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/', [AdminController::class,'store'])->name('store');

    // Lowongan CRUD
    Route::resource('lowongan', LowonganController::class);
    //Toggle Status Lowongan
    // Route::patch('lowongan/{id}/toggle', [LowonganController::class,'toggleStatus'])->name('lowongan.toggle');
    // Route::post('/lowongan/{id}/toggle', [LowonganController::class, 'toggle'])->name('admin.lowongan.toggle');

    // Admin Dashboard Karena kamu sudah berada di dalam prefix admin, kamu tidak perlu tulis /admin lagi. ('/admin/dashboard')
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Admin CRUD
    Route::get('admins', [AdminController::class,'list'])->name('admins.list');
    Route::get('admins/{id}/edit', [AdminController::class,'edit'])->name('admins.edit');
    Route::put('admins/{id}', [AdminController::class,'update'])->name('admins.update');
    Route::delete('admins/{id}', [AdminController::class,'destroy'])->name('admins.destroy');

    // Profil Admin
    Route::get('profil', [AdminController::class,'profil'])->name('profil');
    Route::post('profil/update', [AdminController::class,'updateProfil'])->name('profil.update');

    // Security (Ganti Password)
    Route::get('security', [AdminController::class,'security'])->name('security');
    Route::post('security/update', [AdminController::class,'updatePassword'])->name('security.update');

    // Kategori CRUD
    Route::resource('category', CategoryController::class)->middleware('admin');
    // Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    // Route::get('category/{id}', [CategoryController::class, 'update'])->name('category.update');
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// // Landing page
// Route::get('/', function () {
//     return view('landing');
// })->name('landing');

// // Route untuk user lihat daftar lowongan
// Route::get('/lowongan', [\App\Http\Controllers\LowonganUserController::class, 'index'])
//     ->name('user.lowongan.list');

// // Detail Lowongan ke User
// Route::get('/lowongan/{id}', [\App\Http\Controllers\LowonganUserController::class,'show'])
// ->name('user.show');

// Route::get('/lowongan/{id}', [\App\Http\Controllers\LowonganUserController::class,'show'])
// ->name('user.lowongan.show');

// // Login Admin
// Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
// Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
// Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// // Register Admin
// Route::get('admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
// Route::post('admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

// // Forgot Password (Coming Soon)
// Route::get('admin/forgot-password', function () {
//     return 'Halaman lupa password admin (coming soon)';
// })->name('admin.forgot');

// // Route untuk List Admin
// Route::get('/admin/list', [AdminController::class, 'list'])->name('admin.list');

// // Info Jumlah Admin
// Route::get('admin/data-admin', [AdminController::class, 'list'])->name('admin.list');

// // Semua yang butuh login admin
// Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
//     // Dashboard Admin
//     Route::get('/', [AdminController::class, 'index'])->name('index');
//     Route::post('/', [AdminController::class, 'store'])->name('store');

//     // Lowongan (CRUD)
//     Route::resource('lowongan', LowonganController::class);

//     // Toggle Status Lowongan
//     Route::patch('lowongan/{id}/toggle', [LowonganController::class, 'toggleStatus'])->name('lowongan.toggle');

//     Route::post('/lowongan/{id}/toggle', [LowonganController::class, 'toggle'])->name('admin.lowongan.toggle');
// });

// // Di bawah route yang sudah ada
// Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
//     // Dashboard
//     Route::get('/', [AdminController::class, 'index'])->name('index');
//     Route::post('/', [AdminController::class, 'store'])->name('store');

//     // Lowongan CRUD
//     Route::resource('lowongan', LowonganController::class);
//     Route::patch('lowongan/{id}/toggle', [LowonganController::class, 'toggleStatus'])->name('lowongan.toggle');

//     // ⬇️ New: Admin CRUD
//     Route::get('admins', [AdminController::class, 'list'])->name('admins.list');
//     Route::get('admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
//     Route::put('admins/{id}', [AdminController::class, 'update'])->name('admins.update');
//     Route::delete('admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');

//     // ⬇️ Tambah Route Profile
//     Route::get('profile', [AdminController::class, 'profile'])->name('profile');
//     Route::post('profile', [AdminController::class, 'updateProfile'])->name('profile.update');

//     // 🔥 Profil
//     Route::get('profil', [AdminController::class, 'profil'])->name('profil');
//     Route::post('profil/update', [AdminController::class, 'updateProfil'])->name('profil.update');

//     // 🔒 Security (Password)
//     Route::get('security', [AdminController::class, 'security'])->name('security');
//     Route::post('security/update', [AdminController::class, 'updatePassword'])->name('security.update');

//     Route::get('/profil', [\App\Http\Controllers\Admin\ProfilController::class, 'index'])->name('profil');
//     Route::post('/profil', [\App\Http\Controllers\Admin\ProfilController::class, 'update'])->name('profil.update');

//     // Security (Ganti Password)
//     Route::get('/security', [\App\Http\Controllers\Admin\ProfilController::class, 'security'])->name('security');
//     Route::post('/security', [\App\Http\Controllers\Admin\ProfilController::class, 'updatePassword'])->name('security.update');
// });

// // Profil & Security Routes
// Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
//     Route::get('profil', [\App\Http\Controllers\Admin\AdminController::class, 'profil'])->name('profil');
//     Route::put('profil', [\App\Http\Controllers\Admin\AdminController::class, 'updateProfil'])->name('profil.update');

//     // 🔥 Security (Ganti Password)
//     Route::get('security', [\App\Http\Controllers\Admin\AdminController::class, 'security'])->name('security');
//     Route::put('security', [\App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('security.update');
// });

// // Route::post('/admin/lowongan/toggle-status/{id}', [\App\Http\Controllers\LowonganController::class, 'toggleStatus'])->name('admin.lowongan.toggleStatus');

// ////////Route::put('/admin/lowongan/{id}/toggle-status', [LowonganController::class, 'toggleStatus'])->name('admin.lowongan.toggleStatus');

// //Routing Baru Hehe, untuk frontend yang baru
// Route::get('/', [\App\Http\Controllers\user\HomeController::class, 'index']);

// // Route::get('/lowongan', [\App\Http\Controllers\user\LowonganController::class, 'index']);

// // Route::get('/lowongan/{slug}', [\App\Http\Controllers\user\LowonganController::class, 'show']);


// Route::get('/', [HomeController::class,'index'])->name('');

// // Route untuk halaman bernada user
// Route::get('/', [HomeController::class,''])->name('user.home');

// Route::get('/', function () {
//     return view('user.pages.home');
// })->name('user.home');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('index');
//     Route::post('/', [AdminController::class, 'store'])->name('store');
// });
// Route::get('/', function () {
//     return view('welcome');
// });
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Route::get('/admin/register', function () {                                                                                   //   
//     return view('admin.register'); // pastikan lokasi file-nya benar                                                          //           
// })->name('admin.register');                                                                                                   //   
//                                                                                                                               //
// Route::post('/admin/register', [\App\Http\Controllers\AdminAuthController::class, 'register'])->name('admin.register.submit');//
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Halaman lupa password admin (sementara placeholder)
// Route untuk halaman register admin
// Form register

// Route::get('admin/forgot-password', [AdminAuthController::class,'forgot-password'])->name('admin.forgot-password');

// Route::get('admin/forgot-password', function () {
//     return view('admin.forgot-password');
// })->name('admin.forgot');