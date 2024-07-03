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
                <span class="h3">Create News</span>
                <a href="{{ route('news.index') }}" class="btn btn-primary float-right">All News</a>
            </div>
            <div class="card-body">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="news_title">News Title</label>
                        <input type="text" class="form-control" id="news_title" placeholder="Enter news title"
                            name="news_title">
                    </div>
                    <div class="form-group">
                        <label for="news_short_desc">News Short Description</label>
                        <input type="text" class="form-control" id="news_short_desc"
                            placeholder="Enter news short description" name="news_short_desc">
                    </div>
                    <div class="form-group">
                        <label for="priority">News Priority	</label>
                        <input type="number" class="form-control" id="priority" placeholder="Enter priority"
                            name="priority">
                    </div>
                    <div class="form-group">
                        <label for="news-image">News Image</label>
                        <input type="file" class="form-control-file" id="news-image" name="news_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
