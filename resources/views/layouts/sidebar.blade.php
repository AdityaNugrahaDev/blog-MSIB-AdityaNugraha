<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Blog MSIB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            transition: background-color 0.3s, color 0.3s;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #f1f5f9;
            color: #1e293b;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            perspective: 1000px;
        }
        #sidebar-wrapper.toggled {
            margin-left: -250px;
        }
        #sidebar-wrapper .sidebar-heading {
            font-size: 1.4rem;
            font-weight: bold;
            padding: 1.5rem;
            text-align: center;
            color: #0d6efd;
            background-color: #e2e8f0;
        }
        #sidebar-wrapper .list-group-item {
            background-color: #f1f5f9;
            color: #1e293b;
            border: none;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        #sidebar-wrapper .list-group-item:hover {
            background-color: #e0f2fe;
            color: #0284c7;
            transform: translateZ(10px);
        }
        #page-content-wrapper {
            width: 100%;
            transition: all 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .navbar .navbar-brand {
            font-weight: bold;
            color: #0284c7;
        }
        .navbar .nav-link {
            color: #0284c7 !important;
            transition: color 0.3s ease;
        }
        .navbar .nav-link:hover {
            color: #0369a1 !important;
        }
        #menu-toggle {
            background-color: #0284c7;
            border: none;
            color: #ffffff;
            transition: background-color 0.3s;
        }
        #menu-toggle:hover {
            background-color: #0369a1;
        }
        .dropdown-menu {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .dropdown-item i {
            margin-right: 0.5rem;
            color: #0284c7;
        }
        footer {
            background-color: #f1f5f9;
            color: #475569;
            padding: 10px;
        }
        footer a {
            color: #0284c7;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #0369a1;
        }
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }
            #sidebar-wrapper.toggled {
                margin-left: 0;
            }
        }
        body.dark {
            background-color: #1e293b;
            color: #ffffff;
        }
        #sidebar-wrapper.dark {
            background-color: #374151;
            color: #ffffff;
        }
        #sidebar-wrapper.dark .list-group-item {
            background-color: #4b5563;
            color: #e5e7eb;
        }
        #sidebar-wrapper.dark .list-group-item:hover {
            background-color: #6b7280;
            color: #ffffff;
        }
        .navbar.dark {
            background-color: #1f2937;
        }
        .navbar.dark .navbar-brand {
            color: #ffffff;
        }
        .navbar.dark .nav-link {
            color: #ffffff !important;
        }
        footer.dark {
            background-color: #374151;
            color: #ffffff;
        }
        footer.dark a {
            color: #bbf7d0;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <nav id="sidebar-wrapper">
            <div class="sidebar-heading">Menu</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('authors.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-people me-2"></i> Authors
                </a>
                <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-tags me-2"></i> Categories
                </a>
                <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-file-text me-2"></i> Posts Articles
                </a>
            </div>
        </nav>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="btn" id="menu-toggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <a class="navbar-brand ms-3" href="#">Blog MSIB</a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/30" alt="User" class="rounded-circle me-2">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="bi bi-person me-2"></i> Profile Detail
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <button id="theme-toggle" class="btn btn-outline-secondary ms-3">
                        <i class="bi bi-brightness-high"></i>
                    </button>
                </div>
            </nav>
            <div class="container-fluid mt-4 flex-grow-1">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function(e) {
            e.preventDefault();
            document.getElementById("sidebar-wrapper").classList.toggle("toggled");
        });

        document.getElementById("theme-toggle").addEventListener("click", function() {
            document.body.classList.toggle("dark");
            document.getElementById("sidebar-wrapper").classList.toggle("dark");
            var navbar = document.querySelector('.navbar');
            navbar.classList.toggle('dark');
            var footer = document.querySelector('footer');
            footer.classList.toggle('dark');

            var icon = document.querySelector("#theme-toggle i");
            if (document.body.classList.contains("dark")) {
                icon.classList.remove("bi-brightness-high");
                icon.classList.add("bi-moon");
            } else {
                icon.classList.remove("bi-moon");
                icon.classList.add("bi-brightness-high");
            }
        });
    </script>
</body>
</html>
