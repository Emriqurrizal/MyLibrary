<h2>Add Genre</h2>

<form method="POST" action="/genres">
    @csrf
    <label>Genre name:</label><br>
    <input type="text" name="name">
    <br><br>
    <button type="submit">Add Genre</button>
</form>

<p><a href="/genres">Back to Genre List</a></p>