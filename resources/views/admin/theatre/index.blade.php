@extends('layouts.admin.main')
@section('main-section')
@if (session('added'))
    <div class="alert alert-success">
        {{ session('added') }}
    </div>
@endif
@if (session('active'))
    <div class="alert alert-success">
        {{ session('active') }}
    </div>
@endif
@if (session('inactive'))
    <div class="alert alert-danger">
        {{ session('inactive') }}
    </div>
@endif
@if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
@endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Theatre
    </button>

    <!-- Modal -->
    <form action="{{ route('theatre-add') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="theatre_name" class="form-control my-3" placeholder="Theatre Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Theatre</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Theatre Name</th>
                    <th scope="col">Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theatres as $t)
                <tr class="">
                    <td>{{$t->theatre_name}}</td>
                    <td>
                        @if ($t->status=="inactive")
                            <form action="{{route('theatre-active', $t->id)}}" method="post">@csrf<button type="submit" class="btn btn-danger">Inactive</button></form>
                        @else
                            <form action="{{route('theatre-inactive', $t->id)}}" method="post">@csrf<button class="btn btn-success">Active</button></form>
                        @endif
                    </td>
                    <td><form action="" method="post"><button class="btn btn-primary">Edit</button></form></td>
                    <td><form action="{{route('theatre-delete', $t->id)}}" method="post">@csrf<button class="btn btn-danger">Delete</button></form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
