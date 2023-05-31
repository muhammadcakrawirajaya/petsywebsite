@extends('layouts.app')
@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                <div class="card">
                    <div class="card-header">Pets List</div>
                    <div class="card-body">
                        <a href="{{ url('/pet/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pet Name</th>
                                        <th>Species</th>
                                        <th>Breed</th>
                                        <th>Gender</th>
                                        <th>Birth</th>
                                        <th>Photo</th>
                                        <th>Actions</th> <!-- Added Actions column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pets as $index => $item)
                                        <tr>
                                            <td>{{ $index + $pets -> firstItem() }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->species }}</td>
                                            <td>{{ $item->breed }}</td>
                                            <td>
                                                @if($item->gender == 1)
                                                    Male
                                                @elseif($item->gender == 2)
                                                    Female
                                                @endif
                                            </td>
                                            <td>{{ $item->birth }}</td>
                                            <td>
                                                <img src="{{ asset($item->picture) }}" width='50' height='50' class="img img-responsive" />
                                            </td>
                                            <td>
                                                <a href="{{ route('pet.edit', $item->id)}}" type="button" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('pet.destroy', $item->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger m-0">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $pets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
