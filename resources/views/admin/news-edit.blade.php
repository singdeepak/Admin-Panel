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
                <span class="h3">Edit News</span>
                <a href="{{ route('news.index') }}" class="btn btn-primary float-right">All news</a>
            </div>
            <div class="card-body">
                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="news_title">News Title</label>
                        <input type="text" class="form-control" id="news_title" placeholder="Enter news title"
                            name="news_title" value="{{ $news->news_title }}">
                    </div>
                    <div class="form-group">
                        <label for="news_short_desc">News Short Description</label>
                        <input type="text" class="form-control" id="news_short_desc"
                            placeholder="Enter news short description" name="news_short_desc" value="{{ $news->news_short_desc }}">
                    </div>
                    <div class="form-group">
                        <label for="priority">News Priority	</label>
                        <input type="number" class="form-control" id="priority" placeholder="Enter priority"
                            name="priority" value="{{ $news->priority }}">
                    </div>

                    <div class="form-group">
                        <label for="current-slider-image">Current News Image</label><br>
                        @if ($news->news_image)
                            <img src="{{ asset('images/news/' . $news->news_image) }}" alt="Current Slider Image"
                                style="max-width: 70px; max-height: 70px;"><br>
                            <span>{{ $news->news_image }}</span><br><br>
                        @else
                            <span>No image uploaded</span><br><br>
                        @endif
                        <label for="news-image">Upload New Slider Image</label>
                        <input type="file" class="form-control-file" id="news-image" name="news_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
