<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount(['books' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres,name',
        ]);

        Genre::create(['name' => $request->name]);

        return redirect('/genres')->with('success', 'Genre added!');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id,
        ]);

        $genre->update(['name' => $request->name]);

        return redirect('/genres')->with('success', 'Genre updated!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/genres')->with('success', 'Genre deleted!');
    }
}
