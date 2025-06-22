@extends('layouts.app')

@section('content')

    <h2 class="mb-4">📚 Book Recommendations</h2>

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
            @foreach($recommendations as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection