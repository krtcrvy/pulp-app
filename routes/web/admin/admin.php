<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DoctorController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dasboard');

    Route::get('/patients', [PatientController::class, 'index'])->name('admin.patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('admin.patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('admin.patients.store');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('admin.patients.show');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('admin.patients.edit');
    Route::put('/patients/{patient}/update', [PatientController::class, 'update'])->name('admin.patients.update');
    Route::delete('/patients/{patient}/destroy', [PatientController::class, 'destroy'])->name('admin.patients.destroy');

    Route::get('/doctors', [DoctorController::class, 'index'])->name('admin.doctors.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('admin.doctors.create');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('admin.doctors.store');
    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('admin.doctors.show');
    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('admin.doctors.edit');
    Route::put('/doctors/{doctor}/update', [DoctorController::class, 'update'])->name('admin.doctors.update');
    Route::delete('/doctors/{doctor}/destroy', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');
});
