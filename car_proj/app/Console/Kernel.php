<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\restatus;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {
        //     DB::table('hours')->update(['status' =>'false']);
        // })->daily();
      // $schedule->command('list')->everyMinute();
      $schedule->command('hours:status')->daily();

     // $schedule->command(restatus::class,['h)->everyMinute();
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
