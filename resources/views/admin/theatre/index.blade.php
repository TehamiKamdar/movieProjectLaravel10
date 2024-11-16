@extends('layouts.admin.main')
@section(
    'main-section'
)

@if (session('added'))
<div class="alert alert-success">
    {{ session('added') }}
</div>
@endif
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Theatre
    </button>

    <!-- Modal -->
    <form action="{{route('theatre-add')}}" method="post">
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
@endsection