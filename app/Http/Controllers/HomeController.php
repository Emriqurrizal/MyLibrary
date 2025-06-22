<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $recentBooks = Book::where('user_id', Auth::id())
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('recentBooks'));
    }
}