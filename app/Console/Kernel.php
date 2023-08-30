<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call('App\Http\Controllers\VmtStaffAttendanceController@syncStaffAttendanceFromDeviceDatabase')->everyThirtyMinutes()->timezone('Asia/Kolkata')->between('09:00', '17:45');

        $schedule->call('App\Http\Controllers\VmtEmployeeBirthdayController@sendBirthdayNotificationtoEmployee')->daily();

        $schedule->call('App\Http\Controllers\VmtEmployeeBirthdayController@sendAniversaryNotificationtoEmployee')->daily();


        $schedule->call('App\Http\Controllers\VmtAttendanceControllerV2@testing')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}


