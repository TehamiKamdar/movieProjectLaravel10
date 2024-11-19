<?php

namespace App\Http\Controllers;

use App\Models\movies;
use App\Models\theatres;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex(){
        return view('admin.index');
    }

    // Functions for Theatres
    public function theatreIndex(){
        $theatres = theatres::all();
        return view('admin.theatre.index', compact('theatres'));
    }

    public function theatreAdd(Request $req){
        $theatre = new theatres();
        $theatre->theatre_name = $req->theatre_name;
        $theatre->save();
        return redirect()->route('theatre-index')->with('added', 'Theatre Added Successfully');
    }

    public function theatreActive($id){
        $theatre = theatres::find($id);
        $theatre->status = "active";
        $theatre->save();

        return redirect()->back()->with('active', 'Theatre Activated');
    }
    public function theatreInactive($id){
        $theatre = theatres::find($id);
        $theatre->status = "inactive";
        $theatre->save();

        return redirect()->back()->with('inactive', 'Theatre Inactivated');
    }

    public function theatreDelete($id){
        $theatre = theatres::find($id);
        $theatre->delete();

        return redirect()->back()->with('delete', 'Theatre Deleted');
    }


    // Functions for Movies
    public function moviesIndex(){
        $theatres = theatres::where('status' , '=', 'active')->get();
        return view('admin.movies.index' , compact('theatres'));
    }

    public function movieAdd(Request $req){
        $movie = new movies();
        $movie->title = $req->movie_title;
        $movie->description = $req->movie_desc;
        $movie->genre = $req->genre;
        $movie->language = $req->language;
        $movie->director = $req->director;
        $movie->duration = $req->duration;
        $movie->release_date = $req->release_date;
        $movie->theatre_id = $req->theatre_id;
        $movie->save();
        return redirect()->route('movies-index')->with('added', 'Movie Added Successfully');
    }
}
