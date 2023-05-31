@extends('layouts.app')

@section('contents')
<div class="card" style="margin: 20px;">
  <div class="card-header">Create New Pet</div>
  <div class="card-body">

    <form action="{{ route('pet.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name" id="name" class="form-control"><br>
        <label>Species</label><br>
        <input type="text" name="species" id="species" class="form-control"><br>
        <label>Breed</label><br>
        <input type="text" name="breed" id="breed" class="form-control"><br>

        <div>
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value=1>
                <label class="form-check-label" for="male">male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value=2>
                <label class="form-check-label" for="female">female</label>
            </div>
        </div><br>

        <label>Birth</label><br>
        <input type="date" name="birth" required id="birth" class="form-control"><br>

        <input class="form-control" name="photo" type="file" id="picture"><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>


@stop
