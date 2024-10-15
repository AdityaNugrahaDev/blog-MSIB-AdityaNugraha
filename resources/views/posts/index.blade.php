@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h4 mb-4">Posts</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">Author</th>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="text-center">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->is_published ? 'Published' : 'Draft' }}</td>
                    <td class="text-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info me-2" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning me-2" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" title="Delete">
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
