@extends('employees.layout')

@section('content')
<div class="card">
    <div class="card-header">Employee Profile</div>
    <div class="card-body">
        <h5 class="card-title">Name: {{ $employee->name }}</h5>
        <p class="card-text">Age: {{ $employee->age }}</p>
        <p class="card-text">Salary: {{ $employee->salary }}</p>
        <p class="card-text">Gender: {{ $employee->gender }}</p>
        <p class="card-text">Hired Date: {{ $employee->hired_date }}</p>
        <p class="card-text">Job Title: {{ $employee->job_title }}</p>
        <a href="http://127.0.0.1:8000/employees/{{ $employee->id }}/managers">View Managers</a><br>
        <a href="http://127.0.0.1:8000/employees/{{ $employee->id }}/managers-salary">View Managers Salary</a>

    </div>
</div>
<style>
    .card {
        max-width: 600px;
        margin: 0 auto;
        margin-top: 50px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
        color: #555;
        text-align: center;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        margin-bottom: 5px;
    }
</style>
@endsection