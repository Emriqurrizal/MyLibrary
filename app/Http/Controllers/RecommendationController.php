<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendation;

class RecommendationController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->input('genre');

        $query = Recommendation::query();

        if ($genre) {
            $query->where('genre', $genre);
        }

        $recommendations = $query->get();

        // Get distinct genres from the recommendations
        $genres = Recommendation::select('genre')->distinct()->orderBy('genre')->pluck('genre');

        return view('recommendations.index', compact('recommendations', 'genres', 'genre'));
    }
}