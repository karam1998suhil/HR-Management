@extends('employees.layout')

@section('content')
<div class="card">
    <div class="card-header">Employee Managers</div>
    <div class="card-body">
        <ul>
            @foreach($managers as $manager)
                <li>{{ $manager->name }} : {{ $manager->salary }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
