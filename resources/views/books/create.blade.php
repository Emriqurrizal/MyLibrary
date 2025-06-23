@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="mb-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"/>
        </svg>
        Add Book
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/books" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Author:</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Genre:</label>
            <select name="genre_id" class="form-select">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="unread" {{ old('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="read" {{ old('status') == 'read' ? 'selected' : '' }}>Read</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating') }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">Add Book</button>
    </form>

    <div class="mt-3">
        <a href="/books" class="btn btn-secondary w-100">← Back to Book List</a>
    </div>
</div>
@endsection