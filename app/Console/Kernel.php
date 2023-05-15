<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Mail\AppointmentReminder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule
            ->call(function () {
                DB::table('schedules')
                    ->where('date', '<', now())
                    ->update(['status' => 'inactive']);
            })
            ->everyMinute();

        $schedule
            ->call(function () {
                $dayBefore = Carbon::now()->subDay();
                $appointments = Appointment::whereHas('schedule', function ($query) use ($dayBefore) {
                    $query->whereDate('date', $dayBefore->toDateString());
                })->get();

                foreach ($appointments as $appointment) {
                    Mail::to($appointment->client->email)->send(new AppointmentReminder($appointment));
                }
            })
            ->dailyAt('07:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
