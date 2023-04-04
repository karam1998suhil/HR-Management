<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportDatabase extends Command
{
    protected $signature = 'export:database';

    protected $description = 'Export the database';

    public function handle()
    {
        $databaseName = DB::getDatabaseName();
        $exportFileName = $databaseName . '_' . date('Y-m-d_H-i-s') . '.sql';

        $command = sprintf('mysqldump --user=%s --password=%s --host=%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            $databaseName,
            storage_path('app/' . $exportFileName)
        );

        $this->info('Exporting database...');
        exec($command);
        $this->info('Database exported to ' . storage_path('app/' . $exportFileName));
    }
}
