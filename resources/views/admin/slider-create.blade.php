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
                <span class="h3">Create Slider</span>
                <a href="{{ route('slider.index') }}" class="btn btn-primary float-right">All Sliders</a>
            </div>
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="slider-heading">Slider Heading</label>
                        <input type="text" class="form-control" id="slider-heading" placeholder="Enter slider heading"
                            name="slider-heading" value="{{ old('slider-heading') }}">
                    </div>
                    <div class="form-group">
                        <label for="slider-sub-heading">Slider Sub-Heading</label>
                        <input type="text" class="form-control" id="slider-sub-heading"
                            placeholder="Enter slider sub-heading" name="slider-sub-heading" value="{{ old('slider-sub-heading') }}">
                    </div>
                    <div class="form-group">
                        <label for="slider-link">Slider Link</label>
                        <input type="text" class="form-control" id="slider-link" placeholder="Enter slider link"
                            name="slider-link" value="{{ old('slider-link') }}">
                    </div>
                    <div class="form-group">
                        <label for="slider-image">Slider Image</label>
                        <input type="file" class="form-control-file" id="slider-image" name="slider-image" value="{{ old('slider-image') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
