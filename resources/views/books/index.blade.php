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
        <h2 class="mb-3">📚 My Book Collection</h2>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form method="GET" action="{{ route('books.index') }}" class="mb-3 d-flex">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Search by title...">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="align-middle text-center">Title</th>
                        <th class="align-middle text-center">Author</th>
                        <th class="align-middle text-center">Genre</th>
                        <th class="align-middle text-center">Description</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Rating</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td class="align-middle text-center">{{ $book->title }}</td>
                            <td class="align-middle text-center">{{ $book->author }}</td>
                            <td class="align-middle text-center">{{ $book->genre->name ?? '-' }}</td>
                            <td class="align-middle description">{{ $book->description }}</td>
                            <td class="align-middle text-center">
                                {{ ucfirst($book->status) }}

                                @if($book->total_pages)
                                    <div class="progress mt-1" style="height: 12px;">
                                        <div class="progress-bar bg-success"
                                            style="width: {{ $book->reading_progress }}%;"
                                            role="progressbar"
                                            aria-valuenow="{{ $book->reading_progress }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small class="text-muted">{{ $book->last_page_read }} / {{ $book->total_pages }} pages</small>
                                @else
                                    <div><small class="text-muted">No page info</small></div>
                                @endif
                            </td>
                            <td class="align-middle text-center">{{ $book->rating }}</td>
                            <td class="align-middle text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="/books/{{ $book->id }}/edit" class="btn btn-sm btn-warning" style="min-width: 70px;">Edit</a>
                                    <form action="/books/{{ $book->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="min-width: 70px;" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="align-middle text-center">No books found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="/books/create" class="btn btn-primary mt-3">Add New Book</a>
    </div>
@endsection
