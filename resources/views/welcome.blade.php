@extends('layouts.landing')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
    <div class="text-center">
        <h1 class="display-4">Welcome to  📚MyLibrary</h1>
        <p class="lead">Your personal book collection manager.</p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary me-2 btn-lg" style="min-width: 140px">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg" style="min-width: 140px">Register</a>
        </div>
    </div>
</div>
@endsection