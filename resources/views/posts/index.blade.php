@extends('layouts.sidebar')

@section('title', 'Manage Posts - Blog MSIB')

@section('content')
<div class="container">
    <h1 class="mb-4 text-primary">
        <i class="bi bi-file-earmark-post" style="font-size: 1.5rem;"></i> Manage Posts
    </h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Create New Post
    </a>

    @if ($posts->isEmpty())
        <div class="alert alert-info" role="alert">
            No posts available.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ Str::limit($post->title, 30) }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $post->category->name }}</span>
                            </td>
                            <td>{{ optional($post->author)->name ?? 'Unknown Author' }}</td>
                            <td class="text-center">
                                @if ($post->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm me-1" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
