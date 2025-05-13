<?php

use App\Models\Post;
use App\Models\rank;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AlurController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpSopController;
use App\Http\Controllers\MedSosController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiSpController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\MaklumatController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\DashboardSpController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\AlurPengaduanController;
use App\Http\Controllers\DashboardAlurController;
use App\Http\Controllers\DashboardFileController;
use App\Http\Controllers\DashboardCategoriesfaqController;
use App\Http\Controllers\DashboardFaqController;
use App\Http\Controllers\DashboardHeroController;
use App\Http\Controllers\DashboardLinkController;
use App\Http\Controllers\FormPengaduanController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\DashboardFolderController;
use App\Http\Controllers\DashboardLinkSkmController;
use App\Http\Controllers\DashboardServiceController;
//use App\Http\Controllers\LaporanPengaduanController;
use App\Http\Controllers\DashboardMaklumatController;
use App\Http\Controllers\DashboardPrestasiController;
use App\Http\Controllers\DashboardSpDetailController;
use App\Http\Controllers\DashboardVisiMisiController;
use App\Http\Controllers\DashboardKelembagaanController;
use App\Http\Controllers\DashboardCategoryFileController;
use App\Http\Controllers\DashboardOrganizationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardAlurPengaduanController;
use App\Http\Controllers\DashboardPostCategoriesController;
use App\Http\Controllers\DashboardLaporanPengaduanController;
//use App\Http\Controllers\DashboardTahunLaporanPengaduanController;
use App\Http\Controllers\DashboardAduanController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Middleware\VerifyRecaptcha;
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
Route::middleware(['throttle:public-web'])->group(function () {
Route::get('/',  [BerandaController::class, 'index']);
Route::get('/berita', [PostController::class, 'berita']);
Route::get('/apipost', [ApiPostController::class, 'index']);
Route::get('/apisp', [ApiSpController::class, 'index']);
Route::get('/apisp/{data:id}', [ApiSpController::class, 'detail']);
Route::get('/posts/{post:slug}',  [PostController::class, 'post']);
Route::get('/profil/kelembagaan', [KelembagaanController::class, 'index']);
Route::get('/profil/visimisi', [VisiMisiController::class, 'index']);
Route::get('/profil/organisasi', [OrganisasiController::class, 'index']);
Route::get('/profil/prestasi', [PrestasiController::class, 'index']);
Route::get('/profil/maklumat', [MaklumatController::class, 'index']);
Route::get('/profil/kontak', [ContactController::class, 'index']);
Route::get('/profil/medsos', [MedSosController::class, 'index']);
Route::get('/spsop', [SpSopController::class, 'index']);
Route::get('/spsop/{item:slug}', [SpSopController::class, 'detail']);
Route::get('/downloads', [DownloadsController::class, 'index']);
Route::get('/downloads/file', [DownloadsController::class, 'file']);
Route::get('/perizinan/alur', [AlurController::class, 'index']);
Route::get('/statistik/perizinan/terbit', [StatistikController::class, 'terbit']);
Route::post('/statistik/perizinan/terbit', [StatistikController::class, 'viewgraphterbit']);
Route::get('/statistik/perizinan/rekap', [StatistikController::class, 'rekap']);
Route::post('/statistik/perizinan/rekap', [StatistikController::class, 'viewgraphrekap']);
Route::get('/statistik/perizinan/nib', [StatistikController::class, 'nib']);
Route::post('/statistik/perizinan/nib', [StatistikController::class, 'viewgraphnib']);
Route::get('/statistik/perizinan/izin', [StatistikController::class, 'izin']);
Route::post('/statistik/perizinan/izin', [StatistikController::class, 'viewgraphizin']);
Route::get('/statistik/investasi/realisasi', [StatistikController::class, 'realisasiinvestasi']);
Route::post('/statistik/investasi/realisasi', [StatistikController::class, 'viewgraphinvestasi']);
Route::get('/perizinan/verifikasi', [VerifikasiController::class, 'index']);
Route::resource('/tracking', TrackerController::class);
Route::get('/pengaduan/alur', [AlurPengaduanController::class, 'index']);
Route::get('/pengaduan/form', [FormPengaduanController::class, 'index']);
Route::post('/pengaduan/form', [FormPengaduanController::class, 'store']);
Route::get('/reload-captcha', [FormPengaduanController::class, 'reloadCaptcha']);
//Route::get('/pengaduan/laporan', [LaporanPengaduanController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
});
//Route::get('/arep/mlebu/le', [LoginController::class, 'index'])->name('login')->middleware('guest');
//Route::post('/arep/mlebu/le', [LoginController::class, 'authenticate']);
//Route::post('/logout', [LoginController::class, 'logout']);
//Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
//Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest', 'throttle:login', \App\Http\Middleware\VerifyRecaptcha::class])
    ->name('login');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/home', [DashboardController::class, 'viewanalytich'])->middleware('auth');;
Route::get('/home/posts/checkSlug', [DashboardPostsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/posts', DashboardPostsController::class)->middleware('auth');
Route::get('/home/category/checkSlug', [DashboardPostCategoriesController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/category', DashboardPostCategoriesController::class)->middleware('auth');
Route::get('/home/beranda/hero/checkSlug', [DashboardHeroController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/beranda/hero', DashboardHeroController::class)->middleware('auth');
Route::get('/home/beranda/service/checkSlug', [DashboardServiceController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/beranda/service', DashboardServiceController::class)->middleware('auth');
Route::get('/home/beranda/link/checkSlug', [DashboardLinkController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/beranda/link', DashboardLinkController::class)->middleware('auth');
Route::get('/home/profil/kelembagaan/checkSlug', [DashboardKelembagaanController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/profil/kelembagaan', DashboardKelembagaanController::class)->middleware('auth');
Route::get('/home/profil/visimisi/checkSlug', [DashboardVisiMisiController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/profil/visimisi', DashboardVisiMisiController::class)->middleware('auth');
Route::get('/home/profil/organisasi/checkSlug', [DashboardOrganizationController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/profil/organisasi', DashboardOrganizationController::class)->middleware('auth');
Route::get('/home/profil/prestasi/checkSlug', [DashboardPrestasiController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/profil/prestasi', DashboardPrestasiController::class)->middleware('auth');
Route::get('/home/profil/maklumat/checkSlug', [DashboardMaklumatController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/profil/maklumat', DashboardMaklumatController::class)->middleware('auth');
Route::get('/home/spsop/checkSlug', [DashboardSpController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/spsop', DashboardSpController::class)->middleware('auth');
Route::get('/home/detail/spsop/checkSlug', [DashboardSpDetailController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/detail/spsop', DashboardSpDetailController::class)->middleware('auth');
Route::get('/home/download/checkSlug', [DashboardFolderController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/download', DashboardFolderController::class)->middleware('auth');
Route::get('/home/folder/download/checkSlug', [DashboardCategoryFileController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/folder/download', DashboardCategoryFileController::class)->middleware('auth');
Route::get('/home/file/download/checkSlug', [DashboardFileController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/file/download', DashboardFileController::class)->middleware('auth');
Route::get('/home/faq/checkSlug', [DashboardCategoriesfaqController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/faq', DashboardCategoriesfaqController::class)->middleware('auth');
Route::get('/home/list/faq/checkSlug', [DashboardFaqController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/list/faq', DashboardFaqController::class)->middleware('auth');
Route::get('/home/perizinan/alur/checkSlug', [DashboardAlurController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/perizinan/alur', DashboardAlurController::class)->middleware('auth');
Route::get('/home/perizinan/linkskm/checkSlug', [DashboardLinkSkmController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/perizinan/linkskm', DashboardLinkSkmController::class)->middleware('auth');
Route::get('/home/pengaduan/alur/checkSlug', [DashboardAlurPengaduanController::class, 'checkSlug'])->middleware('auth');
Route::resource('/home/pengaduan/alur', DashboardAlurPengaduanController::class)->middleware('auth');
//Route::get('/home/pengaduan/laporan/checkSlug', [DashboardTahunLaporanPengaduanController::class, 'checkSlug'])->middleware('auth');
//Route::resource('/home/pengaduan/laporan', DashboardTahunLaporanPengaduanController::class)->middleware('auth');
Route::resource('/home/pengaduan/aduan', DashboardAduanController::class)->middleware('auth');
//Route::get('/home/pengaduan/detail/laporan/checkSlug', [DashboardLaporanPengaduanController::class, 'checkSlug'])->middleware('auth');
//Route::resource('/home/pengaduan/detail/laporan', DashboardLaporanPengaduanController::class)->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/home/pengaturan/users', [DashboardUserController::class, 'index']);
    Route::get('/home/pengaturan/users/create', [DashboardUserController::class, 'create']);
    Route::post('/home/pengaturan//users', [DashboardUserController::class, 'store']);
});