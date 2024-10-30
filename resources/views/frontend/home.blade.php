@extends('layouts.app')

@section('title', 'Home - Blog MSIB')

@section('content')
    <h1 class="mb-4 text-center text-primary">Discover Our Latest Articles</h1>

    <style>
        .card {
            height: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border: none;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            perspective: 1000px; /* Add perspective for 3D effect */
        }

        .card-inner {
            display: flex;
            flex-direction: column;
            transition: transform 0.4s;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d; /* Preserve 3D effect */
        }

        .card:hover .card-inner {
            transform: rotateY(10deg); /* 3D rotation on hover */
        }

        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #ffffff;
            backface-visibility: hidden; /* Hide back face */
        }

        .card-title a {
            color: #2b7a78;
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .card-title a:hover {
            color: #205a56;
        }

        .btn-primary {
            background-color: #2b7a78;
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #205a56;
        }

        .card-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        @media (max-width: 1080px) {
            .card-wrapper {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 720px) {
            .card-wrapper {
                grid-template-columns: 1fr;
            }

            .card-img-top {
                height: 200px;
            }
        }
    </style>

    <div class="container">
        <div class="card-wrapper">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-inner"> <!-- Wrapping content in card-inner -->
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        @else
                            <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="default image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </h5>
                            <p class="card-text">
                                {!! Str::limit($post->content, 100, '...') !!}
                            </p>
                            <a href="{{ route('frontend.details', $post->id) }}" class="btn btn-primary mt-3">Read More &rarr;</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
