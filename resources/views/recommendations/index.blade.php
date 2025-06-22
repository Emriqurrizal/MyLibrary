@extends('layouts.app')

@section('content')

    <h2 class="mb-4">📚 Book Recommendations</h2>

    <form method="GET" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="genre" class="form-select" onchange="this.form.submit()">
                    <option value="">No Filter</option>
                    @foreach ($genres as $g)
                        <option value="{{ $g }}" {{ $g == $genre ? 'selected' : '' }}>{{ $g }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recommendations as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No recommendations found for this genre.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
