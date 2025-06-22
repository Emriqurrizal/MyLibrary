<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h2>Edit Book</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/books/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title', $book->title) }}"><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" value="{{ old('author', $book->author) }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description', $book->description) }}</textarea><br><br>

        <label>Genre:</label><br>
        <select name="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" {{ $genre->id == $book->genre_id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="unread" {{ $book->status == 'unread' ? 'selected' : '' }}>Unread</option>
            <option value="read" {{ $book->status == 'read' ? 'selected' : '' }}>Read</option>
        </select><br><br>

        <label>Rating (1-5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $book->rating) }}"><br><br>

        <button type="submit">Update Book</button>
    </form>

    <p><a href="/books">← Back to Book List</a></p>
</body>
</html>
