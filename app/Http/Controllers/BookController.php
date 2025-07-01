<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%');
        }

        $books = $query->latest()->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'genre_id' => 'required|exists:genres,id',
            'status' => 'required|in:read,unread',
            'rating' => 'nullable|integer|min:1|max:5',
            'total_pages' => 'nullable|integer|min:1',
            'last_page_read' => 'nullable|integer|min:0',
        ]);
        Book::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre_id' => $request->genre_id,
            'status' => $request->status,
            'total_pages' => $request->total_pages,
            'last_page_read' => $request->last_page_read,
            'rating' => $request->rating,
        ]);

        return redirect('/books')->with('success', 'Book added!');
    }

    public function edit(Book $book)
    {
        if ($book->user_id !== Auth::id()) {
            abort(403);
        }

        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        if ($book->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'genre_id' => 'required|exists:genres,id',
            'status' => 'required|in:read,unread',
            'rating' => 'nullable|integer|min:1|max:5',
            'total_pages' => 'nullable|integer|min:1',
            'last_page_read' => 'nullable|integer|min:0',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre_id' => $request->genre_id,
            'status' => $request->status,
            'rating' => $request->rating,
            'total_pages' => $request->total_pages,
            'last_page_read' => $request->last_page_read,
        ]);

        return redirect('/books')->with('success', 'Book updated!');
    }

    public function destroy(Book $book)
    {
        if ($book->user_id !== Auth::id()) {
            abort(403);
        }

        $book->delete();
        return redirect('/books')->with('success', 'Book deleted.');
    }
}

