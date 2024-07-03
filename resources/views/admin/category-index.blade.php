@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <span class="h3">All Categories</span>
                <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Create Category</a>
            </div>
            <div class="card-body">
                @if ($categories->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <span><b>No data found in category..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
