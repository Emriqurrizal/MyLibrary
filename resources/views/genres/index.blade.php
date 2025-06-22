<h2>Genre List</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="/genres/create">➕ Add Genre</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre->name }}</td>
            <td>
                <a href="/genres/{{ $genre->id }}/edit">Edit</a> |
                <form action="/genres/{{ $genre->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this genre?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>