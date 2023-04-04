<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteOldLogs extends Command
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
        Log::where('created_at', '<', Carbon::now()->subMonth())->delete();
    }
    protected function schedule(Schedule $schedule)
{
    $schedule->command('logs:delete')->daily();
}
}
