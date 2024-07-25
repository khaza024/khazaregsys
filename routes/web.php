<?php

use App\Filament\Pages\RegistrationForm as PagesRegistrationForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ActivityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', BerandaController::class)->name('beranda');

Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/program/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('/activity', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activity/{activity:slug}', [ActivityController::class, 'show'])->name('activities.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/tentang', AboutController::class)->name('tentang');
Route::get('/kontak', ContactController::class)->name('kontak');
Route::get('/ppdb', PPDBController::class)->name('ppdb');

Route::get('/ppdb/form-pendaftaran', PagesRegistrationForm::class)->name('pendaftaran');
Route::get('/ppdb/pendaftaran-sukses', function () {
    return view('registration.success');
})->name('pendaftaran.sukses');


Route::get('/language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('app.supported_locales'))) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('locale');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
