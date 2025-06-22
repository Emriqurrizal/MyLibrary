@extends('layouts.app')

@section('content')
    <style>
        td.description {
            max-width: 300px;
            word-wrap: break-word;
            white-space: normal;
        }
    </style>

    <div class="container">
        <h2 class="mb-3">My Book Collection</h2>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form method="GET" action="{{ route('books.index') }}" class="mb-3 d-flex">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Search by title...">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre->name ?? '-' }}</td>
                        <td class="description">{{ $book->description }}</td>
                        <td>{{ ucfirst($book->status) }}</td>
                        <td>{{ $book->rating }}</td>
                        <td>
                            <a href="/books/{{ $book->id }}/edit">Edit</a> |
                            <form action="/books/{{ $book->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="/books/create" class="btn btn-primary mt-3">Add New Book</a>
    </div>
@endsection
