<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dasboard');
});
