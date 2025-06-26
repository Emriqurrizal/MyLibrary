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
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Title</th>
                    <th class="text-center">Author</th>
                    <th class="text-center">Genre</th>
                    <th class="text-center">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recommendations as $book)
                    <tr>
                        <td class="text-center">{{ $book->title }}</td>
                        <td class="text-center">{{ $book->author }}</td>
                        <td class="text-center">{{ $book->genre }}</td>
                        <td class="text-center">{{ $book->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
