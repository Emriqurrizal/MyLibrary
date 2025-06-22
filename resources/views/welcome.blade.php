@extends('layouts.landing')

@section('content')
<div class="text-center mt-5">
    <h1 class="display-4">Welcome to MyLibrary 📚</h1>
    <p class="lead">Organize your personal book collection with ease.</p>
    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
    </div>
</div>
@endsection
