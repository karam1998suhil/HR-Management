<?php
namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Factory;
//php artisan export:employees-json

class InsertFakeDataCommand extends Command
{
    protected $signature = 'insert:fake-data';

    protected $description = 'Inserts 1000 rows of fake data into the employees table';

    public function handle()
    {
        $bar = $this->output->createProgressBar(1000);
        for ($i = 0; $i < 10; $i++) {
            Factory::create(Employee::class);
            $bar->advance();
        }
        $bar->finish();
        $this->info("\nFake data inserted successfully.");
    }
}