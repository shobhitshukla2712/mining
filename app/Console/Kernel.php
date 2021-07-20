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
        Commands\SendBookingEmail::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // To store the cron output in a file
        $filePath = storage_path('logs/cron.log');

        // To run it on terminal try: 
        // php artisan email:send
        
        // Command to set the CRON on crontab
        // php artisan schedule:run
        // php /home/udistroc/public_html/artisan schedule:run >> /dev/null 2>&1

        // To send the email on given duration
        $schedule->command('email:send')->everyMinute()->appendOutputTo($filePath);
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
