<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog MSIB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #0056b3;
            opacity: 0.6;
            padding: 10px 0;
            color: #fff;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        footer {
            background-color: #343a40;
            padding: 15px 0;
            color: #fff;
        }

        .nav-link {
            text-decoration: none;
            color: #fff;
            margin-left: 15px;
        }

        .nav-link:hover {
            text-decoration: underline;
            color: #f8f9fa;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        h1.h3 {
            font-size: 1.5rem;
        }

        footer p {
            margin: 0;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="h3">Blog MSIB</h1>
                </div>
                <div class="col-6 text-end">
                    @if (Route::has('login'))
                        <nav class="d-flex justify-content-end">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-link nav-link">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-link nav-link">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-link nav-link">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <main>
    </main>
    <footer class="text-center">
        <div class="container">
            <p class="text-white">© 2024 Blog MSIB</p>
            <p class="text-white">Created By Aditya Nugraha</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
