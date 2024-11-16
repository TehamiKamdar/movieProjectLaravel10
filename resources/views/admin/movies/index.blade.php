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
    Add Movie
</button>

<!-- Modal -->
<form action="{{route('movies-add')}}" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="movie_title" class="form-control my-3" placeholder="Movie Title">
                </div>
                <div class="form-group">
                    <input type="text" name="movie_desc" class="form-control my-3" placeholder="Movie Description">
                </div>
                <div class="form-group">
                    <select class="form-control" name="genre" id="">
                        <option value="">Select an Option for Genre..</option>
                        <option value="Hindi">Sci-Fi</option>
                        <option value="English">Horror</option>
                        <option value="English">Comedy</option>
                        <option value="English">Thriller</option>
                        <option value="English">Action</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="director" class="form-control my-3" placeholder="Director">
                </div>
                <div class="form-group">
                    <select class="form-control" name="language" id="">
                        <option value="">Select an Option for Language..</option>
                        <option value="Hindi">Hindi</option>
                        <option value="English">English</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" name="duration" class="form-control my-3" placeholder="Duration">
                </div>
                <div class="form-group">
                    <input type="date" name="release_date" class="form-control my-3">
                </div>
                <div class="form-group">
                    <select name="theatre_id" class="form-control">
                        <option value="">Select Theatre</option>
                        @foreach($theatres as $theatre)
                            <option value="{{$theatre->id}}">{{$theatre->theatre_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="movie_poster" class="form-control my-3">
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