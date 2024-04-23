<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $movies = Movie::latest()
            ->where('title', 'genre', 'year', 'like', '%' . $search . '%')
            ->get();
        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'actors' => 'required',
            'year' => 'required',
            'trailer' => 'required',
            'poster' => 'required',
            'plot' => 'required',
        ]);
        $validated['poster'] = $request->file('poster')->store('image', 'public');
        Movie::create($validated);
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required',
            'actors' => 'required',
            'year' => 'required',
            'trailer' => 'required',
            'plot' => 'required',
        ]);
        if ($request->file('poster')) {

            $validated['poster'] = $request->file('poster')->store('image', 'public');
            Storage::delete($movie->poster);
        }
        $movie->update($validated);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
