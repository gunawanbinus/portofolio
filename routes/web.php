<?php

use App\Http\Controllers\PortofolioController;

Route::get('/', [PortofolioController::class, 'showPortofolio'])->name('portofolio.index'); // Portofolio page
Route::resource('admin', PortofolioController::class); // Admin page
Route::put('/admin/portofolio/{portofolio}', [PortofolioController::class, 'update'])->name('admin.update');
Route::delete('/admin/portofolio/{portofolio}', [PortofolioController::class, 'destroy'])->name('admin.destroy');
