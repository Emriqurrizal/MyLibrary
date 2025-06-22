<!DOCTYPE html>
<html>
<head>
    <title>MyLibrary - Home</title>
</head>
<body>
    <h1>Welcome to MyLibrary!</h1>

    <p>Hello, {{ Auth::user()->name }} 👋</p>
    <p>You are logged in.</p>

    <h3>📚 My Book Collection</h3>
    <ul>
        <li><a href="/books">📖 View My Books</a></li>
        <li><a href="/books/create">➕ Add a New Book</a></li>
    </ul>

    <h3>🏷️ Book Genres</h3>
    <ul>
        <li><a href="/genres">📂 View All Genres</a></li>
    </ul>

    <br>
    <a href="/logout">🚪 Logout</a>
</body>
</html>