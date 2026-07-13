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

    // Dashboard — admin & ustadz sama-sama boleh, isinya beda per role
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // ===== SISWA — ADMIN ONLY =====
    Route::prefix('admin/siswa')->name('admin.siswa.')->middleware('role:admin')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{siswa}', Show::class)->name('show');
        Route::get('/{siswa}/edit', Edit::class)->name('edit');
    });
    // ===== MANAJEMEN AKUN (USTADZ & ADMIN) — ADMIN ONLY =====
    Route::prefix('admin/ustadz')->name('admin.ustadz.')->middleware('role:admin')->group(function () {
        Route::get('/', \App\Livewire\Admin\Ustadz\Index::class)->name('index');
        Route::get('/create', \App\Livewire\Admin\Ustadz\Create::class)->name('create');
        Route::get('/{user}/edit', \App\Livewire\Admin\Ustadz\Edit::class)->name('edit');
    });

    // ===== SETORAN =====
    Route::prefix('admin/setoran')->name('admin.setoran.')->group(function () {

        // Lihat daftar/riwayat setoran — admin & ustadz boleh (query di-scope di dalam component)
        Route::get('/', SetoranIndex::class)->name('index');

        // Input setoran baru — HANYA ustadz
        Route::get('/create', SetoranCreate::class)->name('create')->middleware('role:ustadz');

        // Edit/override setoran — HANYA admin
        Route::get('/{setoran}/edit', SetoranEdit::class)->name('edit')->middleware('role:admin');
    });

    // ===== LAPORAN — ADMIN ONLY =====
    Route::get('/admin/laporan', Laporan::class)->name('admin.laporan')->middleware('role:admin');
});
