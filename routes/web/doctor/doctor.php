<?php

use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\ScheduleController;

Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/', [DoctorDashboardController::class, 'index'])->name('doctor.dasboard');

    Route::get('/schedules', [ScheduleController::class, 'index'])->name('doctor.schedules.index');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('doctor.schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('doctor.schedules.store');
    Route::get('/schedules/{schedule}', [ScheduleController::class, 'show'])->name('doctor.schedules.show');
    Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('doctor.schedules.edit');
    Route::put('/schedules/{schedule}/update', [ScheduleController::class, 'update'])->name('doctor.schedules.update');
    Route::delete('/schedules/{schedule}/destroy', [ScheduleController::class, 'destroy'])->name('doctor.schedules.destroy');
});
