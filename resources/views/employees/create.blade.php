@extends('employees.layout')

@section('content')

  <div class="card">
    <div class="card-header">Employees Page</div>
    <div class="card-body">
      <form action="{{ url('employees') }}" method="post">
        @csrf
        <label for="name">Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label for="age">Age</label></br>
        <input type="text" name="age" id="age" class="form-control"></br>
        <label for="salary">Salary</label></br>
        <input type="text" name="salary" id="salary" class="form-control"></br>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control" id="gender" name="gender">
            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
          </select>
        </div>
        <label for="salary">Hired date</label></br>
        <input type="date" name="hired_date" id="hired_date" class="form-control"></br>
        <label for="salary">Job title</label></br>
        <input type="text" name="job_title" id="job_title" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    </div>
  </div>
@endsection