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
                <span class="h3">Create Page</span>
                <a href="{{ route('page.index') }}" class="btn btn-primary float-right">All Page</a>
            </div>
            <div class="card-body">
                <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="page_title">Page Title</label>
                        <input type="text" class="form-control" id="page_title" placeholder="Enter page title"
                            name="page_title" value="{{ old('page_title') }}">
                    </div>
                    <div class="form-group">
                        <label for="page_desc">Page Descrition</label>
                        <textarea id="page_desc" cols="30" rows="10" class="form-control editor" name="page_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="banner_image">Banner_Image</label>
                        <input type="file" class="form-control-file" id="banner_image" name="banner_image" value="{{ old('banner_image') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
