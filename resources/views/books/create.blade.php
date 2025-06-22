<!DOCTYPE html>
<html>
<head>
    <title>Add a New Book</title>
</head>
<body>
    <h2>Add Book</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/books" method="POST">
        @csrf

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" value="{{ old('author') }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Genre:</label><br>
        <select name="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="unread">Unread</option>
            <option value="read">Read</option>
        </select><br><br>

        <label>Rating (1-5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="{{ old('rating') }}"><br><br>

        <button type="submit">Add Book</button>
    </form>

    <p><a href="/books">Back to Book List</a></p>
</body>
</html>