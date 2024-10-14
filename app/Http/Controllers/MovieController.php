<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movie::latest('id')->paginate(15);

        return view('movies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('poster');

        if ($request->hasFile('poster')) {
            $data['poster'] = Storage::put('movies', $request->file('poster'));
        }

        Movie::create($data);
        return redirect()->route('movies.index')->with('message', 'ADD SUCCESS');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $genres = Genre::all();

        return view('movies.show', compact('genres', 'movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();

        return view('movies.edit', compact('genres', 'movie'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->except('poster');

        if ($request->hasFile('poster')) {
            $data['poster'] = Storage::put('movies', $request->file('poster'));
        }


        $currentPoster = $movie->poster;

        $movie->update($data);

        if (
            $request->hasFile('poster')
            && !empty($currentPoster)
            && Storage::exists($currentPoster)
        ) {
            Storage::delete($currentPoster);
        }


        return redirect()->back()->with('message', 'cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {

        $movie->delete();

        if (!empty($movie->poster) && Storage::exists($movie->poster)) {
            Storage::delete($movie->poster);
        }


        return redirect()->route('movies.index')->with('message', 'xoa thanh cong');



    }

    public function search(Request $request)
    {

    //  dd('abc');
        $keyword = $request->input('keyword');
        
        $data = Movie::where('title', 'like', "%{$keyword}%")->paginate(3);
       

        return view('movies.search', compact( 'data','keyword'));

    }
   
}
