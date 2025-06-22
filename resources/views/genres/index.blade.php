@extends('layouts.app')

@section('content')
<h2 class="mb-4">Genre List</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered w-50 mx-auto">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <td class="text-center">{{ $genre->name }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-muted">No genres found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection