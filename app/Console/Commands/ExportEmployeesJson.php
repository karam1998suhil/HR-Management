<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
//php artisan insert:fake-data   
class ExportEmployeesJson extends Command
{
    protected $signature = 'export:employees-json';

    protected $description = 'Exports all employees to a JSON file.';

    public function handle()
    {
        $employees = Employee::all();
        $filename = 'employees.json';

        file_put_contents(
            $filename,
            json_encode($employees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $this->info("Employees exported successfully to $filename.");
    }
}
