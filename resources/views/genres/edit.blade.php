<h2>Edit Genre</h2>

<form method="POST" action="/genres/{{ $genre->id }}">
    @csrf
    @method('PUT')
    <label>Genre name:</label><br>
    <input type="text" name="name" value="{{ $genre->name }}">
    <br><br>
    <button type="submit">Update</button>
</form>

<p><a href="/genres">Back to Genre List</a></p>
