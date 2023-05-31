@extends('layouts.app')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-12" style="padding:20px;">
            <div class="card">
                <div class="card-header">Edit Pet</div>
                <div class="card-body">
                    <form action="{{ route('pet.update', $pets->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Pet Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $pets->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="species">Species</label>
                            <input type="text" name="species" id="species" class="form-control" value="{{ $pets->species }}" required>
                        </div>

                        <div class="form-group">
                            <label for="breed">Breed</label>
                            <input type="text" name="breed" id="breed" class="form-control" value="{{ $pets->breed }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="1" {{ $pets->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="2" {{ $pets->gender == 2 ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="birth">Birth</label>
                            <input type="date" name="birth" id="birth" class="form-control" value="{{ $pets->birth }}" required>
                        </div>

                        <div class="form-group">
                            <label for="picture">Photo</label>
                            <input type="file" name="picture" id="picture" class="form-control-file">
                            @if ($pets->picture)
                                <img src="{{ asset($pets->picture) }}" width="50" height="50" class="img img-responsive" />
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ url('/pet') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
