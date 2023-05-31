@extends('layouts.app')
@section('contents')
<div class="card" style="margin: 20px;">
  <div class="card-header">Create New Employee</div>
  <div class="card-body">

    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>

        <div>
            <label>Gender</label></br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div></br>

        <input class="form-control" name="photo" type="file" id="photo">


        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
