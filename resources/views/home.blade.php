@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f8fafc;
    }
    .quick-link {
        background: #fff;
        border-width: 5px;
        border-style: solid;
        transition: transform 0.12s, box-shadow 0.12s;
        text-decoration: none;
    }
    .quick-link:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08);
        text-decoration: none;
    }
    .recent-list {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 0.25rem 1rem rgba(0,0,0,0.04);
    }
</style>
<div class="py-4" style="min-height: 90vh;">
    <div class="mb-5 text-center">
        <h1 style="font-size:2.5rem;">Welcome to <span class="fw-normal">📚MyLibrary</span></h1>
        <p class="fs-5 text-muted mb-1">Hello, <span class="fw-semibold">{{ Auth::user()->name }}</span> 👋</p>
        <p class="text-secondary">Manage your books, genres, and more with ease.</p>
    </div>

    <div class="row g-4 justify-content-center mb-5" style="max-width: 900px; margin: 0 auto;">
        <div class="col-12 col-md-6 d-flex">
            <a href="/books" class="quick-link flex-fill d-block p-4 rounded-4 text-center fw-semibold shadow-sm h-100 text-dark"
            style="border-color: #0d6efd;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0d6efd" class="mb-2" viewBox="0 0 16 16">
                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                </svg>
                <br>My Books
            </a>
        </div>
        <div class="col-12 col-md-6 d-flex">
            <a href="/books/create" class="quick-link flex-fill d-block p-4 rounded-4 text-center fw-semibold shadow-sm h-100 text-dark"
            style="border-color: #198754;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#198754" class="mb-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"/>
                </svg>
                <br>Add Book
            </a>
        </div>
        <div class="col-12 col-md-6 d-flex">
            <a href="/genres" class="quick-link flex-fill d-block p-4 rounded-4 text-center fw-semibold shadow-sm h-100 text-dark"
            style="border-color: #6c757d;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="mb-2" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                </svg>
                <br>Genres
            </a>
        </div>
        <div class="col-12 col-md-6 d-flex">
            <a href="{{ route('recommendations') }}" class="quick-link flex-fill d-block p-4 rounded-4 text-center fw-semibold shadow-sm h-100 text-dark"
            style="border-color: #dc3545;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#dc3545" class="mb-2" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                </svg>
                <br>Recommendations
            </a>
        </div>
        <div class="col-12 col-md-6 d-flex mx-auto">
            <a href="/faq" class="quick-link flex-fill d-block p-4 rounded-4 text-center fw-semibold shadow-sm h-100 text-dark"
            style="border-color: #212529;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="mb-2" viewBox="0 0 16 16">
                    <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0m1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627"/>
                </svg>
                <br>FAQ
            </a>
        </div>
    </div>

    <div class="recent-list mx-auto p-4" style="max-width: 700px;">
        <h4 class="mb-3 text-dark">📚 Recently Added Books</h4>
        @if($recentBooks->isEmpty())
            <div class="alert alert-info mb-0">You haven't added any books yet.</div>
        @else
            <ul class="list-group list-group-flush">
                @foreach($recentBooks as $book)
                    <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <strong>{{ $book->title }}</strong>
                            <span class="text-muted ms-2">by {{ $book->author ?? 'Unknown' }}</span>
                        </div>
                        <small class="text-secondary">Added on {{ $book->created_at->format('d M Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection