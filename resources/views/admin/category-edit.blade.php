@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header">
                <span class="h3">Edit Category</span>
                <a href="{{ route('category.index') }}" class="btn btn-primary float-right">All Categorys</a>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter Category Name"
                            name="category" value="{{ $category->category_name }}">
                        <input type="hidden" value="{{ $category->id }}" name="id">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
