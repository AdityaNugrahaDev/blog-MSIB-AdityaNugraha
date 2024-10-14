<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog MSIB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-light p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">
                <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">Blog MSIB</a>
            </h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </header>
    <main class="container my-4 flex-fill">
        @yield('content')
    </main>
    <footer class="bg-light text-center p-3">
        <p>&copy; 2024 Blog MSIB | Created By Aditya Nugraha</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
