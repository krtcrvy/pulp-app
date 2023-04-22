<?php

use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;

Route::prefix('patient')->middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/', [PatientDashboardController::class, 'index'])->name('patient.dasboard');
});
