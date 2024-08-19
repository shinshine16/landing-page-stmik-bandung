<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PendidikanController;
// End Controller

//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

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

Route::group(['middleware' => ['lang']], function () {
    Route::get('/', [LandingPageController::class, 'Beranda']);
    Route::get('/p/{slug}', [LandingPageController::class, 'SinglePost']);
    Route::get('/agenda/{slug}', [LandingPageController::class, 'AgendaPost']);
    Route::get('/agenda-list', [LandingPageController::class, 'AgendaList']);
    Route::get('/kalender', [LandingPageController::class, 'KalenderAkademikDetail']);
    Route::post('/search', [LandingPageController::class, 'PencarianTerkait']);
    Route::get('/kategori/{slug}', [LandingPageController::class, 'Kategori']);
    Route::get('/profil', [LandingPageController::class, 'Profil']);
    Route::get('/visimisi', [LandingPageController::class, 'VisiMisi']);
    Route::get('/fakultas-prestasi', [LandingPageController::class, 'FakultasPrestasi']);
    Route::get('/pimpinan', [LandingPageController::class, 'Pimpinan']);
    Route::get('/struktur-organisasi', [LandingPageController::class, 'StrukturOrganisasi']);
    Route::get('/tentang', [LandingPageController::class, 'Tentang']);
    Route::get('/login', [LandingPageController::class, 'Login']);
    Route::post('/auth', [LandingPageController::class, 'Auth']);
    Route::get('/getip', [LandingPageController::class, 'GetIP']);
    Route::get('/staff', [LandingPageController::class, 'Anggota']);
    Route::get('/detailAnggota/{id}', [LandingPageController::class, 'DetailAnggota']);
    Route::get('/staff/{id}', [LandingPageController::class, 'AnggotaUrutan']);
    Route::get('/spmi', [LandingPageController::class, 'SPMI']);
    Route::get('/kurikulum', [LandingPageController::class, 'Kurikulum']);
    Route::get('/akreditasi-ban-pt', [LandingPageController::class, 'Akreditasi']);
    Route::get('/teknik-informatika', [LandingPageController::class, 'TeknikInformatika']);
    Route::get('/sistem-informasi', [LandingPageController::class, 'SistemInformasi']);
    Route::get('/aplikasi', [LandingPageController::class, 'aplikasi']);
});

Route::get('/VT', function () {
    return view("components/videoThumbnail");
});

// Language Switch
Route::get('/id', function (Request $request) {
    $request->session()->forget('lang');
    $request->session()->put('lang', 'id');
    return redirect('/');
});
Route::get('/en', function (Request $request) {
    $request->session()->forget('lang');
    $request->session()->put('lang', 'en');
    return redirect('/');
});

Route::group(['middleware' => ['admin']], function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'Dashboard']);
    Route::get('/total/{id}', [AdminController::class, 'TotalVisitor']);

    // Post
    Route::get('/listPost', [PostController::class, 'ListPost']);
    Route::get('/addPost', [PostController::class, 'AddPost']);
    Route::post('/addPostProgress', [PostController::class, 'AddPostProgress'])->name('thumbnail.upload.post');
    Route::get('/editPost/{id}', [PostController::class, 'EditPost']);
    Route::post('/editPostProgress', [PostController::class, 'EditPostProgress'])->name('thumbnail.edit.upload.post');
    Route::get('/deletePost/{id}', [PostController::class, 'DeletePost']);
    // End Post

    // Category
    Route::get('/allCategory', [CategoryController::class, 'AllCategory']);
    Route::get('/addCategory', [CategoryController::class, 'AddCategory']);
    Route::get('/editCategory/{id}', [CategoryController::class, 'EditCategory']);
    Route::post('/addCategoryProgress', [CategoryController::class, 'AddCategoryProgress']);
    Route::post('/editCategoryProgress', [CategoryController::class, 'EditCategoryProgress']);
    Route::get('/deleteCategory/{id}', [CategoryController::class, 'DeleteCategory']);
    // End Category

    // Agenda
    Route::get('/allAgenda', [AgendaController::class, 'AllAgenda']);
    Route::get('/addAgenda', [AgendaController::class, 'AddAgenda']);
    Route::post('/addAgendaProgress', [AgendaController::class, 'AddAgendaProgress']);
    // End Agenda

    // User
    Route::get('/allUser', [UserController::class, 'AllUser']);
    Route::get('/addUser', [UserController::class, 'AddUser']);
    Route::post('/addUserProgress', [UserController::class, 'AddUserProgress']);
    Route::get('/editUser/{id}', [UserController::class, 'EditUser']);
    Route::post('/editUserProgress', [UserController::class, 'EditUserProgress']);
    Route::get('/deleteUser/{id}', [UserController::class, 'DeleteUser']);
    // End User

    // Staff
    Route::get('/allStaff', [StaffController::class, 'AllStaff']);
    Route::get('/addStaff', [StaffController::class, 'AddStaff']);
    Route::post('/addStaffProgress', [StaffController::class, 'AddStaffProgress']);
    Route::get('/editStaff/{id}', [StaffController::class, 'EditStaff']);
    Route::post('/editStaffProgress', [StaffController::class, 'EditStaffProgress']);
    // End Staff
    
    // Leader
    Route::get('/allLeader', [LeaderController::class, 'AllLeader']);
    Route::get('/addLeader', [LeaderController::class, 'AddLeader']);
    Route::post('/addLeaderProgress', [LeaderController::class, 'AddLeaderProgress']);
    Route::get('/editLeader/{id}', [LeaderController::class, 'EditLeader']);
    Route::post('/editLeaderProgress', [LeaderController::class, 'EditLeaderProgress']);
    // End Leader

    // Pendidikan
    Route::get('/addPendidikan', [PendidikanController::class, 'AddPendidikan']);
    Route::post('/addPendidikanProgress', [PendidikanController::class, 'AddPendidikanProgress']);
    // End Pendidikan

    // Dokumen
    Route::get('/addDokumen', [DokumenController::class, 'AddDokumen']);
    Route::post('/addDokumenProgress', [DokumenController::class, 'AddDokumenProgress']);
    // End Dokumen

    // Log
    Route::get('/log', [AdminController::class, 'LogList']);
    Route::get('/log_visitor', [AdminController::class, 'VisitorList']);
    // End Log

    // Opsi Profil User
    Route::get('/profilUser', [AdminController::class, 'ProfilUser']);
    // End Opsi Profil User

    // JSON
    Route::get('/listPost/json', [JsonController::class, 'JsonPost']);
    Route::get('/log/json', [JsonController::class, 'JsonLog']);
    Route::get('/log_visitor/json', [JsonController::class, 'JsonVisitor']);
    Route::get('/allUser/json', [JsonController::class, 'JsonUser']);
    Route::get('/allLeader/json', [JsonController::class, 'JsonLeader']);
    Route::get('/allStaff/json', [JsonController::class, 'JsonStaff']);
    Route::get('/allCategory/json', [JsonController::class, 'JsonCategory']);
    Route::get('/allAgenda/json', [JsonController::class, 'JsonAgenda']);
    Route::get('/profilUser/json', [JsonController::class, 'JsonProfilUser']);
    Route::get('/allDokumen/json', [JsonController::class, 'JsonDokumen']);

    Route::get('/logout', [AdminController::class, 'Logout']);
});
