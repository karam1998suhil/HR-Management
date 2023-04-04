<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use League\Csv\Writer;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->name = $request->input('name');
        $employee->age = $request->input('age');
        $employee->salary = $request->input('salary');
        $employee->gender = $request->input('gender');
        $employee->hired_date = $request->input('hired_date');
        $employee->job_title = $request->input('job_title');

        $employee->save();

        return redirect('/employees')->with('success', 'Employee created successfully!');
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employees.show', ['employee' => $employee]);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $employee->name = $request->input('name');
        $employee->age = $request->input('age');
        $employee->salary = $request->input('salary');
        $employee->gender = $request->input('gender');
        $employee->hired_date = $request->input('hired_date');
        $employee->job_title = $request->input('job_title');

        $employee->save();

        return redirect('/employees')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully!');
    }
    public function getManagers($id) {
        $employee = Employee::findOrFail($id);
    
        $managers = $this->getManagersRecursive($employee);
    
        return response()->json($managers);
    }
    
    private function getManagersRecursive($employee) {
        $managers = [];
    
        if ($employee->manager_id == null) {
           
        } else {
            $manager = Employee::findOrFail($employee->manager_id);
            $managers = $this->getManagersRecursive($manager);
            $managers[] = $manager->name;
        }
        return $managers;
    }
    public function getManagersSalary($id) {
        $employee = Employee::findOrFail($id);
        $managers = $this->getManagersRecursiveSalary($employee);
    
        return response()->json($managers);
    }
    
    private function getManagersRecursiveSalary($employee) {
        $managers = [];
    
        if ($employee->manager_id == null) {
           
        } else {
            $manager = Employee::findOrFail($employee->manager_id);
            $managers = $this->getManagersRecursiveSalary($manager);
            $managers[] = $manager-> name ;
            $managers[] = $manager-> salary ;
        }
        return $managers;
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        $employees = Employee::where('name', 'LIKE', "%$searchTerm%")
                             ->orderBy('name')
                             ->get();

        return response()->json(['employees' => $employees]);
    }
    public function export()
    {
        $employees = Employee::with('managers')
        ->select('name', 'age', 'salary', 'gender', 'hired_date', 'job_title')
        ->get();

    $csv = Writer::createFromString('');
    $csv->insertOne(['Name', 'Age', 'Salary', 'Gender', 'Hired Date', 'Job Title', 'Managers']);

    foreach ($employees as $employee) {
        $managers = $employee->managers->implode('name', ', ');

        $csv->insertOne([
            $employee->name,
            $employee->age,
            $employee->salary,
            $employee->gender,
            $employee->hired_date,
            $employee->job_title,
            $managers
        ]);
    }

    $filename = 'employees.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    return Response::make($csv->getContent(), 200, $headers);
    }
}
