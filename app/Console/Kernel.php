<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//        Commands\DemoCron::class,
        Commands\UncheckedMetadataCron::class,
        Commands\PenilaianMuatTurunDataCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('demo:cron')->everyFiveMinutes();
        $schedule->command('uncheckedMetadata:cron')->dailyAt('20:00'); //ori specs
//        $schedule->command('uncheckedMetadata:cron')->everyFiveMinutes();
        $schedule->command('penilaianMuatTurunData:cron')->dailyAt('20:00');
//        $schedule->command('penilaianMuatTurunData:cron')->everyFiveMinutes();
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
