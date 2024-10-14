@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $post->title }}</h1>
    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    <p><strong>Author:</strong> {{ $post->author->name }}</p>
    @if($post->image)
        <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-fluid">
    @endif
    <div class="mt-3">
        {!! nl2br(e($post->content)) !!}
    </div>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
</div>
@endsection
