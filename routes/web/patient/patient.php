<?php

use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\Patient\AppointmentController;

Route::prefix('patient')->middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/', [PatientDashboardController::class, 'index'])->name('patient.dasboard');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('patient.appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('patient.appointments.create');
    Route::get('/appointments/book/{schedule}', [AppointmentController::class, 'book'])->name('patient.appointments.book');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('patient.appointments.store');
    Route::get('/appointment/{appointment}', [AppointmentController::class, 'show'])->name('patient.appointments.show');
});
