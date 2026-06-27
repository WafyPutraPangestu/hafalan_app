<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Laporan;
use App\Livewire\Auth\Login;
use App\Livewire\Home;
use App\Livewire\Admin\Siswa\Index;
use App\Livewire\Admin\Siswa\Create;
use App\Livewire\Admin\Siswa\Edit;
use App\Livewire\Admin\Siswa\Show;
use App\Livewire\Admin\Setoran\Index as SetoranIndex;
use App\Livewire\Admin\Setoran\Create as SetoranCreate;
use App\Livewire\Admin\Setoran\Edit as SetoranEdit;
use App\Livewire\Hafalan\Index as HafalanIndex;
use App\Livewire\Hafalan\Show as HafalanShow;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/cek-hafalan', HafalanIndex::class)->name('hafalan.index');
Route::get('/cek-hafalan/{kode_akses}', HafalanShow::class)->name('hafalan.show');

Route::get('/auth/login', Login::class)->name('login')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // Group Route untuk Siswa
    Route::prefix('admin/siswa')->name('admin.siswa.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{siswa}', Show::class)->name('show');
        Route::get('/{siswa}/edit', Edit::class)->name('edit');
    });
    Route::prefix('admin/setoran')->name('admin.setoran.')->group(function () {
        Route::get('/', SetoranIndex::class)->name('index');
        Route::get('/create', SetoranCreate::class)->name('create');
        Route::get('/{setoran}/edit', SetoranEdit::class)->name('edit');
    });
    Route::get('/admin/laporan', Laporan::class)->name('admin.laporan');
});
