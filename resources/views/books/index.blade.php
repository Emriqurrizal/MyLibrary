<!DOCTYPE html>
<html>
<head>
    <title>My Books</title>
    <style>
    td.description {
        max-width: 300px;    
        word-wrap: break-word;
        white-space: normal;
    }
    </style>
</head>
<body>
    <h2>My Book Collection</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="/books/create">➕ Add New Book</a><br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Status</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->genre->name }}</td>
                <td class="description">{{ $book->description }}</td>
                <td>{{ ucfirst($book->status) }}</td>
                <td>{{ $book->rating }}</td>
                <td>
                    <a href="/books/{{ $book->id }}/edit">Edit</a> |
                    <form action="/books/{{ $book->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="/home">← Back to Home</a>
</body>
</html>
