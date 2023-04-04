@extends('employees.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2>HR Management </h2>
                    <h6>Employees </h6>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/employees/create') }}" class="btn btn-success btn-sm" title="Add New Employees">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                       <th>Age</th>
                                       <th>Salary</th>
                                       <th>Gender</th>
                                       <th>Hired_date</th>
                                       <th>Job_title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->age }}</td>
                                        <td>{{ $item->salary }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->hired_date }}</td>
                                        <td>{{ $item->job_title }}</td>
                                        <td>
                                            <a href="{{ url('/employees/' . $item->id) }}" title="View Employee" class="btn btn-light btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            <a href="{{ url('/employees/' . $item->id . '/edit') }}" title="Edit Employee" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ url('/employees' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection