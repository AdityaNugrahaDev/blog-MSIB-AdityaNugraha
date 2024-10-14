@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Posts</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            New
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">Author</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="text-center">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection
