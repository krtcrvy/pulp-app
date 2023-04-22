<?php

use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;

Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/', [DoctorDashboardController::class, 'index'])->name('doctor.dasboard');
});
