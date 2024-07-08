@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            @if (session('error'))
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
                <span class="h3">Edit Page</span>
                <a href="{{ route('page.index') }}" class="btn btn-primary float-right">All Pages</a>
            </div>
            <div class="card-body">
                <form action="{{ route('page.store', $page->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="page_title">Page Title</label>
                        <input type="text" class="form-control" id="page_title" placeholder="Enter page title"
                            name="page_title" value="{{ old('page_title', $page->page_title) }}">
                    </div>
                    <div class="form-group">
                        <label for="page_desc">Page Desc</label>
                        <input type="text" class="form-control editor" id="page_desc"
                            placeholder="Enter page desc" name="page_desc" value="{{ old('page_desc', $page->page_desc) }}">
                    </div>
                    <div class="form-group">
                        <label for="banner_image">Current Banner Image</label><br>
                        @if ($page->banner_image)
                            <img src="{{ asset('images/pages/' . $page->banner_image) }}" alt="Banner Image"
                                style="max-width: 70px; max-height: 70px;"><br>
                            <span>{{ $page->banner_image }}</span><br><br>
                        @else
                            <span>No image uploaded</span><br><br>
                        @endif
                        <label for="banner_image">Upload New Banner Image</label>
                        <input type="file" class="form-control-file" id="banner_image" name="banner_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
