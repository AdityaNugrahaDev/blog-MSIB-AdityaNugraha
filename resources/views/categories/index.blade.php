@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Categories</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            New
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="text-center">{{ $category->id }}</td>
                    <td class="text-center">{{ $category->name }}</td>
                    <td class="text-center">{{ $category->description }}</td>
                    <td class="text-center">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
    {{ $categories->links() }}
</div>
@endsection
