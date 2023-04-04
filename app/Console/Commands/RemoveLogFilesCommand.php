<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// php artisan remove:log-files   
class RemoveLogFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $logFiles = glob(storage_path('logs/*.log'));
    
        foreach ($logFiles as $logFile) {
            unlink($logFile);
            $this->info('Log file ' . $logFile . ' removed.');
        }
        $this->info('All log files removed successfully.');
    }
}
