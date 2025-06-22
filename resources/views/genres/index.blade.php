@extends('layouts.app')

@section('content')
<h2>Genre List</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
    </tr>
    @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre->name }}</td>
        </tr>
    @endforeach
</table>
@endsection