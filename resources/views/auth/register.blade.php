@extends('layouts.landing')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Register</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>

    <div class="mt-3 text-center">
        <a href="/login" class="btn btn-secondary w-100">Already have an account? Login here</a>
    </div>
</div>
@endsection