
@extends('employees.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('employees/' .$employee->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$employee->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$employee->name}}" class="form-control"></br>
        <label>Age</label></br>
        <input type="text" name="age" id="age" value="{{$employee->age}}" class="form-control"></br>
        <label>Salary</label></br>
        <input type="text" name="salary" id="salary" value="{{$employee->salary}}" class="form-control"></br>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control" id="gender" name="gender">
            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
          </select>
        </div>
        <label for="salary">Hired date</label></br>
        <input type="date" name="hired_date" id="hired_date" value="{{$employee->hired_date}}" class="form-control"></br>
        <label for="salary">Job title</label></br>
        <input type="text" name="job_title" id="job_title" value="{{$employee->job_title}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop