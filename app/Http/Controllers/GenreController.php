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

}
