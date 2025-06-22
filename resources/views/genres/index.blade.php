@extends('layouts.app')

@section('content')
<h2 class="mb-4">Your Genre List</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Genre</th>
                <th class="text-center">Your Books</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <td class="text-center">{{ $genre->name }}</td>
                    <td class="text-center">{{ $genre->books_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center text-muted">No genres found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection